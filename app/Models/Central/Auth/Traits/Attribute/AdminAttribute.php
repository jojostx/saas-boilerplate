<?php


namespace App\Models\Central\Auth\Traits\Attribute;


trait AdminAttribute
{
    /**
     * @return string
     */
    public function getRolesLabelAttribute()
    {
        if (! $this->roles->count()) {
            return 'None';
        }

        return collect($this->getRoleNames())
            ->each(function ($role) {
                return ucwords($role);
            })
            ->implode(', ');
    }
}
