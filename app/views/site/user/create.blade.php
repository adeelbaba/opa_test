@extends('site.layouts.default')

{{-- Web site Title --}}
		@section('title')
		 OpenPaymentsAnalytics - Request an Account
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Request an Account, Sign up at Open Payments Analytics, Register at Open Payments Analytics, Open Payments Analytics, OPA, CMS,  Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Register, request an account at open payments analytics" />
        @show

{{-- Content --}}
@section('content')
<style>

table, tr, th, td {
	text-align: center !important;
	table-layout: auto !important;
    border: 0px;
	border-top: 0px !important;
}

</style>

<div class="row sub-header">
		<div class="container">
			<div class="col-md-12">
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">REQUEST AN ACCOUNT</span></p>
		
			</div>
		</div>
</div>
	
	<section class="container">
	<div class="row">
				<div	class="col-md-12">
					<p class="p-mrg">At this time, we are only accepting registrations from individuals within the Life Sciences industry. Please proceed with the registration process if you belong to a Pharmaceutical using your corporate email address.</p>
				</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
			
			<div class="row">
			<form class = "form-margin" method="POST" action="{{{ URL::to('user') }}}" accept-charset="UTF-8">
				<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
				<small> Fields marked with * are Required</small>
					<div>
						@if (Session::get('error'))
							<div class="error-login text-center">
								<p>
									{{{ Session::get('error') }}}
								</p>
							</div>
							
						@endif
						<div id="errorDiv" style="display:none;" class="error-login text-center">
								
							</div>
					</div>
					<br>
				
				<fieldset>
					
							<div class="form-group">
								{{ Form::label('first_name', 'FIRST NAME*', ['class' => 'control-label']) }}
								<input class="form-control" placeholder="First Name" type="text" name="first_name" id="first_name">
								
							</div>

			<div class="form-group">
								{{ Form::label('last_name', 'LAST NAME*', ['class' => 'control-label']) }}
								<input class="form-control" placeholder="Last Name" type="text" name="last_name" id="last_name">
							</div>
					
					<div class="form-group">
								{{ Form::label('organization', 'ORGANIZATION*', ['class' => 'control-label']) }}
								<input class="form-control" placeholder="Organization" type="text" name="organization" id="organization">
								 
							</div>
					<div class="form-group">
						 {{ Form::label('department', 'DEPARTMENT*', ['class' => 'control-label']) }}
						 {{Form::select('selectdepartment',
									 array(
											'None' => '- None -', 
											'Accounting/Finance'=>'Accounting/Finance',
											'Professional Services'=>'Professional Services',
											'Engineering/Development'=>'Engineering/Development',
											'General Mgmt/Administration'=>'General Mgmt/Administration',
											'Human Resources'=>'Human Resources',
											'IT'=>'IT',
											'Legal'=>'Legal',
											'Market'=>'Marketing',
											'Operations'=>'Operations',
											'Channel'=>'Channel',
											'Product Management'=>'Product Management',
											'Purchasing/Merchandisingr'=>'Purchasing/Merchandising',
											'Sales'=>'Sales',
											'Science'=>'Science',
											'Support/Service'=>'Support/Service',
											'Other'=>'Other'
											),null,
									['class' => 'form-control'])}}
					</div>
					
					
					<div class="form-group">
						 {{ Form::label('role', 'ROLE', ['class' => 'control-label']) }}
						 {{Form::select('selectrole',
									 array(
											'None' => '- None -', 
											'CEO/President'=>'CEO/President',
											'C-Level'=>'C-Level',
											'VP'=>'VP',
											'Manager'=>'Manager',
											'Analyst'=>'Analyst',
											'Coordinator/Specialist'=>'Coordinator/Specialist',
											'Architect'=>'Architect',
											'Developer/Engineer'=>'Developer/Engineer',
											'Consultant/System Integrator'=>'Consultant/System Integrator',
											'Professor/Teacher'=>'Professor/Teacher',
											'Student'=>'Student',
											'Other'=>'Other'
											),null,
									['class' => 'form-control'])}}
					</div>
					
					
					<div class="form-group">
						<label for="username">{{{ Lang::get('confide::confide.username') }}}*</label>
						<input class="form-control" placeholder="{{{ Lang::get('confide::confide.username') }}}" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
					</div>
					<div class="form-group">
						<label for="email">{{{ Lang::get('confide::confide.e_mail') }}}*</label>
						<input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
					</div>
					<div class="form-group">
						<label for="password">{{{ Lang::get('confide::confide.password') }}}*</label>
						<input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
					</div>
					<div class="form-group">
						<label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}*</label>
						<input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
					</div>

					<div class="form-actions form-group">
					  <button type="submit" class="btn btn-default btn-send"> <span class="glyphicon glyphicon-ok"></span> {{{ Lang::get('confide::confide.signup.submit') }}}</button>
					</div>

				</fieldset>
			</form>
			<br>
		</div>
	</div>
		<div class="col-md-6">
			<img style="padding: 90px;" src="{{{ asset('assets/img/registration.png') }}}">
	</div>
	</div>
	</section>

@stop
