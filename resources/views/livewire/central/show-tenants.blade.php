<div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
    <table class="min-w-max w-full table-auto">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">{{ __('Id') }}</th>
                <th class="py-3 px-6 text-left">{{ __('Email Address') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Name') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Trials Until') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach($tenants as $tenant)
            <tr>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <span class="font-medium">{{ $tenant->id }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>{{ $tenant->email }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <span>{{ $tenant->name }}</span>
                    </div>
                </td>
                <td class="py-3 px-6 text-center">
                    {{ Carbon\Carbon::parse($tenant->trial_ends_at)->addDays(config('boilerplate.trial_days')) }}
                </td>
                <td class="py-3 px-6 text-center">
                    @include('central.backend.tenant.includes.actions')
                </td>
            </tr>
        @endforeach
        </tbody>
        @if($tenants->hasPages())
        <tfoot>
            <tr>
                <td colspan="5" class="px-4 py-2">
                    {{ $tenants->links() }}
                </td>
            </tr>
        </tfoot>
        @endif
    </table>
</div>
