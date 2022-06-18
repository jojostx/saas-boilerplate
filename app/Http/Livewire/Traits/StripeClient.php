<?php


namespace App\Http\Livewire\Traits;

use Stripe\Balance;
use Stripe\Charge;

trait StripeClient
{
    protected function getBalance() {
        return Balance::retrieve(['api_key' => config('services.stripe.secret')]);
    }

    protected function getCharge($id)
    {
        return Charge::retrieve(['id' => $id, 'expand' => ['balance_transaction']], ['api_key' => config('services.stripe.secret')]);
    }

    protected function listCharges($options = []) {
        return Charge::all($options, ['api_key' => config('services.stripe.secret')]);
    }
}
