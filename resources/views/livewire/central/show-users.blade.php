<div class="bg-white overflow-hidden shadow-md sm:rounded-lg" x-data="{}">
    <table class="min-w-max w-full table-auto">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
            <th class="py-3 px-6 text-left">{{ __('Email Address') }}</th>
            <th class="py-3 px-6 text-center">{{ __('Roles') }}</th>
            <th class="py-3 px-6 text-center">{{ __('Status') }}</th>
            <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $user->name }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>{{ $user->email }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    {!! $user->roles_label !!}
                </td>
                <td class="py-3 px-6 text-center">
                    @if($user->active)
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ __('Active') }}</span>
                    @else
                        <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ __('Not Active') }}</span>
                    @endif
                </td>
                <td class="py-3 px-6 text-center">
                    @include('central.backend.user.includes.actions')
                </td>
            </tr>
        @endforeach
        </tbody>
        @if($users->hasPages())
        <tfoot>
            <tr>
                <td colspan="5" class="px-4 py-2">
                    {{ $users->links() }}
                </td>
            </tr>
        </tfoot>
        @endif
    </table>
</div>
