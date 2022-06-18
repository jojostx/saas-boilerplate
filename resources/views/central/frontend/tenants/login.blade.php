<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-central.auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('central.tenant.login') }}">
            @csrf

            <div class="flex">
                <!-- Domain -->
                <div class="mt-4">
                    <x-central.label for="domain" :value="__('Domain')" />

                    <x-central.input-domain id="domain" class="block mt-1 w-full" type="text" name="domain" :value="old('domain')" required autofocus />
                </div>

                <div class="flex items-end justify-end mt-4">
                    <x-central.button class="ml-3 py-3">
                        {{ __('Continue') }}
                    </x-central.button>
                </div>
            </div>

        </form>
    </x-central.auth-card>
</x-central.guest-layout>
