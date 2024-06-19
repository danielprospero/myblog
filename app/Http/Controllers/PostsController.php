<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        $recent_posts = Post::latest()->take(3)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(10)->get();

        return view('post', ['post' => $post, 'recent_posts' => $recent_posts, 'categories' => $categories, 'tags' => $tags]);
    }

    public function addComment(Request $request, Post $post)
    {
        $attributes = request()->validate([
            'the_comment' => 'required|min:3|max:500'
        ]);
        $attributes['post_id'] = $post->id;
        $attributes['user_id'] = auth()->id();

        $comment = $post->comments()->create($attributes);

        return redirect('/post/' . $post->slug . '#comment_' . $comment->id)->with('success' , 'Comentário adicionado com sucesso!');
    }
}
