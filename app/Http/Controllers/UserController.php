<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\UserPaginateResource;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use App\Http\Resources\Post\UserResource;

class UserController extends ApiController
{
    protected $policy = [ "class" => UserPolicy::class,
                          "model" => User::class];

    public function index(Request $request)
    {
        $this->isAble('view', User::class);
        $users = User::paginate($this->paginationNumber, ['*'], 'page', $request['page']);
        return $this->successResponse(new UserPaginateResource($users));
    }

    public function show(User $user)
    {
        $this->isAble('show', $user);
        return $this->successResponse(new UserResource($user));
    }

    public function store(Request $request)
    {
        $this->isAble('store', User::class);
        $user = User::create($request->all());
        return $this->successResponse(new UserResource($user));
    }

    public function update(Request $request, User $user)
    {
        $this->isAble('update', $user);
        $user->update($request->all());
        return $this->successResponse(new UserResource($user));
    }

    public function destroy(User $user)
    {
        $this->isAble('delete', $user);
        $user->delete();
        return $this->successResponse();
    }
}
