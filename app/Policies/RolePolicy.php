<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    use HandlesAuthorization;

    public function save(User $user, Role $role)
    {
        return $user->user_type === User::USER_TYPE_ADMIN;
    }
    public function view(User $user, Role $role)
    {
        return $user->id === $role->user_id;
    }
}
