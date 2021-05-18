<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Group;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function admin(User $user)
    {
        return $user->useGroId == Group::GROUP_ID_ADMIN
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    public function employees(User $user)
    {
        return $user->useGroId == Group::GROUP_ID_EMPLOYEES
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }
}
