<?php

namespace App\Policies;

use App\CheckListItem;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any check list items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the check list item.
     *
     * @param  \App\User  $user
     * @param  \App\CheckListItem  $checkListItem
     * @return mixed
     */
    public function view(User $user, CheckListItem $checkListItem)
    {
        //
    }

    /**
     * Determine whether the user can create check list items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the check list item.
     *
     * @param  \App\User  $user
     * @param  \App\CheckListItem  $checkListItem
     * @return mixed
     */
    public function update(User $user, CheckListItem $checkListItem)
    {
        return $user->id === $checkListItem->checkList->creator->id;
    }

    /**
     * Determine whether the user can delete the check list item.
     *
     * @param  \App\User  $user
     * @param  \App\CheckListItem  $checkListItem
     * @return mixed
     */
    public function delete(User $user, CheckListItem $checkListItem)
    {
        return $user->id === $checkListItem->checkList->creator->id;
    }

    /**
     * Determine whether the user can restore the check list item.
     *
     * @param  \App\User  $user
     * @param  \App\CheckListItem  $checkListItem
     * @return mixed
     */
    public function restore(User $user, CheckListItem $checkListItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the check list item.
     *
     * @param  \App\User  $user
     * @param  \App\CheckListItem  $checkListItem
     * @return mixed
     */
    public function forceDelete(User $user, CheckListItem $checkListItem)
    {
        //
    }
}
