@extends('tenant.settings.index')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/3">
                        <div class="px-4 md:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Billing') }}</h3>
                            <p class="mt-1 text-sm leading-5 text-gray-600">{{ __('Manage your subscription and payment methods.') }}</p>
                        </div>
                    </div>
                    <div class="mt-4 md:mt-0 w-full md:w-2/3 pl-0 md:pl-2 sm:px-4">
                        @livewire('tenant.billing.upcoming-payment')
                        @livewire('tenant.billing.billing-address')
                        @livewire('tenant.billing.subscription-banner')
                        @livewire('tenant.billing.invoices')
                        @livewire('tenant.billing.subscription-plan')
                        @livewire('tenant.billing.payment-method')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
