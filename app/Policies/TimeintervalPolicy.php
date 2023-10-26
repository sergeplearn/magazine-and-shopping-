<?php

namespace App\Policies;

use App\User;
use App\timeinterval;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimeintervalPolicy
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
     * Determine whether the user can view any timeintervals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the timeinterval.
     *
     * @param  \App\User  $user
     * @param  \App\timeinterval  $timeinterval
     * @return mixed
     */
    public function view(User $user, timeinterval $timeinterval)
    {
        return true;
    }

    /**
     * Determine whether the user can create timeintervals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == "admin" ;
    }

    /**
     * Determine whether the user can update the timeinterval.
     *
     * @param  \App\User  $user
     * @param  \App\timeinterval  $timeinterval
     * @return mixed
     */
    public function update(User $user, timeinterval $timeinterval)
    {
        return $user->role == "admin" && $user->id === $timeinterval->user_id;
    }

    /**
     * Determine whether the user can delete the timeinterval.
     *
     * @param  \App\User  $user
     * @param  \App\timeinterval  $timeinterval
     * @return mixed
     */
    public function delete(User $user, timeinterval $timeinterval)
    {
        return $user->role == "admin" && $user->id === $timeinterval->user_id;
    }

    /**
     * Determine whether the user can restore the timeinterval.
     *
     * @param  \App\User  $user
     * @param  \App\timeinterval  $timeinterval
     * @return mixed
     */
    public function restore(User $user, timeinterval $timeinterval)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the timeinterval.
     *
     * @param  \App\User  $user
     * @param  \App\timeinterval  $timeinterval
     * @return mixed
     */
    public function forceDelete(User $user, timeinterval $timeinterval)
    {
        //
    }
}
