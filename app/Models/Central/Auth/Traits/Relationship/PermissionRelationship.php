<?php


namespace App\Models\Central\Auth\Traits\Relationship;

use App\Models\Central\Auth\Permission;

trait PermissionRelationship
{
    /**
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(Permission::class, 'parent_id')->with('parent');
    }

    /**
     * @return mixed
     */
    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id')->with('children');
    }
}
