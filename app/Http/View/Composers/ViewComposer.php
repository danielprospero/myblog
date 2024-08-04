<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;

class ViewComposer
{
    public function compose(View $view)
    {
        $recent_posts = Post::latest()->approved()->take(3)->get();
        $recent_posts_footer = Post::latest()->approved()->take(2)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $view->with('recent_posts', $recent_posts);
        $view->with('recent_posts_footer', $recent_posts_footer);
        $view->with('categories', $categories);
    }
}