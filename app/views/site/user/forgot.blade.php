@extends('site.layouts.default')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Forgot Password
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Forgot Password at Open Payments Analytics, Open Payments Analytics, OPA, CMS,  Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Recover your open payments analytics account password" />
        @show

{{-- Content --}}
@section('content')
<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
			<p>
				<span class="cnt-btm">FORGOT  PASSWORD</span>
			</p>
		</div>
	</div>
	</div>
	
	<section class="row sec-login">
	<div class="container">
	<div class="col-md-6">
	<div class="form-margin">
			<br>
			<div class="row">
				{{ Confide::makeForgotPasswordForm() }}
			</div>
	
	</div>
	</div>
		<div class="col-md-6">
		</div>
	</div>
	</section>
@stop
