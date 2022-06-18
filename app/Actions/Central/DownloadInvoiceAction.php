<?php

namespace App\Actions\Central;

use App\Models\Central\Tenant\Tenant;
use Lorisleiva\Actions\Concerns\AsAction;

class DownloadInvoiceAction
{
    use AsAction;

    public function handle($id)
    {
        return Tenant::find($id);
    }

    public function asController($id, $invoice)
    {
        $tenant = $this->handle($id);
        return redirect($tenant->findInvoice($invoice)->asStripeInvoice()->invoice_pdf);
    }
}
