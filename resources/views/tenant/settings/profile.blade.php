@extends('tenant.settings.index')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
            <div class="flex flex-row flex-wrap">
                <div class="w-full md:w-1/3">
                    <div class="px-4 md:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Profile Information') }}</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">{{ __("Update your account's profile information and email address.") }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                    @livewire('tenant.profile.update-profile-information')
                </div>
            </div>

            <div class="py-8">
                <div class="border-t border-transparent md:border-gray-200"></div>
            </div>

            <div class="flex flex-row flex-wrap">
                <div class="w-full md:w-1/3">
                    <div class="px-4 md:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Update Password') }}</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                    @livewire('tenant.profile.update-password')
                </div>
            </div>

            <div class="py-8">
                <div class="border-t border-transparent md:border-gray-200"></div>
            </div>

            <div class="flex flex-row flex-wrap">
                <div class="w-full md:w-1/3">
                    <div class="px-4 md:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Browser Sessions') }}</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">{{ __('Manage and log out your active sessions on other browsers and devices.') }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2">
                    @livewire('tenant.profile.logout-other-browser-sessions')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
