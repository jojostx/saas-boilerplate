<div x-data="{}">
    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-2">
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
    </div>

    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mt-6">
        <table class="min-w-max w-full table-auto">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">{{ __('Charge ID') }}</th>
                <th class="py-3 px-6 text-left">{{ __('Object') }}</th>
                <th class="py-3 px-6 text-left">{{ __('Amount') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Created') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Status') }}</th>
                <th class="py-3 px-6 text-center">{{ __('Actions') }}</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach($charges['data'] as $charge)
                <tr class="border-b border-gray-200">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span>{{ $charge['id'] }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span>{{ $charge['object'] }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span>{{ money($charge['amount'], $charge['currency']) }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{ Carbon\Carbon::createFromTimestamp($charge['created'])->format('Y-m-d H:i:s') }}
                    </td>
                    <td class="py-3 px-6 text-center">
                        @if($charge['amount_refunded'])
                            <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs uppercase">{{ __('Refunded') }}</span>
                        @else
                            <span class="@if($charge['status'] == 'succeeded') bg-green-200 text-green-600 @else bg-red-200 text-red-600 @endif py-1 px-3 rounded-full text-xs uppercase">{{ $charge['status'] }}</span>
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        <button type="button" wire:click="openDetailsModal('{{ $open ==  $charge['id'] ? '' : $charge['id'] }}')" class="ml-2 inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs leading-4 font-medium rounded text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            {{ __('View Details') }}
                        </button>
                    </td>
                </tr>
                @if($open ==  $charge['id'])
                    @include('livewire.central.includes.charge-details')
                @endif
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-left px-6 py-2">
                        {{ __('Page') }} : {{ $page }}
                    </td>
                    <td colspan="4" class="text-right">
                        @if($page > 1)
                            <button
                                wire:click="previousPage"
                                class="background-transparent font-bold uppercase px-4 py-2 text-md outline-none focus:outline-none ease-linear transition-all duration-150"
                            >
                                {{ __('Previous') }}
                            </button>
                        @endif
                        @if($charges['has_more'] || $page > 0)
                            <button
                                wire:click="nextPage"
                                class="background-transparent font-bold uppercase px-4 py-2 text-md outline-none focus:outline-none ease-linear transition-all duration-150"
                            >
                                {{ __('Next') }}
                            </button>
                        @endif
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
