
@extends('main_layouts.master')
@section('title', 'MyBlog | Categorias')
@section('content')
    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 categories-col">

            

                @forelse ($categories as $category)
                <div class='col-md-3'>      
                    <div class="block-21 d-flex animate-box category">

                        <div class="text">
                            <h3 class="heading"><a href="{{ route('categories.show', $category)}}">{{ $category->name }}</a></h3>
                            <div class="meta">
                                <div><a class='date' href="#"><span class="icon-calendar"></span> {{ $category->created_at->format('d M Y') }} </a></div>
                                @if($category->user)
                                    <div><a href="{{ route('categories.show', $category)}}"><span class="icon-user2"></span> {{ $category->user->name }}</a></div>
                                @else
                                    <div><a href="{{ route('categories.show', $category)}}"><span class="icon-user2"></span> Unknown User</a></div>
                                @endif

                                <div class="posts-count">
                                    <a href="{{ route('categories.show', $category) }}">
                                        <span class="icon-tag"></span> {{ $category->posts->count() }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                    <p class='lead'>Nenhum categoria encontrada</p>

                @endforelse

            </div>

            {{ $categories->links() }}

            </div>
        </div>
    </div>
@endsection
