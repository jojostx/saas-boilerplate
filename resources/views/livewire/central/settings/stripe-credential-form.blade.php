<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6 flex flex-row flex-wrap">
        <div class="w-1/2 p-2 mt-4">
            <label for="stripe_key" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Stripe Key') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="stripe_key" wire:model="stripe_key" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Stripe Key') }}">
            </div>
            @error('stripe_key')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="stripe_secret" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Stripe Secret') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="stripe_secret" wire:model="stripe_secret" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Stripe Secret') }}">
            </div>
            @error('stripe_secret')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="cashier_currency" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Cashier Currency') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="cashier_currency" wire:model="cashier_currency" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Cashier Currency') }}">
            </div>
            @error('cashier_currency')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-1/2 p-2 mt-4">
            <label for="cashier_currency_locale" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Cashier Currency Locale') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="cashier_currency_locale" wire:model="cashier_currency_locale" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Cashier Currency Locale') }}">
            </div>
            @error('cashier_currency_locale')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-full px-2">
            @if($success)
                <p class="text-sm mt-4 text-green-500">
                    {{ $success }}
                </p>
            @endif
        </div>
    </div>

    <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
        <div
            wire:loading
            wire:target="saveStripeCredential"
            class="px-4 py-2"
        >
            Updating...
        </div>
        <button wire:loading.attr="disabled"  wire:click="saveStripeCredential" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out">
            {{ __('Save') }}
        </button>
    </div>
</div>
