<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('tenant.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('tenant.token') }}">

            <!-- Email Address -->
            <div>
                <x-tenant.label for="email" :value="__('Email')" />

                <x-tenant.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-tenant.label for="password" :value="__('Password')" />

                <x-tenant.input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-tenant.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-tenant.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-tenant.button>
                    {{ __('Reset Password') }}
                </x-tenant.button>
            </div>
        </form>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
