@extends('main_layouts.master')
@section('title', 'MyBlog | Post')
@section('content')

@section('custom_css')

	<style>
		.class-single .desc img {
			width: 100%;
		}
	</style>

@endsection

    <div class="colorlib-classes">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row row-pb-lg">
                        <div class="col-md-12 animate-box">
                            <div class="classes class-single">
								<div class="classes-img" style="background-image: url({{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '')  }});">
                                </div>
                                <div class="desc desc2">
                                   {!! $post->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-pb-lg animate-box">

                        <div class="col-md-12">
                            <h2 class="colorlib-heading-2">{{ count($post->comments) }} Comments</h2>

                            @foreach($post->comments as $comment)
                            <div id="comment_{{ $comment->id }}" class="review">
                                <div 
                                class="user-img" 
                                style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : asset('storage/images/avatar.jpg')  }});"></div>
                                <div class="desc">
                                    <h4>
                                        <span class="text-left">{{ $comment->user->name }}</span>
                                        <span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
                                    </h4>
                                    <p>{{ $comment->the_comment }}</p>
                                    <p class="star">
                                        <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                    </p>
                                </div>
                            </div>
                            
                            @endforeach

                        </div>
					</div>

                    <div class="row animate-box">
                        <div class="col-md-12">

                            <x-blog.message :status="'success'"/>

                            <h2 class="colorlib-heading-2">Deixe um comentário</h2>

                            @auth

                            <form method="POST" action="{{ route('posts.add_comment', $post) }}">
                                @csrf
                                
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <!-- <label for="message">Message</label> -->
                                        <textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Digite aqui seu comentário"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Publicar comentário" class="btn btn-primary">
                                </div>
                            </form>

                            @endauth

                            @guest
                            <p class="lead"><a href="{{ route('login') }}">Login </a> ou <a href="{{ route('register') }}">Cadastre</a> para escrever comentários</p>
                            @endguest	

                        </div>
                    </div>
                </div>

                <!-- SIDEBAR: start -->
                <div class="col-md-4 animate-box">
                    <div class="sidebar">

                        <x-blog.side-categories :categories="$categories" />
                        <x-blog.side-recent-posts :recentPosts="$recent_posts" />
                        <x-blog.side-tags :tags="$tags" />

                    </div>
                </div>
            </div>
        </div>	
    </div>

@endsection