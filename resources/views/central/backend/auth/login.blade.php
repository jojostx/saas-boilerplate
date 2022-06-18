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

        <form method="POST" action="{{ route('central.admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-central.label for="email" :value="__('Email')" />

                <x-central.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-central.label for="password" :value="__('Password')" />

                <x-central.input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('central.admin.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('central.admin.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-central.button class="ml-3">
                    {{ __('Log in') }}
                </x-central.button>
            </div>
        </form>
    </x-central.auth-card>
</x-central.guest-layout>
