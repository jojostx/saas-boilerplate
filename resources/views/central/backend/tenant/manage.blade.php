<x-central.app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mange Subscription') }}
            </h2>
            <a href="{{ route('central.tenants.show',['tenant' => $tenant->id]) }}" class="no-underline font-medium text-gray-600 hover:text-gray-500">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                @livewire('central.tenant.upcoming-payment', ['tenant' => $tenant])
                @livewire('central.tenant.invoices', ['tenant' => $tenant])
                @livewire('central.tenant.subscription-plan', ['tenant' => $tenant])
                @livewire('central.tenant.charges', ['tenant' => $tenant])
            </div>
        </div>
    </div>
</x-central.app-layout>
