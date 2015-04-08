@extends('site.layouts.analytics')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Competition Analytics
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Competitor Dashboard, Competitor Analytics, Competition Spending Insights, Competitor Open Payments Spending, Open Payments Analytics, Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Search for a company and a competitor -  gain insights by comparing spending data from open payments" />
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
    <div class="container">

	<br>
	<br>

        <!-- Project One -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
				<iframe src="http://198.176.30.253/SpotfireWeb/ViewAnalysis.aspx?file=/Final_Web_Dashboards/competitor&configurationBlock=SetPage%28pageIndex%3D0%29%3B&options=7-0,8-0,9-0,10-0,11-0,12-0,13-0,14-0,1-0,2-0,3-0,4-0,5-0,6-0,15-0" width='1200' height= '700' ></iframe>                   
            </div>
            
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <hr>
        <!-- /.row -->

        <hr>

    </div>
@stop
