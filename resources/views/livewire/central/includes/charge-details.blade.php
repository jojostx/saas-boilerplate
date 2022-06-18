<div class="z-10 fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div @click.away="@this.set('open', '')" class="bg-white rounded-lg overflow-hidden shadow-xl transform sm:max-w-lg sm:w-full">
        <div class="bg-white pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            {{ __('Charge Details') }}
                        </h3>
                    </div>
                    <div class="mt-3">
                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('ID') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $details['id'] }}
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Amount') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ money($details['amount'], $details['currency']) }}
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Fee') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if(!$details['balance_transaction'])
                                            {{ money(0, $details['currency']) }}
                                        @else
                                            {{ money($details['balance_transaction']['fee'], $details['balance_transaction']['currency']) }}
                                        @endif
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Net') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if(!$details['balance_transaction'])
                                            {{ money(0, $details['currency']) }}
                                        @else
                                            {{ money($details['amount'] - $details['balance_transaction']['fee'], $details['currency']) }}
                                        @endif
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Status') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($charge['amount_refunded'])
                                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs uppercase">{{ __('Refunded') }}</span>
                                        @else
                                            <span class="@if($charge['status'] == 'succeeded') bg-green-200 text-green-600 @else bg-red-200 text-red-600 @endif py-1 px-3 rounded-full text-xs uppercase">{{ $charge['status'] }}</span>
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Livemode') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($details['livemode'])
                                            <x-central.check-circle />
                                        @else
                                            <x-central.x-circle />
                                        @endif
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Captured') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($details['captured'])
                                            <x-central.check-circle />
                                        @else
                                            <x-central.x-circle />
                                        @endif
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Paid') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($details['paid'])
                                            <x-central.check-circle />
                                        @else
                                            <x-central.x-circle />
                                        @endif
                                    </dd>
                                </div>
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Refunded') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        @if($details['refunded'])
                                            <x-central.check-circle />
                                        @else
                                            <x-central.x-circle />
                                        @endif
                                    </dd>
                                </div>

                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        {{ __('Created At') }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ Carbon\Carbon::createFromTimestamp($details['created'])->format('Y-m-d H:i:s') }}
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
