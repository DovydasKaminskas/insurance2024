<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;


class OwnerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Owner $owner): bool
    {
        if($user->role === 'paprastas' && $user->id === $owner->user_id) {
            return true;
        } else {
            return $user->role === 'skaitantis' || $user->role === 'administratorius';
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'administratorius';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Owner $owner): bool
    {
        if(($user->role === 'paprastas' || $user->role === 'skaitantis') && $user->id === $owner->user_id) {
            return true;
        } else {
            return $user->role === 'administratorius';
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Owner $owner): bool
    {
        if(($user->role === 'paprastas' || $user->role === 'skaitantis') && $user->id === $owner->user_id) {
            return true;
        } else {
            return $user->role === 'administratorius';
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    /*public function restore(User $user, Owner $owner): bool
    {
        //
    }*/

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Owner $owner): bool
    {
        if(($user->role === 'paprastas' || $user->role === 'skaitantis') && $user->id === $owner->user_id) {
            return true;
        } else {
            return $user->role === 'administratorius';
        }
    }
}
