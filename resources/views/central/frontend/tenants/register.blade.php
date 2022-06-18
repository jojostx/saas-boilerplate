<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('central.tenant.register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-central.label for="name" :value="__('Name')" />

                <x-central.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Domain -->
            <div class="mt-4">
                <x-central.label for="domain" :value="__('Domain')" />

                <x-central.input-domain id="domain" class="block mt-1 w-full" type="text" name="domain" :value="old('domain')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-central.label for="email" :value="__('Email')" />

                <x-central.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-central.label for="password" :value="__('Password')" />

                <x-central.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-central.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-central.input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('tenant.login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-central.button class="ml-4">
                    {{ __('Register') }}
                </x-central.button>
            </div>
        </form>
    </x-central.auth-card>
</x-central.guest-layout>
