<?php

namespace App\Http\Livewire\Central\Tenant;

use Illuminate\Validation\Rule;
use Livewire\Component;

class SubscriptionPlan extends Component
{
    public $tenant;
    public $plan;
    public $success;
    public $error;

    protected $listeners = ['billingUpdated' => '$refresh'];

    public function update()
    {
        $this->validate([
            'plan' => ['required', Rule::in(array_keys(config('boilerplate.plans')))],
        ]);

        if (! $this->tenant->hasDefaultPaymentMethod()) {
            $this->error = __('No payment method set. Please add one below.');
            return;
        }

        if ($this->tenant->subscribed('default')) {
            $this->tenant->subscription('default')->swap($this->plan);
            $this->success = __('Plan Updated.');
            $this->error = '';
        } else {
            $subscription = $this->tenant->newSubscription('default', $this->plan);
            $trial_end = $this->tenant->trial_ends_at;

            if (config('saas.trial_days') && $trial_end->isFuture()) {
                $subscription->trialUntil($trial_end);
            }
            $subscription->create($this->tenant->defaultPaymentMethod()->asStripePaymentMethod());

            $this->success = __('Subscription Created.');
            $this->error = '';
        }

        $this->emit('billingUpdated');
    }

    public function cancel($reason)
    {
        $this->tenant->subscription('default')->cancel();
        $this->plan = '';
        $this->emit('billingUpdated');
    }

    public function resume()
    {
        $this->tenant->subscription('default')->resume();
        $this->refreshPlan();
        $this->emit('billingUpdated');
    }

    public function mount()
    {
        $this->refreshPlan();
    }

    public function render()
    {
        return view('livewire.central.tenant.subscription-plan');
    }

    protected function refreshPlan()
    {
        if ($this->tenant->on_active_subscription) {
            $this->plan = $this->tenant->subscription('default')->stripe_plan;
        }
    }
}
