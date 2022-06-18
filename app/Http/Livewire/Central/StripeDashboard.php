<?php

namespace App\Http\Livewire\Central;

use App\Http\Livewire\Traits\StripeClient;
use Livewire\Component;

class StripeDashboard extends Component
{
    use StripeClient;

    public $balance;
    public $charges;
    public $page = 1;
    public $open = '';
    public $details = [];

    public function mount() {
        $this->balance = ($this->getBalance())->toArray();
        $this->charges = ($this->listCharges())->toArray();
    }

    public function nextPage()
    {
        $count = count($this->charges['data']) - 1;
        $this->charges = ($this->listCharges([
            'starting_after' => $this->getChargeId($count)
        ]))->toArray();
        $this->page++;
    }

    public function previousPage()
    {
        $this->charges = ($this->listCharges([
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
        return view('livewire.central.stripe-dashboard');
    }

    protected function getChargeId($count)
    {
        return $this->charges['data'][$count]['id'];
    }
}
