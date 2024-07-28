<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="_token" content="{{ csrf_token() }}" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
	
	<!-- Animate.css -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{ asset('blog_template/css/icomoon.css') }}">
	<!-- Bootstrap  -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/magnific-popup.css') }}">

	<!-- Flexslider  -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/flexslider.css') }}">

	<!-- Owl Carousel -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('blog_template/css/owl.theme.default.min.css') }}">
	
	<!-- Flaticons  -->
		<link rel="shortcut icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('blog_template/fonts/flaticon/font/flaticon.css') }}">

	<!-- Theme style  -->
        <link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    @yield('costum_css')

	</head>
	<body>	

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div id="colorlib-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/Logo_nucleo_advance_fundo_branco.png') }}" alt="Núcleo Advance"></a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
							<ul>
								<li><a href="{{ route('home') }}">Home</a></li>
								<li class="has-dropdown">
									<a href="{{ route('categories.index') }}">Categorias</a>
									<ul class="dropdown">
										@foreach ($navbar_categories as $category)			
											<li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
										@endforeach
									</ul>
								</li>
								<li><a href="{{ route('about') }}">Sobre</a></li>
								<li><a href="{{ route('contact.create') }}">Contato</a></li>
								@guest
								<li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
								@endguest
								@auth
								<li class="has-dropdown">
									<a href="#">{{ auth()->user()->name }} <span class="caret"></span></a>
									<ul class="dropdown">
										<li><a 	onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Logout</a></li>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</ul>
								</li>
								@endauth
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	
			  	</ul>
		  	</div>
		</aside>

        @yield('content')

		<footer id="colorlib-footer">
			<div class="container">
				<div class="row col-md-12 align-items-center justify-content-center">
					<div class="col-md-4 colorlib-widget">
						<h4>Informações de contato</h4>
						<ul class="colorlib-footer-links">
							<li><i class="icon-location4"></i>  Avenida Lauro de Freitas, Tanhaçu-BA</li>
							<li><a href="tel://5511999999999"><i class="icon-phone"></i> +55 11 99999-9999</a></li>
							<li><a href="mailto:info@nucleoadvance.com"><i class="icon-envelope"></i> info@nucleoadvance.com</a></li>
							<li><a href="http://nucleoadvance.com"><i class="icon-globe"></i> nucleoadvance.com</a></li>
						</ul>
					</div>

					<div class="col-md-4 colorlib-widget">
						<h4>Links Úteis</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> About Us</a></li>
								<li><a href="#"><i class="icon-check"></i> Testimonials</a></li>
								<li><a href="#"><i class="icon-check"></i> Courses</a></li>
								<li><a href="#"><i class="icon-check"></i> Event</a></li>
								<li><a href="#"><i class="icon-check"></i> News</a></li>
								<li><a href="#"><i class="icon-check"></i> Contact</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-4 colorlib-widget">
						<h4>Postagens Recentes</h4>
						@foreach ($recent_posts as $recent_post)

						<div class="f-blog">
                            <a href="{{ route('posts.show', $recent_post)}}" class="blog-img" style="background-image: url({{ asset($recent_post->image->path ? 'storage/'. $recent_post->image->path : 'placeholders/thumbnail_placeholder.svg') }});">
                            </a>
                            <div class="desc">
                                <h2><a title="{{ $recent_post->title }}" href="{{ route('posts.show', $recent_post)}}">{{ \Str::limit($recent_post->title, 20) }}</a></h2>
                                <p class="admin"><span>{{ $recent_post->created_at->format('d M Y') }}</span></p>
                            </div>
                        </div>

						@endforeach

					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
								<small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados | Feito com <i class="icon-heart" aria-hidden="true" style="color: red;"></i> by <a href="https://danielprospero.com" target="_blank">Daniel Próspero</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small><br> 
								<small class="block">Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>, <a href="http://pexels.com/" target="_blank">Pexels</a></small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ asset('blog_template/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('blog_template/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('blog_template/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('blog_template/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('blog_template/js/jquery.stellar.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('blog_template/js/jquery.flexslider-min.js') }}"></script>
	<!-- Owl carousel -->
	<script src="{{ asset('blog_template/js/owl.carousel.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('blog_template/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('blog_template/js/magnific-popup-options.j') }}s"></script>
	<!-- Counters -->
	<script src="{{ asset('blog_template/js/jquery.countTo.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('blog_template/js/main.js') }}"></script>

	<script src="{{ asset('js/functions.js') }}"></script>

	<script>
		$(function(){

			function isEmail(email){
				var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
			}

			$(document).on('click', '#subscribe-btn', (e) => {
				e.preventDefault();
				let _this = $(e.target);
				let email = _this.parents("form").find("input[name='subscribe-email']").val();

				if(! isEmail( email )){
					$("body").append('<div class="global-message alert alert-danger error">Email inválido</div>');
				}else{
                    let formData = new FormData();
                    let _token = $("meta[name='_token']").attr("content");
                    formData.append('_token', _token);
                    formData.append('email', email);

                    $.ajax({
                        url: "{{ route('newsletter_store') }}",
                        type: "POST",
                        dataType: "JSON",
                        processData: false,
                        contentType: false,
                        data:formData,
                        success: (respond) => {
                            let message = respond.message;
							$("body").append('<div class="global-message alert alert-success success">'+message+'</div>');
							_this.parents("form").find("input[name='subscribe-email']").val("");
						},
						statusCode: {
							500: function(respond){
								$("body").append('<div class="global-message alert alert-danger error">Erro ao inscrever-se</div>');
							}
						}
					});
				}
				setTimeout(function(){
					$(".global-message").remove();
				}, 5000);
			});
		});

	</script>

    @yield('custom_js')

	</body>
</html>

