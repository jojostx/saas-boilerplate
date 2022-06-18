<x-tenant.app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="pt-3 space-x-8 sm:-my-px">
            <x-tenant.nav-link :href="route('tenant.settings.profile')" :active="request()->routeIs('tenant.settings.profile')">
                {{ __('Profile') }}
            </x-tenant.nav-link>

            @owner
            <x-tenant.nav-link :href="route('tenant.settings.billing')" :active="request()->routeIs('tenant.settings.billing')">
                {{ __('Billing & Plans') }}
            </x-tenant.nav-link>
            @endowner
        </div>
    </div>

    @yield('content')
</x-tenant.app-layout>
