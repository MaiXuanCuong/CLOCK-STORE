<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermission('User_viewAny');
    }

    public function view(User $user)
    {
        return $user->hasPermission('User_view');
    }

    public function create(User $user)
    {
         return $user->hasPermission('User_create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('User_update');
    }

    public function delete(User $user)
    {
        return $user->hasPermission('User_delete');
    }

    public function restore(User $user)
    {
        return $user->hasPermission('User_restore');
    }

    public function forceDelete(User $user)
    {
        return $user->hasPermission('User_forceDelete');
    }
    public function status(User $user)
    {
        return $user->hasPermission('User_status');
    }
}
