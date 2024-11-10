<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostPaginateResource;
use App\Http\Resources\Post\PostResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Policies\PostPolicy;
class PostController extends ApiController
{
    protected $policy = [ "class" => PostPolicy::class,
                          "model" => Post::class];

    public function index(Request $request)
    {
        $this->isAble('view', Post::class);
        $user = $this->user;
        $posts = Post::where(function($query) use ($user) {
            if($user->isManager) {
                $query->where('user_id', $user->id);
            }})->paginate($this->paginationNumber, ['*'], 'page', $request['page']);
        return $this->successResponse(new PostPaginateResource($posts));
    }

    public function show(Post $post)
    {
        $this->isAble('show', $post);
        return $this->successResponse(new PostResource($post));
    }

    public function store(Request $request)
    {
        $this->isAble('store', Post::class);
        $post = Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $this->user->id
        ]);
        return $this->successResponse(new PostResource($post));
    }

    public function update(Request $request, Post $post)
    {
        $this->isAble('update',$post);
        $post->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $this->user->id
        ]);
        return $this->successResponse(new PostResource($post));
    }

    public function destroy(Post $post)
    {
        $this->isAble('delete',$post);
        $post->delete();
        return $this->successResponse();
    }

}
