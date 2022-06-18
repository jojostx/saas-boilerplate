<?php

namespace App\Http\Livewire\Central\Tenant;

use App\Http\Livewire\Traits\StripeClient;
use Livewire\Component;
use Stripe\Refund;

class Charges extends Component
{
    use StripeClient;

    public $tenant;
    public $page = 1;
    public $charges;
    public $open = '';
    public $details = [];

    protected $listeners = ['billingUpdated' => '$refresh'];

    public function mount()
    {
        $this->charges = ($this->listCharges([
            'customer' => $this->tenant->asStripeCustomer()->id
        ]))->toArray();
    }

    public function refund($id, $amount)
    {
        $refundParameters = ['charge' => $id];
        $refundParameters['amount'] = intval($amount);
        Refund::create($refundParameters);
        $this->emit('billingUpdated');
    }

    public function nextPage()
    {
        $count = count($this->charges['data']) - 1;
        $this->charges = ($this->listCharges([
            'customer' => $this->tenant->asStripeCustomer()->id,
            'starting_after' => $this->getChargeId($count)
        ]))->toArray();
        $this->page++;
    }

    public function previousPage()
    {
        $this->charges = ($this->listCharges([
            'customer' => $this->tenant->asStripeCustomer()->id,
            'ending_before' => $this->getChargeId(0)
        ]))->toArray();

        if ($this->page > 1){
            $this->page--;
        }
    }

    public function openDetailsModal($id)
    {
        $this->open = $id;
        if ($id){
            $this->details = ($this->getCharge($id))->toArray();
        }
    }

    public function render()
    {
        return view('livewire.central.tenant.charges');
    }

    protected function getChargeId($count)
    {
        return $this->charges['data'][$count]['id'];
    }
}
