<div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
    <div class="p-5 bg-white rounded shadow-sm">
        <div class="text-base text-gray-400 ">{{ __('Available Balance') }}</div>
        <div class="flex items-center pt-1">
            @foreach($balance['available'] as $available)
                <div class="text-2xl font-bold text-gray-900 ">
                    {{ money($available['amount'], $available['currency']) }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-5 bg-white rounded shadow-sm">
        <div class="text-base text-gray-400 ">{{ __('Pending Balance') }}</div>
        <div class="flex items-center pt-1">
            @foreach($balance['pending'] as $pending)
                <div class="text-2xl font-bold text-gray-900 ">
                    {{ money($pending['amount'], $pending['currency']) }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="p-5 bg-white rounded shadow-sm">
        <div class="text-base text-gray-400 ">{{ __('Tenants') }}</div>
        <div class="flex items-center pt-1">
            <div class="text-2xl font-bold text-gray-900 ">
                {{ $tenants }}
            </div>
        </div>
    </div>
</div>
