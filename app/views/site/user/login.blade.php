@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.login') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')

	<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">LOGIN</span> </p>
		
		</div>
	</div>
	</div>
	
	<section class="row sec-login">
	<div class="container">
	<div class="col-md-6">
<div class="form-margin">
			<br>
			<div class="row">
				<form role="form" method="POST" action="{{{ URL::to('/user/login') }}}" accept-charset="UTF-8">
					<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					
					<div>
						@if (Session::get('error'))
							<div class="error-login text-center">
								<p>
									{{{ Session::get('error') }}}
								</p>
							</div>
						@endif
					</div>
					<br>
					<fieldset>
						<div class="form-control-group">
							<label for="email" style ="text-transform: uppercase;">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
							<div class="controls">
								<input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
							</div>
						</div>
						<br>
						<div class="form-control-group">
						<label for="password" style ="text-transform: uppercase;">
							{{{ Lang::get('confide::confide.password') }}}
						</label>
						<div class="controls">
							<input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
						</div>
						</div>
						<div class="radio rd-margin">
									  <label>
										<div class="checkbox">
										<label><input type="checkbox" value="" class="rd-margin">Remember me</label>
										</div>
									  </label>
						</div>
												
						   <button type="submit" class="btn btn-default btn-send"><span class="glyphicon glyphicon-log-in"></span> LOG IN</button>
					</fieldset>
				</form>
			<br>
				<p><a href="{{{ URL::to('/user/create') }}}"> Request an Account </a> | <a href="{{{ URL::to('/user/forgot') }}}">Forgot password?</a></p>
			</div>
	
	</div>
</div>
	<div class="col-md-6">
	</div>
		</div>
	</section>
@stop