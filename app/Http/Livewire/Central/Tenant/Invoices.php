<?php

namespace App\Http\Livewire\Central\Tenant;

use Livewire\Component;

class Invoices extends Component
{
    public $tenant;

    protected $listeners = ['billingUpdated' => '$refresh'];

    public function refund($id)
    {

    }

    public function render()
    {
        return view('livewire.central.tenant.invoices');
    }
}
