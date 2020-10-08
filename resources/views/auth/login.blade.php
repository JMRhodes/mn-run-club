<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-slot name="title">
            Login
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-6">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mb-6">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex justify-center">
                {{-- <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label> --}}

                @if (Route::has('password.request'))
                    <a class="text-sm mb-6"
                    href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>


            <x-jet-button>
                {{ __('Login') }}
            </x-jet-button>

            <div class="flex justify-center mt-6 text-sm">
                {{ __('I\'m a new user.') }}
                <a class="font-bold text-secondary ml-2 underline" href="{{ route('register') }}">
                    {{ __('Sign Up') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
