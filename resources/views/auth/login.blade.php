<x-guest-layout>
    <x-auth-card>
        <h4 class="mb-2">Welcome to {{ config('app.name') }}! 👋</h4>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="mb-3" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
			<div class="mb-3">
                <x-label for="email" :value="__('Email')" />

                <x-input.text id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <x-label for="password" :value="__('Password')" />

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            <small>Forgot Password?</small>
                        </a>
                    @endif
                </div>

                <div class="input-group input-group-merge">
                    <x-input.text id="password"
                        type="password"
                        name="password"
                        required autocomplete="current-password" aria-describedby="password" />

                    <span class="input-group-text cursor-pointer">
                        <i class="bx bx-hide"></i>
                    </span>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                    <label class="form-check-label" for="remember-me">{{ __('Remember me') }}</label>
                </div>
            </div>

            <div class="mb-3">
                <x-button class="btn-primary d-grid w-100">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        {{-- <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{ route('register') }}">
                <span>Create an account</span>
            </a>
        </p> --}}
    </x-auth-card>
</x-guest-layout>
