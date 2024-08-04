<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;


class TagController extends Controller
{
    public function index()
    {
        //return view('tag');
    }

    public function show(Tag $tag)
    {
        $posts = Post::withCount('comments')->with('category', 'tags')->latest()->paginate(5);
        $recent_posts = Post::latest()->take(3)->get();
        $recent_posts_footer = Post::latest()->take(2)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(10)->get();
        return view('tags.show', [
            'tag' => $tag,
            'posts' => $tag->posts()->paginate(10),
            'recent_posts' => $recent_posts, 
            'recent_posts_footer' => $recent_posts_footer,
            'categories' => $categories, 
            'tags' => $tags
        ]);
    }

}
