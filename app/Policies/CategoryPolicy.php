<?php

namespace App\Policies;

use App\User;
use App\category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
     * Determine whether the user can view any categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function view(User $user, category $category)
    {
        return true;
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function update(User $user, category $category)
    {
        return $user->role == "admin" && $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function delete(User $user, category $category)
    {
        return $user->role == "admin" && $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can restore the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function restore(User $user, category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the category.
     *
     * @param  \App\User  $user
     * @param  \App\category  $category
     * @return mixed
     */
    public function forceDelete(User $user, category $category)
    {
        //
    }
}
