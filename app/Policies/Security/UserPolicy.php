<?php

namespace App\Policies\Security;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /*
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /*
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $sessionUser, User $user, $perm = null)
    {
        if ($sessionUser->havePermission($perm[0])){
            return true;
        } elseif ($sessionUser->havePermission($perm[1])) {
            return $sessionUser->id === $user->id;
        } else {
            return false;
        }
    }

    /*
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $usera)
    {
        return $usera->id > 0;
    }

    /*
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $sessionUser, User $user, $perm = null)
    {
        if ($sessionUser->havePermission($perm[0])){
            return true;
        } elseif ($sessionUser->havePermission($perm[1])) {
            return $sessionUser->id === $user->id;
        } else {
            return false;
        }
    }

    /*
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /*
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
}
