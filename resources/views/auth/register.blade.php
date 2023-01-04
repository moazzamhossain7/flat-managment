<x-guest-layout>
    <x-auth-card>
        <h4 class="mb-2">Welcome to {{ config('app.name') }}! 👋</h4>
        <p class="mb-4">Make your app management easy and fun!</p>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="mb-3" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" />

                <x-input.text id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />

                <x-input.text id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />

                <x-input.text id="password"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input.text id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                </div>
            </div>      

            <x-button class="btn-primary d-grid w-100">
                {{ __('Register') }}
            </x-button>
        </form>

        <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}">
                <span>Sign in instead</span>
            </a>
        </p>        
    </x-auth-card>
</x-guest-layout>
