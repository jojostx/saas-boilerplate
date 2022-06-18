<?php

namespace App\Models\Central\Auth;

use App\Models\Central\Auth\Traits\Relationship\PermissionRelationship;
use App\Models\Central\Auth\Traits\Scope\PermissionScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, PermissionRelationship, PermissionScope;
}
