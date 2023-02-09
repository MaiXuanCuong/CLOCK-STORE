<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Customer  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('Customer_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Customer  $user
     * @param  \App\Models\Customer  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->hasPermission('Customer_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Customer  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
         return $user->hasPermission('Customer_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Customer  $user
     * @param  \App\Models\Customer  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        return $user->hasPermission('Customer_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Customer  $user
     * @param  \App\Models\Customer  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->hasPermission('Customer_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Customer  $user
     * @param  \App\Models\Customer  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user)
    {
        return $user->hasPermission('Customer_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Customer  $user
     * @param  \App\Models\Customer  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user)
    {
        return $user->hasPermission('Customer_forceDelete');
    }
}
