<?php

namespace App\Policies;

use App\Models\User;
use App\Permissions\Abilities;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function view(User $user) {
        if ($user->tokenCan(Abilities::ViewUser)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to view this user');
    }

    public function show(User $user, User $post) {
        $canShowAll = $user->tokenCan(Abilities::ShowUser);
        $canShowOwn = $user->tokenCan(Abilities::ShowOwnUser);
        $isOwner = $post->user_id === $user->id;

        if ($canShowAll || ($canShowOwn && $isOwner)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to view this user');
    }

    public function store(User $user) {
        if ($user->tokenCan(Abilities::StoreUser)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to store this user');
    }

    public function update(User $user, User $post) {
        $canUpdateOwn = $user->tokenCan(Abilities::UpdateOwnUser);
        $canUpdateAll = $user->tokenCan(Abilities::UpdateUser);

        if (!$canUpdateOwn && !$canUpdateAll) {
            return Response::deny('You do not have permission to update this user');
        }

        if ($canUpdateOwn && $post->user_id !== $user->id) {
            return Response::deny('You do not have permission to update this user');
        }

        return Response::allow();
    }

    public function delete(User $user, User $post) {
        $canDestroyOwn = $user->tokenCan(Abilities::DeleteOwnUser);
        $canDestroyAll = $user->tokenCan(Abilities::DeleteUser);

        if (!$canDestroyOwn && !$canDestroyAll) {
            return Response::deny('You do not have permission to delete this user');
        }

        if ($canDestroyOwn && $post->user_id !== $user->id) {
            return Response::deny('You do not have permission to delete this user');
        }

        return Response::allow();
    }
}
