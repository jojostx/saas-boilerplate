<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="w-full p-2">
            <label for="app_name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Site Name') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input id="app_name" wire:model="app_name" type="text" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Site Name') }}">
            </div>
            @error('app_name')
            <p class="text-sm mt-2 text-red-500">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="w-full p-2 mt-4">
            <label for="app_timezone" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Timezone') }}</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <select id="app_timezone" wire:model="app_timezone" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    @include('partials.timezone')
                </select>
            </div>
            @error('app_timezone')
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
            wire:target="saveGeneralSettings"
            class="px-4 py-2"
        >
           Updating...
        </div>
        <button
            wire:loading.attr="disabled"
            wire:click="saveGeneralSettings"
            class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out"
        >
            {{ __('Save') }}
        </button>
    </div>
</div>
