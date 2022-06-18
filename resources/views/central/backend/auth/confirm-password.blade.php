<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('central.admin.password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-central.label for="password" :value="__('Password')" />

                <x-central.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-central.button>
                    {{ __('Confirm') }}
                </x-central.button>
            </div>
        </form>
    </x-central.auth-card>
</x-central.guest-layout>
