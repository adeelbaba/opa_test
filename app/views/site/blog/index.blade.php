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
				On September 30, 2014 the Centers for Medicare & Medicaid Services (CMS) released its first batch of data on its Open Payments website. The data shows that Pharma companies made 4.4 million payments to physicians and teaching hospitals in the first five months of 2013.
				</p> 
				<p class="p-mrg">
				Streebo has stepped up to create a one-of-its kind data analytics tool to extract meaningful insight out of this publicly available spend data.
				</p>
				<p class="p-mrg">
				Open Payment Analytics (OPA) is an innovation tool which can be used with existing data sets in Sales Analytics to enhance business models by <b>refining targets</b>. Additionally, OPA, with its comprehensive dashboards, provides a new dimension to <b>competitive advantage</b>.
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
			<p class="p-mrg"><span class="cnt-btm">UNDERSTAND</span></p>
			<p>
			The availability of spend data – a rich addition to your existing data sets on sales analytics
 			</p>
		</div>
		
		<div class="col-md-4">
			<img src="{{{ asset('assets/img/img2.png') }}}">
			<p class="p-mrg"><span class="cnt-btm">EXPLORE</span></p>
			<p>
			The possibilities of data analytics – by physician, by specialty, and by competitor
 			</p>
		</div>
		
		<div class="col-md-4">
			<img src="{{{ asset('assets/img/img3.png') }}}">
			<p class="p-mrg"><span class="cnt-btm">LEAPFROG</span></p>
			<p>
			Your competition by refining your business model
 			</p>
		</div>
		
		</div>
	</div>

	</div>

		<div class="row text-sec">
		<div class="container text-center">
		
		<div class="col-md-12">
			<img src="{{{ asset('assets/img/brandchange.jpg') }}}" class="img-responsive">
			
		</div>
		
		</div>
	</div>
		<hr/>

	<div class="row text-sec">
		<div class="container text-center">
		
			<div class="col-md-6">
				<img src="{{{ asset('assets/img/chart1.jpg') }}}" class="img-responsive">
			</div>

			<div class="col-md-6">
				<img src="{{{ asset('assets/img/chart2.jpg') }}}" class="img-responsive">
			</div>
		
		</div>
	</div>

	<div class="row text-sec">
		<div class="container text-center">
		
		<div class="col-md-12">
			<img src="{{{ asset('assets/img/chart3.jpg') }}}" class="img-responsive">
		</div>
		
		</div>
	</div>	
	<div class="row text-sec">
		<div class="container text-center">
		<div class="col-md-12">
    			<form action = "{{{ URL::to('contact') }}}">
				  <button class="btn btn-success succ-color btn-margins">Connect &nbsp;<span class="glyphicon glyphicon-earphone earphone-border"></span></button>
				</form>
		</div>
		</div>
	</div>
@stop
