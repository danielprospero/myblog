@props(['recentPosts'])

<div class="side ">
    <h3 class="sidebar-heading">Recent Blog</h3>
    @foreach ($recentPosts as $recent_post)
        
    <div class="f-blog">
        <a href="{{ route('posts.show', $recent_post)}}" class="blog-img" style="background-image: url({{ asset($recent_post->image->path ? 'storage/'. $recent_post->image->path : 'placeholders/thumbnail_placeholder.svg') }});">
        </a>
        <div class="desc">
            <p class="admin"><span>{{ $recent_post->created_at->format('d M Y') }}</span></p>
            <h2><a title="{{ $recent_post->title }}" href="{{ route('posts.show', $recent_post)}}">{{ \Str::limit($recent_post->title, 20) }}</a></h2>
            <p title="{{ $recent_post->excerpt }}">{{ \Str::limit($recent_post->excerpt, 25) }}</p>
        </div>
    </div>

    @endforeach

</div>
