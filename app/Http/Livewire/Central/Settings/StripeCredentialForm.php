<?php

namespace App\Http\Livewire\Central\Settings;

use Livewire\Component;

class StripeCredentialForm extends Component
{
    public $stripe_key;
    public $stripe_secret;
    public $cashier_currency;
    public $cashier_currency_locale;

    public $success;

    protected $listeners = ['settingsUpdated' => '$refresh'];

    public function mount()
    {
        $this->stripe_key = setting('stripe_key', env('STRIPE_KEY'));
        $this->stripe_secret = setting('stripe_secret', env('STRIPE_SECRET'));
        $this->cashier_currency = setting('cashier_currency', 'usd');
        $this->cashier_currency_locale = setting('cashier_currency_locale', 'en');
    }

    public function saveStripeCredential()
    {
        auth()->user()->hasPermissionTo('settings');

        $validated = $this->validate([
            'stripe_key' => 'required',
            'stripe_secret' => 'required',
            'cashier_currency' => 'required',
            'cashier_currency_locale' => 'required',
        ]);

        foreach ($validated as $key => $value)
        {
            setting([$key => $value]);
        }

        $this->success = __('Stripe Credential Updated');
        $this->emit('settingsUpdated');
    }

    public function render()
    {
        return view('livewire.central.settings.stripe-credential-form');
    }
}
