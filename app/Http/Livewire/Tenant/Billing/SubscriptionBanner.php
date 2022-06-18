<?php

namespace App\Http\Livewire\Tenant\Billing;

use Livewire\Component;

class SubscriptionBanner extends Component
{
    protected $listeners = ['billingUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.tenant.billing.subscription-banner');
    }
}
