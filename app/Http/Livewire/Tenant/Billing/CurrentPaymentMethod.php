<?php

namespace App\Http\Livewire\Tenant\Billing;

use Livewire\Component;

class CurrentPaymentMethod extends Component
{
    protected $listeners = ['billingUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.tenant.billing.current-payment-method');
    }
}
