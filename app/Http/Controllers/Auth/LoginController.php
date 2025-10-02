<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
    /**
     * Handle a login request to the application (UI Demo Mode).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // For UI demo purposes, accept any email/password combination
        // In a real application, this would authenticate against a database
        $credentials = $this->credentials($request);
        
        if ($credentials['email'] && $credentials['password']) {
            // Create a fake user session for UI demo
            session([
                'demo_user_authenticated' => true,
                'demo_user_email' => $credentials['email'],
                'demo_user_name' => 'Demo User'
            ]);
            
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
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
        // Clear demo session
        session()->forget(['demo_user_authenticated', 'demo_user_email', 'demo_user_name']);
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
}
