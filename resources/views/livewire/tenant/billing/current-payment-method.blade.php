<div>
    <h4 class="font-medium text-gray-900">{{ __('Current Payment Method') }}</h4>
    @if(tenant()->hasDefaultPaymentMethod())
        <p class="mt-2">
            {{ ucfirst(tenant()->defaultPaymentMethod()->asStripePaymentMethod()->card->brand) }} ending in
            {{ tenant()->defaultPaymentMethod()->asStripePaymentMethod()->card->last4 }}
        </p>
    @else
        <p class="mt-2">
            {{ __('No payment method set yet. Please add one below.') }}
        </p>
    @endif
</div>
