@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
		OpenPaymentsAnalytics - Update User Account
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Update User Account, Change Password, Open Payments Analytics, Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Update user account - open payments analytics" />
        @show
		
{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')
	<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">EDIT YOUR SETTINGS</span> </p>
		
		</div>
	</div>
	</div>
	
		<section class="row sec-login">
			<div class="container">
			<div class="col-md-6">
			<br>
			<br>
		<form class="form-horizontal" method="post" action="{{ URL::to('user/' . $user->id . '/edit') }}"  autocomplete="off">
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<!-- ./ csrf token -->
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- username -->
				<div class="form-control-group {{{ $errors->has('username') ? 'error' : '' }}}">
					<label for="username">USERNAME</label>
					<div class="control">
						<input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" />
						{{ $errors->first('username', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ username -->
				<br>
				<!-- Email -->
				<div class="form-control-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label for="email">EMAIL</label>
					<div class="control">
						<input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}" />
						{{ $errors->first('email', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ email -->
				<br>
				<!-- Password -->
				<div class="form-control-group {{{ $errors->has('password') ? 'error' : '' }}}">
					<label for="password">PASSWORD</label>
					<div class="control">
						<input class="form-control" type="password" name="password" id="password" value="" />
						{{ $errors->first('password', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ password -->
				<br>
				<!-- Password Confirm -->
				<div class="form-control-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
					<label for="password_confirmation">PASSWORD CONFIRM</label>
					<div class="control">
						<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
						{{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ password confirm -->
			</div>
			<!-- ./ general tab -->
			<br>
			<!-- Form Actions -->
			<div class="form-control-group">
				<div class="control">
					<button type="submit" class="btn btn-default btn-send"><span class="glyphicon glyphicon-edit"></span> UPDATE</button>
				</div>
			</div>
			<!-- ./ form actions -->
			</form>
			</form>
			</div>

			<div class="col-md-6">
				
			</div>
			</div>
		</section>
@stop
