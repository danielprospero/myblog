@props(['categories'])

<div class="side">
    <h3 class="sidebar-heading">Categories</h3>
    <div class="block-24">
        <ul>
            @foreach ($categories as $category)
            <li><a href="#">{{ $category->name}}<span>{{ $category->posts->count() }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
