<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Policies\PostPolicy;
class PostController extends Controller
{
    protected $policy = [ "class" => PostPolicy::class,
                          "model" => Post::class];

    public function index()
    {
        $this->isAble('view', Post::class);
        return Post::all();
    }

    public function show(Post $post)
    {
        $this->isAble('show', $post);
        return $this->successResponse(new PostResource($post));
    }

    public function store(Request $request)
    {
        $this->isAble('store', Post::class);
        $post = Post::create($request->all());
        return $this->successResponse(new PostResource($post));
    }

    public function update(Request $request, Post $post)
    {
        $this->isAble('update',$post);
        $post->update($request->all());
        return $this->successResponse(new PostResource($post));
    }

    public function destroy(Post $post)
    {
        $this->isAble('delete',$post);
        $post->delete();
        return $this->successResponse();
    }

}
