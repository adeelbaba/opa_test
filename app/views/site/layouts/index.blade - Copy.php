<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			OpenPayments Analytics
			@show
		</title>
		@section('meta_keywords')
		<meta name="keywords" content="OpenPayments, Open Payments Analytics, OpenPaymentsAnalytics" />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Sunshine Act, OpenPayments Data Analysis, OpenPayments" />
                @show
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/style.css')}}">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700,900">
		<style>
        .container-fluid {
			padding-right: 0px;
			padding-left: 0px;
        }
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
		
		<!-- Javascripts
		================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
		<script type="application/javascript" src="http://198.176.30.253/SpotfireWeb/GetJavaScriptApi.ashx?Version=1.0"></script>
		<script src="{{asset('bootstrap/js/util.js')}}"></script>
		<script src="{{asset('bootstrap/js/typeahead.js')}}"></script>
		<script src="{{asset('bootstrap/js/bloodhound.js')}}"></script>

		<!-- Google Analytics Script
						================================================== -->
		<script>

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-61200678-1', 'auto');
		ga('send', 'pageview');
		
		</script>
		
        @yield('scripts')
		
		
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<!-- Navbar -->
		<div class="container-fluid">
			<header class="row">
		<div class="col-md-12 col-xs-12">
		<nav class="navbar navbar-default na-bck">
		
			 <div class="container-fluid">
                    <div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed mob-nav" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="{{{ URL::to('') }}}"><img src="{{{ asset('assets/img/logo.png') }}}" class="img-responsive" height="50px;"></a>
					</div>
				<div class="collapse navbar-collapse border-none">
                    <ul class="nav navbar-nav navbar-right nav-top">
                        @if (Auth::check())
                        @if (Auth::user()->hasRole('admin'))
							<li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
                        @endif
							<li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
							<li><a href="{{{ URL::to('user/logout') }}}">Logout</a></li>
                        @else
							<li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
							<li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">Login</a></li>
                        @endif
                    </ul>
					
					<ul class="nav navbar-nav navbar-right nav-top">
                    <li {{ (Request::is('contact') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact') }}}">Contact Us</a></li>
					</ul>
					
					@if (Auth::check())
						
					  <ul class="nav navbar-nav navbar-right nav-top">
						<li {{ (Request::is('user/competition') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/competition') }}}">Competition</a></li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right nav-top">
						<li {{ (Request::is('user/specialty') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/specialty') }}}">Specialty</a></li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right nav-top">
						<li{{ (Request::is('user/physician') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/physician') }}}">Physician</a></li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right nav-top">
								<li {{ (Request::is('user/company') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/company') }}}">Company</a></li>
					  </ul>
					@endif
					
				
                    <ul class="nav navbar-nav navbar-right nav-top">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
					</ul>
					<!-- ./ nav-collapse -->
				</div>
		</div>
		</nav>
		</div>
		</header>
		</div>
		<!-- ./ navbar -->
		<!-- Container -->
		<div class="container-fluid">
			<!-- Notifications -->
			@include('notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->
		
		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>

		
		
		<footer class="row">
		<div class="container-fluid">	
		<div class="col-md-6 col-sm-4 col-xs-12">
		
			
				<p class="p-mrg p-cen">&copy;2015 <a href="#"><span class="streebo-color">Streebo</span></a> All Rights Reserved</p>
		</div>
		<div class="col-md-6 col-sm-8 col-xs-12">
			<ul class="nav navbar-nav navbar-right nav-top nav-cen">
		        <li><a href="{{{ URL::to('') }}}">About Us</a></li>
		      	<li><a href="{{{ URL::to('user/create') }}}">Request an Account</a></li>
		      	<li><a href="{{{ URL::to('contact') }}}">Contact Us</a></li>
		      	
		    </ul>
		</div>
	</div>
	</footer>
	</body>
</html>
