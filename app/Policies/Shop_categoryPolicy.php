<?php

namespace App\Policies;

use App\User;
use App\shop_category;
use Illuminate\Auth\Access\HandlesAuthorization;

class Shop_categoryPolicy
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
     * Determine whether the user can view any shop_categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can view the shop_category.
     *
     * @param  \App\User  $user
     * @param  \App\shop_category  $shopCategory
     * @return mixed
     */
    public function view(User $user, shop_category $shopCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create shop_categories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "admin";
    }

    /**
     * Determine whether the user can update the shop_category.
     *
     * @param  \App\User  $user
     * @param  \App\shop_category  $shop_category
     * @return mixed
     */
    public function update(User $user, shop_category $shop_category)
    {
        return $user->role == "admin" && $user->id === $shop_category->user_id;
    }

    /**
     * Determine whether the user can delete the shop_category.
     *
     * @param  \App\User  $user
     * @param  \App\shop_category  $shop_category
     * @return mixed
     */
    public function delete(User $user, shop_category $shop_category)
    {
        return $user->role == "admin" && $user->id === $shop_category->user_id;
    }

    /**
     * Determine whether the user can restore the shop_category.
     *
     * @param  \App\User  $user
     * @param  \App\shop_category  $shopCategory
     * @return mixed
     */
    public function restore(User $user, shop_category $shopCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the shop_category.
     *
     * @param  \App\User  $user
     * @param  \App\shop_category  $shopCategory
     * @return mixed
     */
    public function forceDelete(User $user, shop_category $shopCategory)
    {
        //
    }
}
