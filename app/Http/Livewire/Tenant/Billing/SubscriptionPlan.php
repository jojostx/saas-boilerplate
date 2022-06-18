<?php

namespace App\Http\Livewire\Tenant\Billing;

use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SubscriptionPlan extends Component
{
    public $plan;
    public $success;
    public $error;

    protected $listeners = ['billingUpdated' => '$refresh'];

    public function update()
    {
        $this->validate([
            'plan' => ['required', Rule::in(array_keys(config('boilerplate.plans')))],
        ]);

        if (! tenant()->hasDefaultPaymentMethod()) {
            $this->error = __('No payment method set. Please add one below.');
            return;
        }

        if (tenant()->subscribed('default')) {
            tenant()->subscription('default')->swap($this->plan);
            $this->success = __('Plan Updated.');
            $this->error = '';
        } else {
            $subscription = tenant()->newSubscription('default', $this->plan);
            $trial_end = tenant()->trial_ends_at;

            if (config('saas.trial_days') && $trial_end->isFuture()) {
                $subscription->trialUntil($trial_end);
            }
            $subscription->create(tenant()->defaultPaymentMethod()->asStripePaymentMethod());

            $this->success = __('Subscription Created.');
            $this->error = '';
        }

        $this->emit('billingUpdated');
    }

    public function cancel($reason)
    {
        tenant()->subscription('default')->cancel();
        $this->plan = '';
        $this->emit('billingUpdated');
    }

    public function resume()
    {
        tenant()->subscription('default')->resume();
        $this->refreshPlan();
        $this->emit('billingUpdated');
    }

    public function mount()
    {
        $this->refreshPlan();
    }

    public function render()
    {
        return view('livewire.tenant.billing.subscription-plan');
    }

    protected function refreshPlan()
    {
        if (tenant()->on_active_subscription) {
            $this->plan = tenant()->subscription('default')->stripe_plan;
        }
    }
}
