<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('tenant.register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-tenant.label for="name" :value="__('Name')" />

                <x-tenant.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-tenant.label for="email" :value="__('Email')" />

                <x-tenant.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-tenant.label for="password" :value="__('Password')" />

                <x-tenant.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-tenant.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-tenant.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('tenant.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-tenant.button class="ml-4">
                    {{ __('Register') }}
                </x-tenant.button>
            </div>
        </form>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
