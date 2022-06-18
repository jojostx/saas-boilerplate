<?php


namespace App\Models\Tenant\Auth\Traits;


trait UserMethod
{
    public function isOwner()
    {
        // We assume the superadmin is the first user in the DB.
        // Feel free to change this logic.
        return $this->getKey() === 1;
    }
}
