<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-tenant.auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('tenant.password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-tenant.label for="email" :value="__('Email')" />

                <x-tenant.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-tenant.button>
                    {{ __('Email Password Reset Link') }}
                </x-tenant.button>
            </div>
        </form>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
