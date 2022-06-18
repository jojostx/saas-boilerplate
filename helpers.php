<?php

use Stripe\Charge;

if (! function_exists('include_route_files')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }

                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


if (! function_exists('is_refunded')) {
    function is_refunded($id)
    {
        $charge = (Charge::retrieve(['id' => $id, 'expand' => ['balance_transaction']], ['api_key' => config('services.stripe.secret')]))->toArray();
        return $charge['amount_refunded'];
    }
}
