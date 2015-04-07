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
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">FORGOT PASSWORD</span></p>
		
		</div>
	</div>
	</div>
	
	<section class="row sec-login">
	<div class="container">
	<div class="col-md-6">
		<div class="row">
		<br>

		@if (Session::get('error'))
        <div class="error-login text-center">{{{ Session::get('error') }}}</div>
		@endif

		@if (Session::get('notice'))
			<div class="alert">{{{ Session::get('notice') }}}</div>
		@endif
		
		<form method="POST" action="{{{ URL::to('/user/reset/') }}}" accept-charset="UTF-8">
			<input type="hidden" name="token" value="{{{ $token }}}">
			<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

			<div class="form-control-group">
				<label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
				<div class="controls">
					<input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
				</div>
			</div>
			<br>
			<div class="form-control-group">
				<label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
				<div class="controls">
					<input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
				</div>
			</div>
		<br>
			<button type="submit" class="btn btn-default btn-send"><span class="glyphicon glyphicon-ok"></span> SUBMIT</button>
		</form>
	
	</div>
</div>
	<div class="col-md-6">
		
	</div>
		</div>
	</section>
@stop
