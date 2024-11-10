<?php

namespace App\Permissions;

use App\Models\User;

final class Abilities
{
    public const CreatePost = 'post:create';
    public const StorePost = 'post:store';
    public const UpdatePost = 'post:update';
    public const DeletePost = 'post:delete';

    public const CreateOwnPost = 'post:own:create';
    public const UpdateOwnPost = 'post:own:update';
    public const StoreOwnPost = 'post:own:update';
    public const DeleteOwnPost = 'post:own:delete';

    public const CreateUser = 'user:create';
    public const UpdateUser = 'user:update';
    public const DeleteUser = 'user:delete';

    public static function getAbilities(User $user) {
        if ($user->isSuperAdmin) {
            return [
                self::CreatePost,
                self::UpdatePost,
                self::DeletePost,
                self::CreateUser,
                self::UpdateUser,
                self::DeleteUser,
            ];
        }

        if ($user->isManager) {
            return [
                self::CreateOwnPost,
                self::UpdateOwnPost,
                self::DeleteOwnPost
            ];
        }
    }

}
