<?php

namespace App\Permissions;

use App\Models\User;

final class Abilities
{
    public const ViewPost = 'post:view';
    public const ShowPost = 'post:show';
    public const CreatePost = 'post:create';
    public const StorePost = 'post:store';
    public const UpdatePost = 'post:update';
    public const DeletePost = 'post:delete';

    public const ViewUser = 'user:view';
    public const ShowUser = 'user:show';
    public const CreateUser = 'user:create';
    public const StoreUser = 'user:store';
    public const UpdateUser = 'user:update';
    public const DeleteUser = 'user:delete';


    public const ViewOwnPost = 'post:own:view';
    public const ShowOwnPost = 'post:own:show';
    public const CreateOwnPost = 'post:own:create';
    public const UpdateOwnPost = 'post:own:update';
    public const StoreOwnPost = 'post:own:update';
    public const DeleteOwnPost = 'post:own:delete';

    public const ViewOwnUser = 'user:own:view';
    public const ShowOwnUser = 'user:own:show';
    public const CreateOwnUser = 'user:own:create';
    public const UpdateOwnUser = 'user:own:update';
    public const StoreOwnUser = 'user:own:update';
    public const DeleteOwnUser = 'user:own:delete';



    public static function getAbilities(User $user) {
        if ($user->isSuperAdmin) {
            return [
                self::ViewPost,
                self::ShowPost,
                self::CreatePost,
                self::StorePost,
                self::UpdatePost,
                self::DeletePost,
                self::ViewUser,
                self::ShowUser,
                self::CreateUser,
                self::StoreUser,
                self::UpdateUser,
                self::DeleteUser
            ];
        }

        if ($user->isManager) {
            return [
                self::ViewOwnUser,
                self::ShowOwnUser,
                self::CreateOwnUser,
                self::UpdateOwnUser,
                self::StoreOwnUser,
                self::DeleteOwnUser,
                self::ViewOwnPost,
                self::ShowOwnPost,
                self::CreateOwnPost,
                self::UpdateOwnPost,
                self::StoreOwnPost,
                self::DeleteOwnPost
            ];
        }
    }

}
