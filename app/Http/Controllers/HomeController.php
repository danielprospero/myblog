<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()
        ->approved()
        ->withCount('comments')->
        when($request->has('search'), function($whenQuery) use ($request) {
            $whenQuery->where('title', 'like', '%' . $request->search . '%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString()
        ->onEachSide(2);
        $recent_posts = Post::latest()
        ->approved()
        ->take(3)->get();
        $recent_posts_footer = Post::latest()
        ->approved()
        ->take(2)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(10)->get();

        return view('home', [
            'posts' => $posts, 
            'recent_posts' => $recent_posts, 
            'recent_posts_footer' => $recent_posts_footer,
            'categories' => $categories, 
            'search' => $request->search,
            'tags' => $tags]);

    }


}
 