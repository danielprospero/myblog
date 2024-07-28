<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Post;

class ViewComposer
{
    public function compose(View $view)
    {
        $recent_posts = Post::latest()->approved()->take(3)->get();
        $view->with('recent_posts', $recent_posts);
    }
}