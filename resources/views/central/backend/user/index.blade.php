<x-central.app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Management') }}
            </h2>
            @can('user:create')
            <a href="{{ route('central.user.create') }}" class="no-underline font-medium text-indigo-600 hover:text-indigo-500">
                + {{ __('Create User') }}
            </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('central.show-users')
        </div>
    </div>
</x-central.app-layout>
