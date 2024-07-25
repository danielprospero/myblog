<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Comments\CommentsResource;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentsController extends Controller
{
    public function show(Post $post)
    {
        //$comments = $post->comments()->with(['user:id,name'])->latest()->get();
        //$comments = Post::where('slug', $slug)->first()->comments()->with(['user:id,name'])->latest()->get();
        $comments = Comment::where('post_id', $post->id)->with(['user:id,name'])->latest()->get();
        return CommentsResource::collection($comments);
    }

}
