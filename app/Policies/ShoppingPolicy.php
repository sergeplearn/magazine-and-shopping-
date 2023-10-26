<?php

namespace App\Policies;

use App\User;
use App\shopping;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShoppingPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability)
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can view any shoppings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can view the shopping.
     *
     * @param  \App\User  $user
     * @param  \App\shopping  $shopping
     * @return mixed
     */
    public function view(User $user, shopping $shopping)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can create shoppings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can update the shopping.
     *
     * @param  \App\User  $user
     * @param  \App\shopping  $shopping
     * @return mixed
     */
    public function update(User $user, shopping $shopping)
    {
        return $user->role == "admin" && $user->id === $shopping->user_id;
    }

    /**
     * Determine whether the user can delete the shopping.
     *
     * @param  \App\User  $user
     * @param  \App\shopping  $shopping
     * @return mixed
     */
    public function delete(User $user, shopping $shopping)
    {
        return $user->role == "admin" && $user->id === $shopping->user_id;
    }

    /**
     * Determine whether the user can restore the shopping.
     *
     * @param  \App\User  $user
     * @param  \App\shopping  $shopping
     * @return mixed
     */
    public function restore(User $user, shopping $shopping)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shopping.
     *
     * @param  \App\User  $user
     * @param  \App\shopping  $shopping
     * @return mixed
     */
    public function forceDelete(User $user, shopping $shopping)
    {
        //
    }
}
