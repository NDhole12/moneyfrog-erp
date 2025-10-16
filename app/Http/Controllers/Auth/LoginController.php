<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. This version works without database
    | for UI demonstration purposes.
    |
    */

    use AuthenticatesUsers {
        login as parentLogin;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function showLoginForm()
    {
        // Allow canceling OTP flow
        if (request()->has('cancel_otp')) {
            session()->forget('user_login_otp');
        }
        
        if (session()->has('user_login_otp')) {
            return redirect()->route('login.otp.show');
        }

        return view('auth.login');
    }

    /**
     * Handle a login request to the application (UI Demo Mode).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        $endpoint = rtrim(config('services.demo_login.base_url'), '/') . '/erp_user/login';

        try {
            $response = Http::timeout(10)
                ->acceptJson()
                ->post($endpoint, [
                    'email' => $credentials['email'],
                    'password' => $credentials['password'],
                ]);
        } catch (ConnectionException $exception) {
            report($exception);

            throw ValidationException::withMessages([
                $this->username() => __('Unable to reach authentication service. Please try again later.'),
            ]);
        }

        $payload = $response->json();

        // Check if OTP is required FIRST (before status code check)
        if ($this->otpRequired($payload)) {
            \Log::info('OTP verification required', ['email' => $credentials['email']]);
            $this->storePendingOtpChallenge($payload, $credentials);

            return redirect()
                ->route('login.otp.show')
                ->with('status', data_get($payload, 'message', __('New device detected. OTP verification required.')));
        }

        if (! $response->successful()) {
            $errorMessage = $response->json('message') ?? __('auth.failed');

            throw ValidationException::withMessages([
                $this->username() => $errorMessage,
            ]);
        }

        if ($this->isExplicitFailure($payload)) {
            $errorMessage = data_get($payload, 'message', __('auth.failed'));

            throw ValidationException::withMessages([
                $this->username() => $errorMessage,
            ]);
        }

        return $this->completeDemoLogin($request, $payload, $credentials);
    }
    
    /**
     * The user has been authenticated (UI Demo Mode).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended($this->redirectPath());
    }
    
    /**
     * Log the user out of the application (UI Demo Mode).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Clear user session
        session()->forget([
            'user_authenticated',
            'user_email',
            'user_name',
            'user_token',
            'user_id',
            'user_login_otp',
        ]);
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect('/login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function isExplicitFailure(array $payload): bool
    {
        $status = data_get($payload, 'status');
        $successFlag = data_get($payload, 'success');

        if (is_bool($successFlag) && $successFlag === false) {
            return true;
        }

        if (is_string($status) && in_array(strtolower($status), ['error', 'failed', 'unauthorized'], true)) {
            return true;
        }

        if (is_bool($status) && $status === false) {
            return true;
        }

        return false;
    }

    protected function otpRequired(array $payload): bool
    {
        // Check send_to field (case-insensitive)
        $sendTo = data_get($payload, 'send_to');
        if ($sendTo && in_array(Str::lower((string) $sendTo), ['ask_otp', 'otp', 'verify_otp'], true)) {
            return true;
        }

        // Check message field for OTP keywords
        $message = data_get($payload, 'message', '');
        if ($message && Str::contains(Str::lower((string) $message), ['otp verification required', 'enter otp', 'verify otp', 'new device detected'])) {
            return true;
        }

        // Check if deviceId is present (indicates OTP flow)
        if (data_get($payload, 'deviceId')) {
            return true;
        }

        return false;
    }

    protected function storePendingOtpChallenge(array $payload, array $credentials): void
    {
        $otpData = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'device_id' => data_get($payload, 'deviceId'),
            'message' => data_get($payload, 'message'),
        ];
        
        session(['user_login_otp' => $otpData]);
        session()->save(); // Force save session
    }

    protected function completeDemoLogin(Request $request, array $payload, array $credentials)
    {
        // Store all authentication data in session
        session([
            'user_authenticated' => true,
            'user_email' => $credentials['email'],
            'user_name' => data_get($payload, 'username') ?? data_get($payload, 'name') ?? 'User',
            'user_token' => data_get($payload, 'token'),
            'user_id' => data_get($payload, 'user_id'),
        ]);

        // Clear OTP session data
        session()->forget('user_login_otp');
        session()->save();

        \Log::info('User authenticated successfully', [
            'email' => $credentials['email'],
            'user_id' => data_get($payload, 'user_id'),
        ]);

        // Redirect to dashboard
        return redirect()->intended('/index');
    }

    public function showOtpForm(Request $request)
    {
        if (! session()->has('user_login_otp')) {
            \Log::warning('OTP form accessed without valid session');
            return redirect()->route('login');
        }

        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $otpContext = session('user_login_otp');

        if (! $otpContext) {
            return redirect()->route('login');
        }

        $request->validate([
            'otp' => ['required', 'digits:6'],
        ]);

        $endpoint = rtrim(config('services.demo_login.base_url'), '/') . '/erp_user/check_otp';

        $payload = [
            'email' => $otpContext['email'],
            'password' => $otpContext['password'],
            'otp' => $request->input('otp'),
            'deviceId' => data_get($otpContext, 'device_id'),
            'userAgent' => $request->header('User-Agent'),
            'ip' => $request->ip(),
        ];

        try {
            $response = Http::timeout(10)
                ->acceptJson()
                ->post($endpoint, $payload);
        } catch (ConnectionException $exception) {
            report($exception);

            return back()->withErrors([
                'otp' => __('Unable to reach authentication service. Please try again later.'),
            ]);
        }

        if (! $response->successful()) {
            $errorMessage = $response->json('message') ?? __('Invalid OTP provided.');

            return back()->withErrors([
                'otp' => $errorMessage,
            ])->withInput();
        }

        $payload = $response->json();

        if ($this->isExplicitFailure($payload)) {
            $errorMessage = data_get($payload, 'message', __('Invalid OTP provided.'));

            return back()->withErrors([
                'otp' => $errorMessage,
            ])->withInput();
        }

        if ($this->otpRequired($payload)) {
            $this->storePendingOtpChallenge($payload, [
                'email' => $otpContext['email'],
                'password' => $otpContext['password'],
            ]);

            return back()->withErrors([
                'otp' => __('A new OTP has been issued. Please check your email and try again.'),
            ])->withInput();
        }

        return $this->completeDemoLogin($request, $payload, [
            'email' => $otpContext['email'],
            'password' => $otpContext['password'],
        ]);
    }
}
