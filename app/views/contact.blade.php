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
				<h4 class="heading-left-margin">
					<span class="cnt-btm">CONTACT US</span>
				</h4>
		</div>
	</div>
	</div>
	
	<section class="row">
		<div class="container">
		<div class="col-md-8">
			
			<div class="form-margin">
				<div class="row">
				<p>
                    If you have any questions or requests regarding our service, or you simply want a dedicated ear, please drop us a line and we’ll get back to you with a personalized response. You can use the form below or write to us on any of our social channels to your right.

                    We love hearing from you!
				<p>
				<hr>
				<small> Fields marked with * are required. </small>
				</div>
			<div class="row">
						<!-- Blade Template engine -->
							<script charset="utf-8" src="//js.hsforms.net/forms/current.js"></script>
							<script>
							  hbspt.forms.create({ 
								portalId: '304374',
								formId: '15c12fcb-8ebe-475c-bb49-c00715432693',
								css:'.hs-input{width: 500px;} .input{padding-bottom: 10px;}',
								submitButtonClass: 'btn btn-default btn-send'
							  });
							  adjustScreenSize();
							</script>
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