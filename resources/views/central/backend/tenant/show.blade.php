<x-central.app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tenant Details') }}
            </h2>
            <a href="{{ route('central.tenants.index') }}" class="no-underline font-medium text-gray-600 hover:text-gray-500">
                {{ __('Back') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <dl>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('ID') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tenant->id }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Email Address') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tenant->email }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Name') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $tenant->name }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Trial Until') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ Carbon\Carbon::parse($tenant->trial_ends_at)->addDays(config('boilerplate.trial_days')) }}
                        </dd>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ __('Ready') }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @if($tenant->ready)
                                <x-central.check-circle />
                            @else
                                <x-central.x-circle />
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>

            @if($subscription)
                <div class="mt-10">
                    <div class="flex items-center justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Manage Subscription') }}
                        </h2>
                        <a href="{{ route('central.tenants.manage.subscription',['tenant' => $tenant->id]) }}" class="no-underline font-medium text-blue-600 hover:text-blue-500">
                            {{ __('Manage') }}
                        </a>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mt-6">
                @if(!$subscription)
                    <p class="text-center p-6">User has no subscription.</p>
                @else
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                {{ __('Plan') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $subscription['plan'] }} ( {{ money($subscription['plan_amount'], $subscription['plan_currency']) }}/{{ $subscription['plan_interval'] }} )
                            </dd>
                        </div>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                {{ __('Subscribed Since') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $subscription['created_at'] }}
                            </dd>
                        </div>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                {{ __('Billing Period') }}
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $subscription['current_period_start'] }} => {{ $subscription['current_period_end'] }}
                            </dd>
                        </div>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                {{ __('Status') }}
                            </dt>
                            @if($subscription['on_grace_period'])
                                <dd class="mt-1 text-sm text-yellow-500 sm:mt-0 sm:col-span-2">
                                    {{ __('On Grace Period') }}
                                </dd>
                            @endif

                            @if($subscription['cancelled'] || $subscription['cancel_at_period_end'])
                                <dd class="mt-1 text-sm text-red-500 sm:mt-0 sm:col-span-2">
                                    {{ __('Cancelled') }}
                                </dd>
                            @endif

                            @if($subscription['active'] && !$subscription['cancelled'] && !$subscription['cancel_at_period_end'])
                                <dd class="mt-1 text-sm text-green-500 sm:mt-0 sm:col-span-2">
                                    {{ __('Active') }}
                                </dd>
                            @endif
                        </div>
                    </dl>
                @endif
            </div>
        </div>
    </div>
</x-central.app-layout>
