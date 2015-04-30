@extends('site.layouts.default')

{{-- Web site Title --}}
		@section('title')
		 OpenPaymentsAnalytics - Request an Account
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Request an Account, Sign up at Open Payments Analytics, Register at Open Payments Analytics, Open Payments Analytics, OPA, CMS,  Streebo Inc., cms, sunshine act, yments, payment sunshine act, the sunshine act, physician payments sunshine act, ysician sunshine act, open payments website, physicians payment sunshine act, federal sunshine act" />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Register, request an account at open payments analytics" />
        @show

{{-- Content --}}
@section('content')
<div class="row sub-header">
		<div class="container">
			<div class="col-md-12">
			<p>
				<span class="cnt-btm">REQUEST AN ACCOUNT</span>
			</p>
			</div>
		</div>
</div>
	
	<section class="container">
	<div class="row">
		<h3 style="text-align: center;">
			Let's Get Started
		</h3>
		<!--<p style="text-align: center; padding-bottom: 5px !important; font-size: 13px;">
			Sign up for Complimentary Access to OPA — we are only accepting registrations from individuals within the Life Sciences industry at this point.
		</p>-->
				<div>
					<div class="row text-sec">
						<div class="container text-center">
							<div class="col-md-4">
								<p class="p-mrg">
									<span class="glyphicon glyphicon-search"></span> <b> View Open Payments Data like Never Before</b>
								</p>
								<p style="font-size: 14px;">
								Gain valuable insights into Open Payments with our complimentary Company, Physician, Specialty and Competitor dashboards
								</p>
							</div>
							
							<div class="col-md-4">
								<p class="p-mrg">
									<span class="glyphicon glyphicon-tasks"></span> <b> Leverage the Expertise</b>
								</p>
								<p style="font-size: 14px;">
								Open Payments Analytics dashboards were developed in parallel with pharma sales and marketing teams with the common goal of addressing their key requirements
								</p>
							</div>
							
							<div class="col-md-4">
								<p class="p-mrg">
									<span class="glyphicon glyphicon-signal"></span> <b>Optimize your HCP Interactions</b>
								</p>
								<p style="font-size: 14px;">
								Be the early adopter to gain competitive advantage
								</p>
							</div>
						</div>
					</div>
				</div>
	</div>
	<hr style="margin-bottom: 0px;">
	<div class="row">
			
			<div class="row">
			<form class = "form-margin" method="POST" action="{{{ URL::to('user') }}}" accept-charset="UTF-8">
				<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
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
					<div class="col-md-6">
							<div class="form-group">
							<p>
								{{ Form::label('first_name', 'FIRST NAME*', ['class' => 'control-label']) }}
								{{ Form:: text ('first_name', Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control'))}}
							</p>
							</div>

							<div class="form-group">
								{{ Form::label('last_name', 'LAST NAME*', ['class' => 'control-label']) }}
								{{ Form:: text ('last_name', Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control'))}}
							</div>
					
							<div class="form-group">
								{{ Form::label('organization', 'ORGANIZATION*', ['class' => 'control-label']) }}
								{{ Form:: text ('organization', Input::old('organization'), array('placeholder' => 'Organization', 'class' => 'form-control'))}}
								 
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
					</div>
					
					<div class="col-md-6">
							<div class="form-group">
								<label for="username">{{{ Lang::get('confide::confide.username') }}}*</label>
								<input class="form-control" placeholder="Username" type="text" name="username" id="username" value="{{{ Input::old('username') }}}">
							</div>
							
							<div class="form-group">
								<label for="email">{{{ Lang::get('confide::confide.e_mail') }}}*</label>
								<input class="form-control" placeholder="Corporate Email Required" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
							</div>
							
							<div class="form-group">
								<label for="password">{{{ Lang::get('confide::confide.password') }}}*</label>
								<input class="form-control" placeholder="Password" type="password" name="password" id="password">
							</div>
							
							<div class="form-group">
								<label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}*</label>
								<input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
							</div>
					</div>
				<div class="col-md-12" style = "text-align: center;">
					<hr>
					<small class="p-mrg" style="font-size: 11px !important; color #000">By continuing, you agree to <a href="{{{ URL::to('user/legal') }}}" target="_blank">Open Payments Analytics' Legal Agreement</a>.<br></small>
					<small class="p-mrg" style="font-size: 11px !important; color #000">** At this time we are only accepting account requests from individuals within life sciences industry<br></small><br>
					<div class="form-actions form-group">
					  <button type="submit" class="btn btn-default btn-send"> <span class="glyphicon glyphicon-ok"></span> {{{ Lang::get('confide::confide.signup.submit') }}}</button>
					</div>
				</div>
				</fieldset>
			</form>
			<br>
		</div>
	</div>
	</section>

	<script>
		adjustScreenSize();
	</script>
@stop
