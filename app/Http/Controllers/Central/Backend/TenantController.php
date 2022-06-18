<?php

namespace App\Http\Controllers\Central\Backend;

use App\Http\Controllers\Controller;
use App\Services\Central\TenantService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\Subscription;

class TenantController extends Controller
{
    /**
     * @var TenantService
     */
    private $tenantService;
    /**
     * @var Subscription
     */
    private $subscription;
    /**
     * @var StripeHelper
     */
    private $stripeHelper;

    /**
     * TenantController constructor.
     * @param TenantService $tenantService
     * @param Subscription $subscription
     */
    public function __construct(TenantService $tenantService, Subscription $subscription)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $this->tenantService = $tenantService;
        $this->subscription = $subscription;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('central.backend.tenant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     * @throws ApiErrorException
     */
    public function show($id)
    {
        $tenant = $this->tenantService->getById($id);
        $subscription = $tenant->subscription('default');

        return view('central.backend.tenant.show')->with([
            'tenant' => $tenant,
            'subscription' => $subscription ? $this->formatSubscription(
                $subscription, $this->subscription->retrieve($subscription->stripe_id)
            ) : null,
        ]);
    }

    /**
     * @param $subscription
     * @param $stripeSubscription
     * @return array
     */
    protected function formatSubscription($subscription, $stripeSubscription)
    {
        return array_merge($subscription->toArray(), [
            'plan_amount' => $stripeSubscription->plan->amount,
            'plan_interval' => $stripeSubscription->plan->interval,
            'plan_currency' => $stripeSubscription->plan->currency,
            'plan' => config('boilerplate.plans')[$subscription->stripe_plan],
            'stripe_plan' => $stripeSubscription->plan->id,
            'ended' => $subscription->ended(),
            'cancelled' => $subscription->cancelled(),
            'active' => $subscription->active(),
            'on_trial' => $subscription->onTrial(),
            'on_grace_period' => $subscription->onGracePeriod(),
            'charges_automatically' => $stripeSubscription->billing == 'charge_automatically',
            'created_at' => $stripeSubscription->billing_cycle_anchor ? Carbon::createFromTimestamp($stripeSubscription->billing_cycle_anchor)->toDateTimeString() : null,
            'ended_at' => $stripeSubscription->ended_at ? Carbon::createFromTimestamp($stripeSubscription->ended_at)->toDateTimeString() : null,
            'current_period_start' => $stripeSubscription->current_period_start ? Carbon::createFromTimestamp($stripeSubscription->current_period_start)->toDateString() : null,
            'current_period_end' => $stripeSubscription->current_period_end ? Carbon::createFromTimestamp($stripeSubscription->current_period_end)->toDateString() : null,
            'days_until_due' => $stripeSubscription->days_until_due,
            'cancel_at_period_end' => $stripeSubscription->cancel_at_period_end,
            'canceled_at' => $stripeSubscription->canceled_at,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function manage($id)
    {
        $tenant = $this->tenantService->getById($id);

        return view('central.backend.tenant.manage')->with([
            'tenant' => $tenant,
        ]);
    }
}
