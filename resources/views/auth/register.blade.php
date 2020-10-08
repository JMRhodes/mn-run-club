<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-slot name="title">
            Register
        </x-slot>

        <x-jet-validation-errors />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input type="password" name="password_confirmation" required
                    autocomplete="new-password" />
            </div>

            <div class="block mt-4 mb-10 flex justify-end">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <x-jet-button>
                {{ __('Register') }}
            </x-jet-button>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
