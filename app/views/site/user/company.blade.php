@extends('site.layouts.analytics')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Company Analytics
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Company Dashboard, Company Analytics, Company Spending Insights, Open Payments Analytics, OPA, CMS,  Streebo Inc., cms, sunshine act, yments, payment sunshine act, the sunshine act, physician payments sunshine act, ysician sunshine act, open payments website, physicians payment sunshine act, federal sunshine act" />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Gain valuable insights into your company's open payments data" />
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

	<script type="text/javascript">	

		var enterCounter = 0;
	
		$(document).ready(function() {
        //Set up "Bloodhound" Options 		
                var my_Suggestion_class = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('keyword'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: "{{ URL::to('user/company/%compquery') }}",
                        filter: function(x) {
                            return $.map(x, function(item) {
                                return {keyword: item['name']};
                            });
                        },
                        wildcard: "%compquery"
					}
                });
 
                // Initialize Typeahead with Parameters
                my_Suggestion_class.initialize();
                var typeahead_elem = $('.typeahead');

                typeahead_elem.typeahead({
                    hint: false,
                    highlight: true,
                    minLength: 3
                },
                {
                    // `ttAdapter` wraps the suggestion engine in an adapter that
                    // is compatible with the typeahead jQuery plugin
                    name: 'results',
                    displayKey: 'keyword',
                    source: my_Suggestion_class.ttAdapter(),
					templates: {
						  empty: 'No Results'
						}
					}).on("typeahead:selected typeahead:autocompleted", function(ev, my_Suggestion_class) {
						$("#go").prop("disabled", false);
						enterCounter = 0;
						$(document).keypress(function(e) {
							   var code = e.keyCode || e.which;
							   if(code == 13) {
								   if (enterCounter == 0){
										$('#go').trigger("click");
										enterCounter = 1;
								   }
							  }
							});
					});
			 });

			// If you run the this file on another web server than the Web Player server, 
			// you need to change this property. See Web Player JavaScript Demo setup documentation.
			//document.domain = "10.0.102.77";

			//
			// Constants
			//
			var c_serverUrl = "/SpotfireWeb/";
			var c_analysisPath = "/Final_Web_Dashboards/company_filter";
			var c_pages = ["company"];
			var c_startPage = c_pages[0];
			var c_dataTableName = "open_payment_view";
			var c_filteringSchemeName = "Company_Filter";
			var c_markingPie = "company_pie";
			
			//
			// Fields
			//
			var xmlData = "";
			var customization = new spotfire.webPlayer.Customization();
			var app;
			var analysisLoaded = false;
			var count =0;

			function setCompany() {
				$(".alert").hide();
			    // Filters to the selected region and fills the Sales Repo combobox
			    // with values corresponding to the selected region.
				
				var company;

				//Pick Company Value from Session if the page is loading for the first time;
				@if(Session::has('company'))
				{
					if(count == 0)
						{
							company = "{{ Session::get('company') }}";
							document.getElementById("keyword").value=company;
							count ++;
						}
					else
						{
							company = document.getElementById("keyword").value;
						}
				}
			    @else
				{
					if(count == 0)
						{
							company = "(All)";
							count ++;
						}
					else
						{
							company = document.getElementById("keyword").value;
						}
				}						
				@endif
				
				//Remove Excess Whitespaces Before and After Keyword
				while(company.charAt(0) == (" ") ){company = company.substring(1);}
				while(company.charAt(company.length-1) == " " ){company = company.substring(0,company.length-1);}

			    var comp = new spotfire.webPlayer.FilterSettings();
				
				if ( company == 'All')
				{
					company = '(All)';
				}
				
			    if (!isNullOrEmpty(company)) {
			        switch (company) {
			            case '(All)':
			                comp.operation = spotfire.webPlayer.filteringOperation.ADDALL;
							$(".search-record").hide();
			                break;
							
			            case '(None)':
			                comp.operation = spotfire.webPlayer.filteringOperation.REMOVEALL;
			                break;

			            default:
			                comp.values = [company];
							$(".search-record").show();
			                break;
			        }
			//marking reset
					app.analysisDocument.marking.setMarking( "company_pie", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
					app.analysisDocument.marking.setMarking( "company_physician", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
				//	app.analysisDocument.marking.setMarking( "company_teachingHospital", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
					
			        
					app.analysisDocument.filter.setFilter(
						c_filteringSchemeName,
						c_dataTableName,
						"Submitting_Applicable_Manufacturer_or_Applicable_GPO_Name",
						comp);
			    }
				
				//Update Company Information
					var xmlhttp; 
					var obj;					
					
					company +="1";
					
					if (company=="1")
					  {
						document.getElementById("name").innerHTML="";
						document.getElementById("state").innerHTML="";
						document.getElementById("country").innerHTML="";
					  return;
					  }
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					 }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							obj = JSON.parse(xmlhttp.responseText);
							document.getElementById("name").innerHTML = obj[0].name;
							document.getElementById("state").innerHTML = obj[0].state;
							document.getElementById("country").innerHTML = obj[0].country;
						}
					 }

					xmlhttp.open("GET","company/"+company,true);
					xmlhttp.send();
					
					company = company.substring(0,company.length-1);
					
					$("#go").prop("disabled", true);
					enterCounter = 1;
			}

			//
			// Web Player Callbacks
			//
			function errorCallback(errorCode, description)
			{
					$(".search-record").hide();
					$(".alert").show();
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
					    document.getElementById("keyword").disabled = false;
						analysisLoaded = true;
					}
				});
				
				analysisDocument.setActivePage(c_startPage);
				setCompany();
			}
			 
			//
			// DOM Event Handlers
			//
			window.onload = function()
			{
			    // Initialize all visual components when the page loads.
			    window.onresize();
				
			    // Disable comboboxes until analysis is loaded.
			    document.getElementById("keyword").disabled = true;

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
			
			function help() {
				$('#myModal').modal();
			}
			
		</script>
	
		<div class="modal fade" id="myModal" style="display: none;height: 100%;margin: auto;">
		  <div class="modal-dialog" style="width: 650px; margin: auto;">
			<div class="modal-content">
			  <div class="modal-header" style="background-color: #55ccff;border-top-left-radius:5px;border-top-right-radius:5px;">
				<button style="background-color: white;opacity:1;color: #55ccff;border-radius:50px;width:20px;height:20px;" type="button" class="btn btn-default close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="position: absolute; margin-top: -12px; margin-left: -6px;">&times;</span></button>
				<h4 class="modal-title" style="color: white">Help?</h4>
			  </div>
			  <div class="modal-body">
					<p><b>Filter and Search</b></p><br>
					<ol>
						<li>	Type in your search query in the text / search box</li>
						<li>	A list of Company Names matching your query would appear</li>
						<li>	Select your desired company from the list</li>
						<li>	Press Enter or click on the Search button</li>
					</ol>
					<div class="text-center">
						<img src="{{asset('assets/img/searchcomp.png')}}">
					</div><br>
					<p><b>Trivia</b></p><br>
					<p>Company Dashboards use Identified General & Research payments data as published on December 19, 2014.</p><br>
					<p><b>Did you know</b> that you can click on any pie on the Physician Spend and the rest of the visualizations will update accordingly.</p><br>
					<p><b>Did you know</b> that you could also filter the number of top physicians shown.</p>
				</div>
			</div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

<div class="sub-header">
			<div class="container">
				<div class="row">
				
					<div class="col-md-12 heading">
						<p><b>SPEND ANALYTICS &gt; </b><span class="cnt-btm" style="font-size: 14px;"> COMPANY ANALYSIS</span></p>
					</div>
				</div>
			</div>
</div>	

	
<div class="container">
		
	<br>
			<div class="iner-sub-header" style="border-bottom: 1px solid #ccc;">
				<div class="row" style = "background-color: white;">
					<div class="col-md-12 heading">
						<div id = "results" class="col-md-12 col-xs-12 results">
							<span class="glyphicon glyphicon-search span-search" aria-hidden="true"></span>
							<input type="search" class="typeahead custom-input-padding" placeholder="Search Company" id="keyword" onselect="setCompany();">
							<button class="btn go-btn" id="go" onclick="setCompany()"  disabled="true">SEARCH</button>
							<button class="btn go-btn" id="help" type="button" onclick="help()">HELP?</button>
						</div>
					</div>
				</div>
			</div>

			<div>
				<span class = "alert col-md-12 col-xs-12 error-login text-center" id="error" style="display:none; margin-top: 5px;"></span>
			</div>
			
		<div class="search-record" style="display: none;">
					<div class="row" style = "background-color: white;">
						<div class="col-md-4" style="border-right: 1px solid #bfbfbf; text-align:center; padding: 10px; margin-botton 10px;">
						<div style="font-weight:bold;"><span class="glyphicon glyphicon-user"></span> NAME</div>
						<div id = "name" style="color:#737373;"></div>
					</div>
					<div class="col-md-4" style="text-align:center; padding: 10px; margin-botton 10px;">
						<div style="font-weight:bold;"><span class="glyphicon glyphicon-map-marker"></span> STATE</div>
						<div id="state" style="color:#737373;"></div>
					</div>
					<div class="col-md-4" style="text-align:center; padding: 10px; margin-botton 10px; border-left: 1px solid #bfbfbf; ">
						<div style="font-weight:bold;"><span class="glyphicon glyphicon-flag"></span> COUNTRY</div>
						<div id="country" style="color:#737373;"></div>
					</div>
					</div>
		</div>
		
		<div id ="webPlayer" class="col-md-12 col-xs-12" style = "padding: 0px;"></div>
		
		<hr>
		<div class="col-md-6" style = "padding: 0px;">
			<div class="row">
			    <form class = "form-margin" method="POST" action="{{{ URL::to('user/company') }}}" accept-charset="UTF-8">
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
			    </form>
		    </div>
		</div>
		
        <!-- /.row -->
</div>
@include('feedback')
@stop
