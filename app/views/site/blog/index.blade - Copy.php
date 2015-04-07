@extends('site.layouts.index')

{{-- Content --}}
@section('content')
<div id= "wrap" >
<div class="row header-home">
		<div class="col-md-12 col-xs-12 text-center">
		<p class="why-to"><em>Why</em></p>
		<h1 class="h1-reg">REGISTER</h1>

		</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center">
		
	
			
		<iframe frameborder="0" width="480" class="video-radius" height="270" src="//www.dailymotion.com/embed/video/x268hqr" allowfullscreen></iframe>
	
	
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12 text-center">
				<form action ="{{{ URL::to('user/create') }}}">
				     <button type="submit" class="btn btn-default btn-get-started">Request for an Account</button>
				</form>
		<p class="or-send">Unlock the potential of YOUR data with OPEN PAYMENT ANALYTICS</p>
		</div>
	</div>
</div>
	
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
		
			
				<p class="p-mrg">On September 30, 2014 the Centers for Medicare & Medicaid Services (CMS) released its first batch of data on its Open Payments website. The data shows that Pharma companies made 4.4 million payments to physicians and teaching hospitals in the first five months of 2013.
				</p> 
				<p class="p-mrg">
				Streebo has stepped up to create a one-of-its kind data analytics tool to extract meaningful insight out of this publicly available spend data.
				</p>
				<p class="p-mrg">
				Open Payments Analytics (OPA) is an innovative tool which can be used in parallel with existing data sets in Sales Analytics in order to assess and create better ROI. Additionally, OPA can help fine tune physician targeting, and also provide a new dimension to competitive advantage.</p>
		
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
			Your competition by comparing valuable insider info
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
	</div>
@stop
