<?php

namespace App\Http\Livewire\Central;

use App\Http\Livewire\Traits\StripeClient;
use App\Models\Central\Tenant\Tenant;
use Livewire\Component;

class Dashboard extends Component
{
    use StripeClient;

    public $balance;
    public $charges;
    public $tenants;

    public function mount() {
        $this->balance = ($this->getBalance())->toArray();
        $this->charges = ($this->listCharges())->toArray();
        $this->tenants = count(Tenant::all());
    }

    public function render()
    {
        return view('livewire.central.dashboard');
    }
}
