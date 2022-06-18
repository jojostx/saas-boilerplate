<?php


namespace App\Models\Central\Tenant\Traits;


trait TenantAttribute
{
    public function getPlanNameAttribute()
    {
        return config('boilerplate.plans')[$this->subscription('default')->stripe_plan];
    }

    public function getOnActiveSubscriptionAttribute()
    {
        return $this->subscribed('default') && ! $this->subscription('default')->cancelled();
    }

    public function getCanUseApplicationAttribute()
    {
        return $this->onTrial() || $this->subscribed('default');
    }
}
