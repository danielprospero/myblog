<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Posts\SinglePostResource;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->where('approved', 1)->latest()->paginate();
        return response()->json(['posts' => PostResource::collection($posts)]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return response()->json(['post' => new SinglePostResource($post)]);
    }

}
