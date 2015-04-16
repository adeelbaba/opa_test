@extends('site.layouts.index')

{{-- Content --}}
@section('content')
	
	<div class="row sub-header">
		<div class="container">
		<div class="col-md-12">

				<p class="p-mrg"><span class="cnt-btm">INTRODUCING </span> OPEN PAYMENTS ANALYTICS</p>

		</div>
		</div>
	</div>

	<div class="row text-sec">
		<div class="container">
		<div class="col-md-12">

				<p class="p-mrg">
				The Centers of Medicare & Medicaid Services (CMS), released the first batch of Open Payments data on September 30, 2014. The data covers payments from the period of August 2013 to December 2013, providing a detailed account of the pharmaceutical industry’s financial interactions with physicians and teaching hospitals. Though the data is limited at this point, it still provides interesting insights for all relevant parties including pharmaceutical compliance teams, sales teams, as well as physicians.
				</p> 
				<p class="p-mrg">
				Open Payments Analytics is an analytics engine that allows pharmaceutical teams to drill down this data-set, gain valuable and interesting insight into the data, and as a result, optimize their business models.
				</p> 
				<p class="p-mrg">
				<a href="{{{ URL::to('contact') }}}">GET IN TOUCH</a> with our team to discuss how Streebo can help your organization use Open Payments data.
				</p>
		</div>
		</div>
	</div>

	<div class="row sub-header">
		<div class="container">
		<div class="col-md-12 text-center">
		
			
				<p class="p-mrg"><span class="cnt-btm">Find out </span> how YOU can use OPEN PAYMENTS ANALYTICS</p>
		
		</div>
		</div>
	</div>

	<div class="sec-margin">
	<div class="row text-sec">
		<div class="container text-center">
			<div class="col-md-4">
				<img src="{{{ asset('assets/img/img1.png') }}}">
				<p class="p-mrg"><span class="cnt-btm">EXPLORE</span></p>
				<p>
				Open Payments data visually - at individual and aggregate levels
				</p>
			</div>
			
			<div class="col-md-4">
				<img src="{{{ asset('assets/img/img2.png') }}}">
				<p class="p-mrg"><span class="cnt-btm">UNDERSTAND</span></p>
				<p>
				The intricacies and realize the benefits of using the Spend data
				</p>
			</div>
			
			<div class="col-md-4">
				<img src="{{{ asset('assets/img/img3.png') }}}">
				<p class="p-mrg"><span class="cnt-btm">REFINE</span></p>
				<p>
				Your priorities and business model
				</p>
			</div>
		</div>
	</div>

	</div>

		<div class="row text-sec">
		<div class="container text-center">
		
		<div class="col-md-12">
			<img src="{{{ asset('assets/img/brandchange.png') }}}" class="img-responsive">
			
		</div>
		
		</div>
	</div>
		<hr/>

	<div class="row text-sec">
		<div class="container text-center">
		
			<div class="col-md-6">
				<img src="{{{ asset('assets/img/chart1.png') }}}" class="img-responsive">
			</div>

			<div class="col-md-6">
				<img src="{{{ asset('assets/img/chart2.png') }}}" class="img-responsive">
			</div>
		
		</div>
	</div>

	<div class="row text-sec">
		<div class="container text-center">
		
		<div class="col-md-12">
			<img src="{{{ asset('assets/img/chart3.png') }}}" class="img-responsive">
		</div>
		
		</div>
	</div>	
	<div class="row text-sec">
		<div class="container text-center">
		<div class="col-md-12">
    			<form action = "{{{ URL::to('user/create') }}}">
				  <button class="btn btn-info" style="font-size: 13px !important; width: 150px;">GET STARTED</button>
				</form>
		</div>
		</div>
	</div>
@stop
