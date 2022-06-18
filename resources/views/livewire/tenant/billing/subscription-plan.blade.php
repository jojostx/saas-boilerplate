<div class="mt-8" x-data="{ cancelModalOpen: false, cancellationReason: null, otherReason: '' }">
    <template x-if="cancelModalOpen">
        <div class="z-10 fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
            <div class="fixed inset-0">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div @click.away="cancelModalOpen = false" class="bg-white rounded-lg overflow-hidden shadow-xl transform sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                {{ __('Cancel Subscription') }}
                            </h3>
                            <div class="mt-3">
                                <p class="text-sm text-gray-600">
                                    {{ __("We are sad to see you go. In order to improve our services, we would appreciate you taking a few moments to tell us why this product wasn't suited for you.") }}
                                </p>
                                <select x-model="cancellationReason" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full mt-3">
                                    <option>{{ __('Cancellation Reason') }}</option>
                                    @foreach(config('boilerplate.cancellation_reasons') as $reason)
                                        <option>{{ $reason }}</option>
                                    @endforeach
                                    <option>Other</option>
                                </select>
                                <input x-show="cancellationReason == 'Other'" x-model="otherReason" type="text" class="mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="I'm canceling my subscription because ...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse flex flex-col">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button @click="@this.call('cancel', cancellationReason === 'Other' ? otherReason : cancellationReason); cancelModalOpen = false" type="button" class="w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 shadow-sm hover:bg-red-500 focus:outline-none focus:shadow-outline-blue focus:bg-red-500 active:bg-red-600 transition duration-150 ease-in-out">
                            Cancel Subscription
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button @click="cancelModalOpen = false" type="button" class="w-full items-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md bg-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            Close
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </template>

    <h3 class="text-lg font-medium text-gray-900">Change subscription plan</h3>
    <div class="mt-2 shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            @foreach(config('boilerplate.plans') as $code => $name)
                <div class="@if(! $loop->first) mt-4 @endif flex items-center">
                    <input wire:model="plan" id="opt_{{ $code }}" name="subscription-plan" value="{{ $code }}" type="radio" class="h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                    <label for="opt_{{ $code }}" class="ml-3">
                        <span class="block text-sm leading-5 font-medium text-gray-700">{{ $name }}</span>
                    </label>
                </div>
            @endforeach

            @error('plan')
            <p class="text-sm mt-4 text-red-500">
                {{ $message }}
            </p>
            @enderror

            @if($success)
            <p class="text-sm mt-4 text-green-500">
                {{ $success }}
            </p>
            @endif

            @if($error)
            <p class="text-sm mt-4 text-red-500">
                {{ $error }}
            </p>
            @endif
        </div>
        <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
            @if(tenant()->on_active_subscription)
                <button id="cancelSub" name="cancelSub" type="button" @click="cancelModalOpen = true" class="mr-2 items-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-red-700 bg-white hover:text-red-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                    Cancel Subscription
                </button>
            @elseif(tenant()->subscribed('default') && tenant()->subscription('default')->cancelled())
                <button id="resumeSub" name="resumeSub" type="button" wire:click="resume" class="mr-2 items-center py-2 px-4 border border-gray-300 text-sm font-medium rounded-md text-green-700 bg-white hover:text-green-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                    Resume Subscription ({{ tenant()->plan_name }})
                </button>
            @endif
            <button type="button" wire:click="update" class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out">
                {{ __('Change Plan') }}
            </button>
        </div>
    </div>
</div>
