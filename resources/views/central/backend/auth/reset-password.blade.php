<x-central.guest-layout>
    <x-central.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-central.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-central.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('central.admin.password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('central.admin.token') }}">

            <!-- Email Address -->
            <div>
                <x-central.label for="email" :value="__('Email')" />

                <x-central.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-central.label for="password" :value="__('Password')" />

                <x-central.input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-central.label for="password_confirmation" :value="__('Confirm Password')" />

                <x-central.input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-central.button>
                    {{ __('Reset Password') }}
                </x-central.button>
            </div>
        </form>
    </x-central.auth-card>
</x-central.guest-layout>
