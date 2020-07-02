<?php

namespace App\Policies;

use App\CheckList;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any check lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the check list.
     *
     * @param  \App\User  $user
     * @param  \App\CheckList  $checkList
     * @return mixed
     */
    public function view(User $user, CheckList $checkList)
    {
        //
    }

    /**
     * Determine whether the user can create check lists.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the check list.
     *
     * @param  \App\User  $user
     * @param  \App\CheckList  $checkList
     * @return mixed
     */
    public function update(User $user, CheckList $checkList)
    {
        return $user->id === $checkList->creator->id;
    }

    /**
     * Determine whether the user can delete the check list.
     *
     * @param  \App\User  $user
     * @param  \App\CheckList  $checkList
     * @return mixed
     */
    public function delete(User $user, CheckList $checkList)
    {
        return $user->id === $checkList->creator->id;
    }

    /**
     * Determine whether the user can restore the check list.
     *
     * @param  \App\User  $user
     * @param  \App\CheckList  $checkList
     * @return mixed
     */
    public function restore(User $user, CheckList $checkList)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the check list.
     *
     * @param  \App\User  $user
     * @param  \App\CheckList  $checkList
     * @return mixed
     */
    public function forceDelete(User $user, CheckList $checkList)
    {
        //
    }
}
