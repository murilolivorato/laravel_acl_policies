<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Permissions\Abilities;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function view(User $user) {
        if ($user->tokenCan(Abilities::ViewPost) || $user->tokenCan(Abilities::ViewOwnPost)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to view this post');
    }

    public function show(User $user, Post $post) {
        $canShowAll = $user->tokenCan(Abilities::ShowPost);
        $canShowOwn = $user->tokenCan(Abilities::ShowOwnPost);
        $isOwner = $post->user_id === $user->id;

        if ($canShowAll || ($canShowOwn && $isOwner)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to view this post');
    }

    public function store(User $user) {
        if ($user->tokenCan(Abilities::StorePost) || $user->tokenCan(Abilities::StoreOwnPost)) {
            return Response::allow();
        }

        return Response::deny('You do not have permission to store this post');
    }

    public function update(User $user, Post $post) {
        $canUpdateOwn = $user->tokenCan(Abilities::UpdateOwnPost);
        $canUpdateAll = $user->tokenCan(Abilities::UpdatePost);

        if (!$canUpdateOwn && !$canUpdateAll) {
            return Response::deny('You do not have permission to update this post');
        }

        if ($canUpdateOwn && $post->user_id !== $user->id) {
            return Response::deny('You do not have permission to update this post');
        }

        return Response::allow();
    }

    public function delete(User $user, Post $post) {
        $canDestroyOwn = $user->tokenCan(Abilities::DeleteOwnPost);
        $canDestroyAll = $user->tokenCan(Abilities::DeletePost);

        if (!$canDestroyOwn && !$canDestroyAll) {
            return Response::deny('You do not have permission to delete this post');
        }

        if ($canDestroyOwn && $post->user_id !== $user->id) {
            return Response::deny('You do not have permission to delete this post');
        }

        return Response::allow();
    }
}
