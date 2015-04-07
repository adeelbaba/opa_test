@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.profile') }}} ::
@parent
@stop

{{-- Content --}}
@section('content')
	<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">
		
			
				<p class="p-mrg" style = "  padding: 0px;"><span class="cnt-btm">USER PROFILE</span> </p>
		
		</div>
	</div>
	</div>
	
	<section class="row sec-login">
	<div class="container">
	<div class="col-md-6">
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Signed Up</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{{$user->id}}}</td>
        <td>{{{$user->username}}}</td>
        <td>{{{$user->joined()}}}</td>
    </tr>
    </tbody>
</table>

	</div>

	<div class="col-md-6">
		
	</div>
		</div>
	</section>
@stop
