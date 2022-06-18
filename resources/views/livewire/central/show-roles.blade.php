<div class="bg-white overflow-hidden shadow-md sm:rounded-lg" x-data="{}">
    <table class="min-w-max w-full table-auto">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">{{ __('Name') }}</th>
            <th class="py-3 px-6 text-right">{{ __('Actions') }}</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach($roles as $role)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $role->name }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-right">
                    @include('central.backend.role.includes.actions')
                </td>
            </tr>
        @endforeach
        </tbody>
        @if($roles->hasPages())
            <tfoot>
            <tr>
                <td colspan="5" class="px-4 py-2">
                    {{ $roles->links() }}
                </td>
            </tr>
            </tfoot>
        @endif
    </table>
</div>
