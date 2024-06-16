<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('comments')->get();
        $recent_posts = Post::latest()->take(3)->get();
        return view('home', ['posts' => $posts, 'recent_posts' => $recent_posts]);
    }
}
 