<x-central.app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create User') }}
            </h2>
            <a href="{{ route('central.user.index') }}" class="no-underline font-medium text-gray-600 hover:text-gray-500">
                {{ __('Cancel') }}
            </a>
        </div>
    </x-slot>
    <form method="post" action="{{ route('central.user.store') }}" class="py-12">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="w-full p-2">
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Name') }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    placeholder="{{ __('Name') }}"
                                >
                            </div>
                            @error('name')
                            <p class="text-sm mt-2 text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="w-full p-2">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Email Address') }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input
                                    id="email"
                                    name="email"
                                    type="text"
                                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                                    placeholder="{{ __('Email Address') }}"
                                >
                            </div>
                            @error('email')
                            <p class="text-sm mt-2 text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="w-full p-2">
                            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">{{ __('New Password') }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input id="password" name="password" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('New Password') }}">
                            </div>
                            @error('password')
                            <p class="text-sm mt-2 text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="w-full p-2">
                            <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Confirm Password') }}</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input id="password_confirmation" name="password_confirmation" type="password" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="{{ __('Confirm Password') }}">
                            </div>
                            @error('password_confirmation')
                            <p class="text-sm mt-2 text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="w-full p-2">
                            <label for="role" class="block text-sm font-medium leading-5 text-gray-700">{{ __('Role') }}</label>
                            <div class="mt-1 relative rounded-md">
                                @foreach($roles as $role)
                                <label class="inline-flex items-center mt-3">
                                    <input type="checkbox" name="roles[]" class="h-5 w-5 text-indigo-600" value="{{ $role->name }}">
                                    <span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                </label>
                                @endforeach
                            </div>

                            @error('roles')
                            <p class="text-sm mt-2 text-red-500">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>
                    <div class="px-4 sm:px-6 py-2 bg-gray-50 flex justify-end">
                        <button type="submit" class="px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue focus:bg-indigo-500 active:bg-indigo-600 transition duration-150 ease-in-out">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-central.app-layout>
