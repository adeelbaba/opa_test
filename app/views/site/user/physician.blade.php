@extends('site.layouts.analytics')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Physician Analytics
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Physician Dashboard, HCP Dashboard, Physician Analytics, Physician Spending Insights, HCP Open Payments Spending, Open Payments Analytics, Streebo Inc." />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Search for a physician, hcp and gain insights into the hcp spending pattern from open payments data" />
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

					
				$(document).ready(function() {
				//Set up "Bloodhound" Options 
                var my_Suggestion_class = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('keyword'),
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: "{{ URL::to('user/physician/%phyquery') }}",
                        filter: function(x) {
                            return $.map(x, function(item) {
                                return {keyword: item['name']};
                            });
                        },
                        wildcard: "%phyquery"
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
                });
            });
		
			$(document).keypress(function(e) {
			   var code = e.keyCode || e.which;
			   if(code == 13) {
				$('#go').trigger("click");
			  }
			});
		
	
			// If you run the this file on another web server than the Web Player server, 
			// you need to change this property. See Web Player JavaScript Demo setup documentation.
			//document.domain = "10.0.102.77";
			
			//
			// Constants
			//
			var c_serverUrl = "/SpotfireWeb/";
			var c_analysisPath = "/Final_Web_Dashboards/physician_filter";
			var c_pages = ["physician"];
			var c_startPage = c_pages[0];
			var c_dataTableName = "open_payment_view";
			var c_filteringSchemeName = "Physician_Filter";
			
			//
			// Fields
			//
			var xmlData = "";
			var customization = new spotfire.webPlayer.Customization();
			var app;
			var analysisLoaded = false;
			var count = 0;
			
			function setPhysician() {

				$(".alert").hide();

			    var physician;

				@if(Session::has('physician'))
				{
					if(count == 0)
						{
							physician="{{ Session::get('physician') }}";
							document.getElementById("keyword").value=physician;
							count ++;
						}
					else
						{
							physician = document.getElementById("keyword").value;
						}
				}
			    @else
				{
					physician = document.getElementById("keyword").value;
				}						
				@endif
				
				// Remove excess whitespaces.
				 while(physician.charAt(0) == (" ") ){physician = physician.substring(1);}
				  while(physician.charAt(physician.length-1) ==" " ){physician = physician.substring(0,physician.length-1);}
				 
							 
				//Update Analysis
				  		
			    var phy = new spotfire.webPlayer.FilterSettings();

			    if (!isNullOrEmpty(physician)) {
			        switch (physician) {
			            case '(All)':
			                phy.operation = spotfire.webPlayer.filteringOperation.ADDALL;
			                break;

			            case '(None)':
			                phy.operation = spotfire.webPlayer.filteringOperation.REMOVEALL;
			                break;

			            default:
			                phy.values = [physician];
							$(".table").show();
			                break;
			        }

					app.analysisDocument.marking.setMarking( "physician_pie", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
					app.analysisDocument.marking.setMarking( "physician_time", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
					
			        app.analysisDocument.filter.setFilter(
						c_filteringSchemeName,
						c_dataTableName,
						"FullName",
						phy);
			    }
				
				//Update Physician Information
					var xmlhttp; 
					var obj;					
					
					physician +="1";
					
					if (physician=="1")
					  {
						document.getElementById("PInfo").innerHTML="";
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
							document.getElementById("spec").innerHTML = obj[0].spec;
							document.getElementById("city").innerHTML = obj[0].city;
							document.getElementById("state").innerHTML = obj[0].state;
						}
					 }

					xmlhttp.open("GET","physician/"+physician,true);
					xmlhttp.send();
					
					physician = physician.substring(0,physician.length-1);
					
				
			}
				

			//
			// Web Player Callbacks
			//
			function errorCallback(errorCode, description)
			{
				$(".alert").show();
				$(".table").hide();
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
				setPhysician();
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
			
		</script>
		
		<div class="container">

        <br>
		<br>

        <div class="row">
			<div colspan="1" style="background-color: #EEEEEE; height: 30px;">
			<td class="col-md-12 col-xs-12">	
				<div id = "results" class="col-md-12 col-xs-12 results">
					<input type="search" class="typeahead custom-input-padding" placeholder="Search Physician" id="keyword" onselect="setPhysician();">
					<button class="btn btn-default btn-send" id="go" onclick="setPhysician()"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
				</div>
			</td>
			<div>
			<span class = "alert col-md-12 col-xs-12 error-login text-center" id="error" style="display:none; margin-top: 5px;"></span>
			</div>
			<td>
			<div class="col-md-12 col-xs-12" style = "padding: 0px;">
			<table class="table table-striped table-hover" style="display:none;">
			<thead>
				<tr>
					<th class="col-md-2">Name</th>                             
					<th class="col-md-2">Specialty</th>
					<th class="col-md-2">City</th>
					<th class="col-md-2">State</th>
				</tr>
			</thead>
			<tr>
			<td id="name" style ="font-weight: bold;"></td>
			<td id="spec"></td>
			<td id="city"> </td>
			<td id="state"></td>
			</tr>
			</table>
			</div>
			</td>
			<td>
            <div id ="webPlayer" class="col-md-12 col-xs-12" style = "padding: 0px;"></div>
			</td>

        </div>
        <!-- /.row -->
		</div>
 </div>
		
		
@stop
