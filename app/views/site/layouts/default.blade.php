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
		<link rel="stylesheet" href="{{asset('bootstrap/css/strstyle.css')}}">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700,900">
		<style>
		footer{
		  position: absolute;
		  display: block;
		  width: 100%;
		}
		
		.dropdown-menu>.active>a {
			color: #0C9DDC !important;
		}
		
		.dropdown-menu>li>a {
			color: #333 !important;
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
		<link rel="icon" href="{{{ asset('assets/ico/favicon.png') }}}">
		
		<!-- Javascripts
		================================================== -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="{{asset('bootstrap/js/jquery.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Google Analytics Script
						================================================== -->
		<script>

		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-61200678-1', 'auto');
		ga('send', 'pageview');
		
		$(function() {
        //caches a jQuery object containing the header element
        var header = $(".fade-transparent");
      
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                header.removeClass('fade-transparent').addClass("fade-background");
                $("#img-logo").attr('src','{{{ asset('assets/img/logonewchange.png') }}}');
                $("a").addClass("nav-top-color");
                $("a").removeClass("nav-top-transperent");
                $("ul").removeClass("nav-top li a");

            } else {
                header.removeClass("fade-background").addClass('fade-transparent');
                $("#img-logo").attr('src','{{{ asset('assets/img/logonew.png') }}}');
                $("a").addClass("nav-top-transperent");
                $("a").removeClass("nav-top-color");
            }
			});
		});
		
		</script>
		
        @yield('scripts')
		
		
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<!-- Navbar -->
		<div class="container-fluid">
		<header class="row">
		<div class="col-md-12 col-xs-12">
		<nav class="navbar navbar-default navbar-fixed-top nav-color fade-transparent">
		
                    <div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed mob-nav" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand nav-top-transperent" href="{{{ URL::to('') }}}"><img id="img-logo" src="{{{ asset('assets/img/logonew.png') }}}" class="img-responsive" height="50px;"></a>
					</div>
				<div class="collapse navbar-collapse border-none">
                    @if (Auth::check())
					<ul class="nav navbar-nav navbar-center margin-nav-ul-left head-navbar-right nav-top-mrg-sz">
							<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">HOME</a></li>
							<li class="dropdown{{ (Request::is('user/company*|user/physician*|user/specialty*|user/competition*') ? ' active' : '') }}">
								<a class="dropdown-toggle" data-toggle="dropdown" href="{{{ URL::to('user/company') }}}">
									 SPEND ANALYTICS <span class="caret"></span>
								</a>
								<ul class="dropdown-menu nav-top-mrg-sz">
									<li {{ (Request::is('user/company') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/company') }}}">COMPANY</a></li>
									<li {{ (Request::is('user/physician') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/physician') }}}">PHYSICIAN</a></li>
									<li {{ (Request::is('user/specialty') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/specialty') }}}">SPECIALTY</a></li>
									<li {{ (Request::is('user/competition') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/competition') }}}">COMPETITION</a></li>
								</ul>
							</li>
							<li {{ (Request::is('user/faq') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/faq') }}}">FAQ</a></li>
							<li {{ (Request::is('contact') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact') }}}">CONTACT US</a></li>

					</ul>
							
					<ul class ="nav navbar-nav navbar-right margin-nav-uls-left head-navbar-right nav-sign-ss  nav-top-mrg-sz">
							@if (Auth::user()->hasRole('admin'))
								<li><a href="{{{ URL::to('admin') }}}">ADMIN PANEL</a></li>
							@endif
							<li><a href="{{{ URL::to('user') }}}">LOGGED IN AS {{{ Auth::user()->username }}}</a></li>
							<li><a href="{{{ URL::to('user/logout') }}}">LOGOUT</a></li>
					</ul>
                    @else
					<ul class="nav navbar-nav navbar-center margin-nav-ul-left head-navbar-right  nav-top-mrg-sz">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">HOME</a></li>
						<li {{ (Request::is('user/faq') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/faq') }}}">FAQ</a></li>
						<li {{ (Request::is('contact') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact') }}}">CONTACT US</a></li>
					</ul>
							
					<ul class ="nav navbar-nav navbar-right margin-nav-uls-left head-navbar-right nav-sign-ss  nav-top-mrg-sz">
						<li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">REQUEST AN ACCOUNT</a></li>
						<li class="ss" {{ (Request::is('user/login') ? ' class="active"' : '') }}><a class="sign-up-back text-center" style="color: #FFF; padding: 0px !important;   width: 75px;" href="{{{ URL::to('user/login') }}}"><span class="glyphicon glyphicon-lock"></span> LOG IN</a></li>
                    </ul>
					@endif
					<!-- ./ nav-collapse -->
				</div>
		</nav>
		</div>
		</header>
		
		</div>
		<!-- ./ navbar -->
		<!-- Container -->
		<div class= "container-adjustment">
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
		<div class="container">	
		<div class="col-md-6 col-sm-4 col-xs-12">
				<p class="p-mrg p-cen footer-top-mrg footer-txt-color">&copy;2015 <a href="//www.streebo.com" class="nav-top-color"><span class="streebo-color">Streebo</span></a> All Rights Reserved</p>
		</div>
		<div class="col-md-6 col-sm-8 col-xs-12">
			<ul class="nav navbar-nav navbar-right foo-navbar-right nav-btm nav-cen" style="font-size: 12px;">
		        <li><a href="{{{ URL::to('') }}}" class="nav-top-color nav-focus">HOME</a></li>
				<li><a href="{{{ URL::to('user/faq') }}}" class="nav-top-color nav-focus">FAQ</a></li>
		      	<li><a href="{{{ URL::to('user/create') }}}" class="nav-top-color nav-focus">REQUEST AN ACCOUNT</a></li>
		      	<li><a href="{{{ URL::to('contact') }}}" class="nav-top-color nav-focus">CONTACT US</a></li>
		      	
		    </ul>
		</div>
	</div>
	</footer>
	<script>
		  function adjustScreenSize()
		  {
			  var windowHeight=$( document ).height();
			  var navBarHeight=$( "header" ).height();
			  var footerHeight=$( "footer" ).height();
			
			$(".container-adjustment").height(windowHeight-navBarHeight-footerHeight);
		  }
		  adjustScreenSize();
		 $( window ).resize( function(){adjustScreenSize();} );
	</script>
	</body>
</html>
