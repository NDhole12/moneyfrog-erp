@extends('layouts.master-without-nav')
@section('title')
    OTP Verification
@endsection

@section('css')
<style>
    .otp-input {
        width: 50px !important;
        height: 50px;
        font-size: 24px;
        font-weight: 600;
        border: 2px solid #ced4da;
        border-radius: 8px;
        transition: all 0.3s ease;
        background-image: none !important; /* Remove exclamation icon */
        padding-right: 0.75rem !important; /* Reset padding */
    }
    
    .otp-input:focus {
        border-color: #405189;
        box-shadow: 0 0 0 0.2rem rgba(64, 81, 137, 0.25);
        outline: 0;
        background-image: none !important;
    }
    
    .otp-input.is-invalid {
        border-color: #f06548 !important;
        background-image: none !important; /* No icon on error */
    }
    
    .otp-input.is-invalid:focus {
        border-color: #f06548 !important;
        box-shadow: 0 0 0 0.2rem rgba(240, 101, 72, 0.25);
        background-image: none !important;
    }
    
    @media (max-width: 576px) {
        .otp-input {
            width: 40px !important;
            height: 40px;
            font-size: 18px;
        }
    }
</style>
@endsection

@section('content')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="https://moneyfrog.in/images/new_home/logo-large.svg" alt="MoneyFrog" style="height: 50px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary mb-2">OTP Verification</h5>
                                    <p class="text-muted">Enter 6 Digit OTP from Email</p>
                                    @if (session('user_login_otp.email'))
                                        <p class="text-muted mb-0">Sent to <strong>{{ session('user_login_otp.email') }}</strong></p>
                                    @endif
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-info text-center mt-3" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login.otp.verify') }}" class="p-2 mt-4">
                                    @csrf
                                    @php
                                        $oldOtp = old('otp');
                                        $otpDigits = $oldOtp ? str_split(preg_replace('/\D/', '', $oldOtp)) : [];
                                    @endphp
                                    <div class="mb-4">
                                        <label class="form-label d-block">Enter 6 Digit OTP from Email</label>
                                        <div class="d-flex justify-content-center gap-2 otp-inputs">
                                            @for ($i = 0; $i < 6; $i++)
                                                <input type="text"
                                                    class="form-control text-center otp-input @error('otp') is-invalid @enderror"
                                                    maxlength="1" inputmode="numeric" pattern="[0-9]"
                                                    autocomplete="off" aria-label="OTP digit {{ $i + 1 }}"
                                                    data-index="{{ $i }}" value="{{ $otpDigits[$i] ?? '' }}">
                                            @endfor
                                        </div>
                                        <input type="hidden" name="otp" id="otp-value" value="{{ old('otp') }}">
                                        @error('otp')
                                            <div class="text-danger text-center mt-2" style="font-size: 14px;">
                                                <i class="ri-error-warning-line"></i> {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <a href="{{ route('login', ['cancel_otp' => 1]) }}" class="text-muted text-decoration-underline">Back to Login</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; <script>document.write(new Date().getFullYear())</script> Moneyfrog Financial Services Private Limited</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('script')
    <script>
        (function () {
            const inputs = Array.from(document.querySelectorAll('.otp-input'));
            const hiddenInput = document.getElementById('otp-value');

            if (!inputs.length || !hiddenInput) {
                return;
            }

            const updateHiddenInput = () => {
                const value = inputs.map(input => input.value.replace(/\D/g, '')).join('');
                hiddenInput.value = value;
            };

            inputs.forEach((input, index) => {
                input.addEventListener('input', (event) => {
                    const value = event.target.value.replace(/\D/g, '');
                    event.target.value = value;

                    if (value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                        inputs[index + 1].select();
                    }

                    updateHiddenInput();
                });

                input.addEventListener('keydown', (event) => {
                    if (event.key === 'Backspace' && !event.target.value && index > 0) {
                        inputs[index - 1].focus();
                    }
                    if (event.key === 'ArrowLeft' && index > 0) {
                        inputs[index - 1].focus();
                        event.preventDefault();
                    }
                    if (event.key === 'ArrowRight' && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                        event.preventDefault();
                    }
                });

                input.addEventListener('focus', () => {
                    input.select();
                });
            });

            updateHiddenInput();
        })();
    </script>
@endsection
