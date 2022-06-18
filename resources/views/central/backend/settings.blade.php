<x-central.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setup & Configurations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/3">
                        <div class="px-4 md:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('General Settings') }}</h3>
{{--                            <p class="mt-1 text-sm leading-5 text-gray-600">{{ __("Update your account's profile information and email address.") }}</p>--}}
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                        @livewire('central.settings.general-settings-form')
                    </div>
                </div>

                <div class="py-8">
                    <div class="border-t border-transparent md:border-gray-200"></div>
                </div>

                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/3">
                        <div class="px-4 md:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Mail Settings') }}</h3>
                            <p class="mt-1 text-sm leading-5 text-gray-600">{{ __("Please be careful when you are configuring SMTP. For incorrect configuration you will get error at the time of new registration, sending newsletter.") }}</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                        @livewire('central.settings.mail-settings-form')
                    </div>
                </div>

                <div class="py-8">
                    <div class="border-t border-transparent md:border-gray-200"></div>
                </div>

                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/3">
                        <div class="px-4 md:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Stripe Credential') }}</h3>
                            <p class="mt-1 text-sm leading-5 text-gray-600">{{ __("The Stripe publishable key and secret key give you access to Stripe's API.") }}</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                        @livewire('central.settings.stripe-credential-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-central.app-layout>
