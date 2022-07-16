<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
       //
    }

    public function view(User $user, User $model): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, User $model)
    {
        return $user->hasRole('superadmin') || $user->id === $model->id
            ? Response::deny('You can not update your own profile')
            : Response::allow();
    }

    public function delete(User $user, User $model)
    {
        return $user->hasRole('superadmin') || $user->id === $model->id
            ? Response::deny('You can not delete your own profile')
            : Response::allow();
    }

    public function restore(User $user, User $model): bool
    {
        //
    }

    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
