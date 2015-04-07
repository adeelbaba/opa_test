@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.register') }}} ::
@parent
@stop

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
					<p class="p-mrg">Thank you for choosing Open Payment Analytics: a one-of-its kind tool, created specifically for the Pharma professional.  At this time we are only accepting registrations for individuals within the Life Sciences industry, we hope to see you here as our tool expands to reach a wider audience. </p>
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
	
			<table class="table  text-center" id="tab" style="margin:70px; width: 300px; ">
			<tr>
			<td style="vertical-align: middle;"><img src="{{{ asset('assets/img/user1.png') }}}" height="100 px" width="100px"></td>
			<td style="vertical-align: middle;"><p class="text-center">Gain valuable insights</p></td>
			</tr>
			<tr>
			<td style="vertical-align: middle;"><img src="{{{ asset('assets/img/user2.png') }}}" height="100 px" width="100px"></td>
			<td style="vertical-align: middle;"><p class="text-center">Optimize your business model</p></td>
			</tr>
			<tr>
			<td style="vertical-align: middle;"><img src="{{{ asset('assets/img/user3.png') }}}" height="100 px" width="100px"></td>
			<td style="vertical-align: middle;"><p class="text-center">MAKE open payments data <br> work for YOU</p></td>
			</tr>
			</table>
	</div>
	</div>
	</section>

@stop
