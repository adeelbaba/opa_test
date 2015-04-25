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
		<link rel="stylesheet" href="{{asset('bootstrap/css/autocomplete.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/strstyle.css')}}">
		<link rel="stylesheet" href="{{asset('bootstrap/css/jquery.loading-indicator.css')}}">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700,900">

        <style>
		
		footer{
			width: auto;
				  display: block;
				  left: 0px;
				  right: 0px;
				  bottom:0px;
				  margin-bottom:0px;
				}
            @section('styles')
            @show
        </style>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
		
		<!-- Javascripts
						================================================== -->
		<script type="application/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="application/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
        <script type="application/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
		<script type="application/javascript" src="http://198.176.30.253/SpotfireWeb/GetJavaScriptApi.ashx?Version=1.0"></script>
		<script type="application/javascript" src="{{asset('bootstrap/js/util.js')}}"></script>
		<script type="application/javascript" src="{{asset('bootstrap/js/typeahead.js')}}"></script>
		<script type="application/javascript" src="{{asset('bootstrap/js/bloodhound.js')}}"></script>
		<script type="application/javascript" src="{{asset('bootstrap/js/jquery.loading-indicator.js')}}"></script>
		<script type="application/javascript" src="{{asset('bootstrap/js/jquery.loading-indicator.min.js')}}"></script>

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
		
        <!-- Favicons
        ================================================== -->
        <link rel="icon" href="{{{ asset('assets/ico/favicon.png') }}}">
</head>

<body>
<div class="container-fluid">
			<header class="row">
		<div class="col-md-12 col-xs-12">
		<nav class="navbar navbar-default na-bck">
		
			 <div class="container">
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
                    @if (Auth::check())
					<ul class="nav navbar-nav navbar-right nav-top remove-shadow">
							<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">HOME</a></li>
							<li {{ (Request::is('user/company') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/company') }}}">COMPANY</a></li>
							<li {{ (Request::is('user/physician') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/physician') }}}">PHYSICIAN</a></li>
							<li {{ (Request::is('user/specialty') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/specialty') }}}">SPECIALTY</a></li>
							<li {{ (Request::is('user/competition') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/competition') }}}">COMPETITION</a></li>
							@if (Auth::user()->hasRole('admin'))
								<li><a href="{{{ URL::to('admin') }}}">ADMIN PANEL</a></li>
							@else
								<li {{ (Request::is('contact') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact') }}}">CONTACT US</a></li>
							@endif
							<li><a href="{{{ URL::to('user') }}}">LOGGED IN AS {{{ Auth::user()->username }}}</a></li>
							<li><a href="{{{ URL::to('user/logout') }}}">LOGOUT</a></li>
					</ul>
                    @else
					<ul class="nav navbar-nav navbar-right nav-top remove-shadow">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">HOME</a></li>
						<li {{ (Request::is('contact') ? ' class="active"' : '') }}><a href="{{{ URL::to('contact') }}}">CONTACT US</a></li>
						<li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">REQUEST AN ACCOUNT</a></li>
						<li {{ (Request::is('user/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/login') }}}">LOGIN</a></li>
                    </ul>
					@endif
					<!-- ./ nav-collapse -->
				</div>
		</div>
		</nav>
		</div>
		</header>
		</div>
    <!-- ./ navbar -->

    <!-- Container -->
    <div class="container container-adjustment">
        <!-- Notifications -->
        @include('notifications')
        <!-- ./ notifications -->

        <!-- Content -->
        @yield('content')
        <!-- ./ content -->
    </div>
    <!-- ./ container -->
	<br>
	<!-- the following div is needed to make a sticky footer -->
    <div id="push"></div>


<footer class="row">
		<div class="container">	
		<div class="col-md-6 col-sm-4 col-xs-12">
		
			
				<p class="p-mrg p-cen">&copy;2015 <a href="//www.streebo.com"><span class="streebo-color">Streebo</span></a> All Rights Reserved</p>
		</div>
		<div class="col-md-6 col-sm-8 col-xs-12">
			<ul class="nav navbar-nav navbar-right nav-top nav-cen">
		        <li><a href="{{{ URL::to('') }}}">ABOUT US</a></li>
		      	<li><a href="{{{ URL::to('user/create') }}}">REQUEST AN ACCOUNT</a></li>
		      	<li><a href="{{{ URL::to('contact') }}}">CONTACT US</a></li>
		      	
		    </ul>
		</div>
	</div>
	</footer>
		
</body>
</html>
