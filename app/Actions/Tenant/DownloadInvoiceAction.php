<?php

namespace App\Actions\Tenant;

use Lorisleiva\Actions\Concerns\AsAction;

class DownloadInvoiceAction
{
    use AsAction;

    public function asController($id)
    {
        return redirect(tenant()->findInvoice($id)->asStripeInvoice()->invoice_pdf);
    }
}
