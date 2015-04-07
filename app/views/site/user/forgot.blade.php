@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.forgot_password') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">FORGOT  PASSWORD</span> </p>
		
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
