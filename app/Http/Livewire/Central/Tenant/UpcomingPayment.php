<?php

namespace App\Http\Livewire\Central\Tenant;

use Livewire\Component;

class UpcomingPayment extends Component
{
    public $tenant;

    protected $listeners = ['billingUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.central.tenant.upcoming-payment');
    }
}
