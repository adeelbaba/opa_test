@extends('site.layouts.analytics')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Competition Analytics
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Competitor Dashboard, Competitor Analytics, Competition Spending Insights, Competitor Open Payments Spending, Open Payments Analytics, Streebo Inc., cms, sunshine act, yments, payment sunshine act, the sunshine act, physician payments sunshine act, ysician sunshine act, open payments website, physicians payment sunshine act, federal sunshine act" />
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

<script>
			var c_serverUrl = "/SpotfireWeb/";
			var c_analysisPath = "/Final_Web_Dashboards/competitor";
			var c_pages = ["CompanyCompetitor"];
			var c_startPage = c_pages[0];
		   
		   
		   
			//
			// Fields
			//
			var xmlData = "";
			var customization = new spotfire.webPlayer.Customization();
			var app;
			var analysisLoaded = false;

			// Web Player Callbacks
			//
			function errorCallback(errorCode, description)
			{
					// Displays an error message if something goes wrong
					// in the Web Player.
					document.getElementById("error").innerHTML = errorCode + ": " + description;
			}
			
			function openedCallback(analysisDocument)
			{
				// Run when the Web Player has finished opening
				// the analysis.
				
				// Enable the combobox controls when the initial setup is done.
				analysisDocument.onDocumentReady(function()
				{
					if (!analysisLoaded)
					{
						analysisLoaded = true;
					}
				});
				
				analysisDocument.setActivePage(c_startPage);
			}
			 
			//
			// DOM Event Handlers
			//
			window.onload = function()
			{
			    // Initialize all visual components when the page loads.
			    window.onresize();
				
			    // Disable comboboxes until analysis is loaded.

				//
				// Create the Web Player
				//
				customization.showCustomizableHeader = false;
				customization.showClose = false;
				customization.showToolBar = false;
				customization.showExportFile = false;
				customization.showExportVisualization = false;
				customization.showUndoRedo = false;
				customization.showDodPanel = false;
				customization.showFilterPanel = false;
				customization.showPageNavigation = false;
				customization.showStatusBar = false;
			
				app = new spotfire.webPlayer.Application(c_serverUrl, customization);
				
				// Register callbacks.
				app.onError(errorCallback);
				app.onOpened(openedCallback);
				
				// Open the analysis.
				app.open(c_analysisPath, "webPlayer", "");
			}
			
			window.onresize = function()
			{
				// Resize all html elements properly.
				document.getElementById("webPlayer").style.height = (getWindowInnerHeight() - 60) + "px";
			}
		   
		</script>

    <div class="container">

	<br>
	<br>

        <!-- Project One -->
        <div class="row">
			<div id ="webPlayer" class="col-md-12 col-xs-12" style = "padding: 0px; margin-left: -150px; width: 1200px; height: 100%;"></div>   
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <hr>
        <!-- /.row -->

        <hr>

    </div>
@stop
