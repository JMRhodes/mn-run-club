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
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4 mb-10 flex justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-xs font-medium text-gray-500">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-xs text-gray-500 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>


            <x-jet-button class="mb-8">
                {{ __('Login') }}
            </x-jet-button>

            <div class="block text-gray-700 font-medium flex justify-center">
                {{ __('I\'m a new user.') }}
                <a class="ml-2 font-bold text-orange-500 hover:text-orange-600 transition ease-in-out duration-150"
                    href="{{ route('register') }}">
                    {{ __('Sign Up') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
