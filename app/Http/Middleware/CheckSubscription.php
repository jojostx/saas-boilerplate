<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!tenant()->can_use_application && request()->route()->getName() !== 'tenant.settings.billing') {
            if (auth()->check())
                return redirect(route('tenant.settings.billing'));
            redirect(route('tenant.login'));
        }

        return $next($request);
    }
}
