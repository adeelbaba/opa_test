@extends('site.layouts.default')
		{{-- Web site Title --}}
		@section('title')
		Contact Open Payments Analytics Team
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Contact Us, Contact Open Payments Analytics team, OPA, Open Payments Analytics, CMS, Sunshine Act, Open Payments Insights, Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Contact Open Payments Analytics Team" />
        @show


{{-- Content --}}
@section('content')

<html>
<body>
<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">CONTACT US</span> </p>
		
		</div>
	</div>
	</div>
	
	<section class="row">
		<div class="container">
		<div class="col-md-8">
			
			<div class="form-margin">
				<div class="row">
				<p>
					If you have any questions or requests concerning our service, please use this contact form to drop us a line. One of our expert Open Payments Analytics team members will contact you within 24 hours.
				<p>
				<hr>
				<small> Fields marked with * are required. </small>
				</div>
			<div class="row">
						<!-- Blade Template engine -->
									<ul class="alert alert-success text-center">
													 Thank you for showing interest in Open Payments Analytics. <br>
													 We will be in touch shortly.<br>
									</ul>
						 <br>
				</div>
			</div>
			</div>
			<div class="col-md-4">
				<div class="right-sidebar">
					<h5 class="h5-font">Email</h5>
					<p class="p-font">info@openpaymentsanalytics.com</p>
					<br>
					<div class="btm-line"></div>
					<br>
					<a href="//www.facebook.com/Streebo.Inc"><img src="{{{ asset('assets/img/facebook.png') }}}" width="50" height="50"></a>
					<a href="//www.twitter.com/streeboinc"><img src="{{{ asset('assets/img/twitter.png') }}}" width="50" height="50"></a>
					<a href="//www.linkedin.com/company/streebo-inc"><img src="{{{ asset('assets/img/linkedin.png') }}}" width="50" height="50"></a>
				</div>
			</div>
			</div>
		</section>
</body>
</html>

@stop