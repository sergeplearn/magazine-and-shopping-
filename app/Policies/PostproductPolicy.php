<?php

namespace App\Policies;

use App\User;
use App\postproduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostproductPolicy
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
     * Determine whether the user can view any postproducts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can view the postproduct.
     *
     * @param  \App\User  $user
     * @param  \App\postproduct  $postproduct
     * @return mixed
     */
    public function view(User $user, postproduct $postproduct)
    {
        return true;
    }

    /**
     * Determine whether the user can create postproducts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can update the postproduct.
     *
     * @param  \App\User  $user
     * @param  \App\postproduct  $postproduct
     * @return mixed
     */
    public function update(User $user, postproduct $postproduct)
    {
        return $user->role == "admin" && $user->id === $postproduct->user_id;
    }

    /**
     * Determine whether the user can delete the postproduct.
     *
     * @param  \App\User  $user
     * @param  \App\postproduct  $postproduct
     * @return mixed
     */
    public function delete(User $user, postproduct $postproduct)
    {
        return $user->role == "admin" && $user->id === $postproduct->user_id;
    }

    /**
     * Determine whether the user can restore the postproduct.
     *
     * @param  \App\User  $user
     * @param  \App\postproduct  $postproduct
     * @return mixed
     */
    public function restore(User $user, postproduct $postproduct)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the postproduct.
     *
     * @param  \App\User  $user
     * @param  \App\postproduct  $postproduct
     * @return mixed
     */
    public function forceDelete(User $user, postproduct $postproduct)
    {
        //
    }
}
