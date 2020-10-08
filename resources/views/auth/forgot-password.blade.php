<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-slot name="title">
            Forgot Password
        </x-slot>

        <div class="mb-6">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block mb-10">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <x-jet-button>
                {{ __('Email Password Reset Link') }}
            </x-jet-button>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
