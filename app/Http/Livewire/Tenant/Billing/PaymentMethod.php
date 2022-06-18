<?php

namespace App\Http\Livewire\Tenant\Billing;

use Livewire\Component;

class PaymentMethod extends Component
{
    public $paymentMethod;

    public function save()
    {
        $this->validate([
            'paymentMethod' => 'required|string|regex:/^pm/',
        ]);

        tenant()->updateDefaultPaymentMethod($this->paymentMethod);

        $this->emit('billingUpdated');
    }

    public function render()
    {
        return view('livewire.tenant.billing.payment-method', [
            'intent' => tenant()->createSetupIntent()
        ]);
    }
}
