<x-tenant.guest-layout>
    <x-tenant.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-tenant.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-tenant.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('tenant.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-tenant.label for="password" :value="__('Password')" />

                <x-tenant.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-tenant.button>
                    {{ __('Confirm') }}
                </x-tenant.button>
            </div>
        </form>
    </x-tenant.auth-card>
</x-tenant.guest-layout>
