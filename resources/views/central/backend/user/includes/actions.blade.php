<div class="flex item-center justify-end">
    <div class="transform hover:text-indigo-500 hover:scale-110">
        <a href="{{ route('central.user.show', ['user' => $user->id]) }}" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-indigo-300 text-xs leading-4 font-medium rounded text-indigo-700 bg-white hover:text-indigo-500 focus:outline-none focus:border-indigo-300 focus:shadow-outline-blue active:text-indigo-800 active:bg-indigo-50 transition ease-in-out duration-150">
            {{ __('View Details') }}
        </a>
    </div>
    <div class="transform hover:text-purple-500 hover:scale-110">
        <a href="{{ route('central.user.edit', ['user' => $user->id]) }}" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-purple-300 text-xs leading-4 font-medium rounded text-purple-700 bg-white hover:text-purple-500 focus:outline-none focus:border-purple-300 focus:shadow-outline-purple active:text-purple-800 active:bg-purple-50 transition ease-in-out duration-150">
            {{ __('Edit') }}
        </a>
    </div>
    @can('user:delete')
        @if(auth()->user()->id != $user->id)
            <div class="transform hover:text-red-500 hover:scale-110">
                <button type="button" wire:click="$set('deleteId', '{{ $user->id }}')" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-red-300 text-xs leading-4 font-medium rounded text-red-700 bg-white hover:text-red-500 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:text-red-800 active:bg-red-50 transition ease-in-out duration-150">
                    {{ __('Delete') }}
                </button>
            </div>
        @endif
    @endcan
</div>

@if($deleteId ==  $user->id)
<div class="z-10 fixed bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
    <div class="fixed inset-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div @click.away="@this.set('deleteId', '')" class="bg-white rounded-lg overflow-hidden shadow-xl transform sm:max-w-lg sm:w-full">
        <div class="bg-white pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    {{ __('Delete User') }} : {{ $user->name }}
                </h3>
                <div class="mt-4">
                    <p>{{ __('Are you sure want to delete?') }}</p>
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="button" wire:click="$set('deleteId', '')" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs leading-4 font-medium rounded text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray active:text-gray-800 active:bg-red-50 transition ease-in-out duration-150">
                        {{ __('Cancel') }}
                    </button>
                    <button type="button" wire:click="delete" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-red-300 text-xs leading-4 font-medium rounded text-red-700 bg-white hover:text-red-500 focus:outline-none focus:border-red-300 focus:shadow-outline-red active:text-red-800 active:bg-red-50 transition ease-in-out duration-150">
                        {{ __('Delete') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
