<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Chipap.com
			@show
		</title>
		<meta name="keywords" content="Justdial, local search, local businesses, yellow pages, online yellow pages, yellow pages india, India trade directory,  yellow pages directory, city yellow pages, indian search engine, justdial customer care, justdial customer support" />
		<meta name="description" content="Justdial India's No.1 local search engine provides comprehensive updated information on all B2B and B2C Products and Services. Services available in all major Indian cities including Mumbai, Delhi, Bangalore, Hyderabad, Chennai, Pune, Kolkata, Ahmedabad and many more." />

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		{{ HTML::style('assets/css/bootstrap.css') }}
		{{ HTML::style('assets/css/common.css') }}
		{{ HTML::style('assets/css/font-awesome.min.css') }}

		<style>
		@section('styles')
		body {
			padding: 60px;
		}
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
		<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
		<link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
		</head>

		<body>
		<!-- Container -->
		<div class="container">
		<!-- Navbar -->
		<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
		<div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</a>
		<a class="chipapbrand btn btn-success" href="{{ URL::route('home') }}" name="top">Chipap</a>

		<div class="nav-collapse collapse">

		<ul class="nav">
		<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{ URL::to('') }}"><i class="icon-file"></i> Home</a></li>
							<li class="divider-vertical"></li>

		<li {{ (Request::is('blog') ? 'class="active"' : '') }}><a href="{{ route('blog') }}"><i class="icon-heart"></i> Blog</a></li>
					<li class="divider-vertical"></li>

		{{ Form::open(array( 'method'=>'GET', 'url'=>'search', 'class' => 'form-search form-horizontal pull-right', 'id' => 'custom-search-form')) }}
		<div class="input-append">
		 {{ Form::text('search', Input::old('searchInput'), array('class' => 'search-query', 'placeholder'=>'Search')) }}
		<button type="submit" class="btn"><i class="icon-search"></i></button>
		</div>
		{{ Form::close() }}
		
		</ul>

		<ul class="nav pull-right">

		@if (Sentry::check())
		<li {{ (Request::is('projects/create') ? 'class="active"' : '') }}><a href="{{ route('create') }}"><i class="icon-plus"></i> Add your Property</a></li>
		<li class="dropdown{{ (Request::is('account*') ? ' active' : '') }}">
		<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="{{ route('account') }}">
		Welcome, {{ Sentry::getUser()->first_name }}
		<b class="caret"></b>
		</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		@if(Sentry::getUser()->hasAccess('admin'))
		<li><a href="{{ route('admin') }}"><i class="icon-cog"></i> Administration</a></li>
		@endif
		<li{{ (Request::is('account/profile') ? ' class="active"' : '') }}><a href="{{ route('profile') }}"><i class="icon-user"></i> Your profile</a></li>
		<li class="divider"></li>
		<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
		
		</li>
		@else
		<li {{ (Request::is('auth/signin') ? 'class="active"' : '') }}><a href="{{ route('signin') }}"><i class="icon-lock"></i> Sign in</a></li>
		<li {{ (Request::is('auth/signup') ? 'class="active"' : '') }}><a href="{{ route('signup') }}"><i class="icon-user"></i> Sign up</a></li>
		<li {{ (Request::is('projects/create') ? 'class="active"' : '') }}><a href="{{ route('create') }}"><i class="icon-plus"></i> Add your Property</a></li>
		@endif
		</ul>
		</div>
		</div>
		</div>
		</div>


		<!-- Notifications -->
		@include('frontend/notifications')

		<!-- Content -->
		@yield('content')

		<hr />

		<!-- Footer -->
		<footer>
			<div class="container">	
				<div class="row-fluid">
					<div class="span12">
						<div class="span2" style="width: 15%;">
							<ul class="unstyled">
								<li>Navigate<li>
								<li><a href="{{ URL::to('about-us') }}">About us</a></li>
								<li><a href="{{ URL::to('blog') }}">Blog</a></li>
								<li><a href="#">Jobs & Careers</a></li>
								<li><a href="{{ URL::to('contact-us') }}">Customer Support</a></li>
							</ul>
						</div>
						<div class="span2" style="width: 15%;">
							<ul class="unstyled">
								<li>Chipap Central<li>
								<li><a href="{{ route('signin') }}">Sign In</a></li>
								<li><a href="{{ route('signup') }}">Register</a></li>
								<li><a href="{{ route('signup') }}">Add your Business</a></li>
								<li><a href="#">Latest Reviews</a></li>							
							</ul>
						</div>
						<div class="span2" style="width: 15%;">
							<ul class="unstyled">
								<li>Social<li>
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Twitter</a></li>
								<li><a href="#">Google Plus</a></li>
								<li><a href="#">Pinterest</a></li>							
							</ul>
						</div>
						<div class="span2" style="width: 15%;">
							<ul class="unstyled">
								<li>Media Center<li>
								<li><a href="#">News</a></li>
								<li><a href="#">Press Release</a></li>							
							</ul>
						</div>	
						<div class="span2" style="width: 15%;">
							<ul class="unstyled">
								<li>Others<li>
								<li><a href="#">Whats new</a></li>
								<li><a href="#">Trending</a></li>
								<li><a href="#">Help</a></li>
								<li><a href="#">Advertise</a></li>
							</ul>
						</div>					
					</div>
				</div>
				<hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="span8">
							<a href="#">Terms of Service</a>    
							<a href="#">Privacy</a>    
							<a href="#">Security</a>
						</div>
						<div class="span4">
							<p class="muted pull-right">© 2013 Chipap.com. All rights reserved</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		</div>

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/js/jquery.v1.9.1.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
		</body>
		</html>
