<?php

namespace App\Models\Central\Auth;

use App\Models\Central\Auth\Traits\Method\RoleMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, RoleMethod;
}
