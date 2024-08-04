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
        $recent_posts = Post::latest()
        ->approved()
        ->take(3)->get();
        $recent_posts_footer = Post::latest()
        ->approved()
        ->take(2)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        $post->incrementViews();
        // Pesquisa por posts
        $pesquisar = Post::when(request('search'), function($query) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('content', 'like', '%' . request('search') . '%');
        })->get();
    

        return view('post', [
            'post' => $post, 
            'recent_posts' => $recent_posts,
            'recent_posts_footer' => $recent_posts_footer,
            'categories' => $categories, 
            'pesquisar' => $pesquisar,
            'tags' => $tags

        ]);
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
