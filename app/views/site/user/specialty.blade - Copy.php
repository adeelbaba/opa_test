@extends('site.layouts.analytics')

{{-- Web site Title --}}
		@section('title')
		OpenPaymentsAnalytics - Specialty Analytics
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Specialty Dashboard, Specialty Analytics, Specialty Spending Insights, Specialty Open Payments Spending, Open Payments Analytics, Streebo Inc., cms, sunshine act, yments, payment sunshine act, the sunshine act, physician payments sunshine act, ysician sunshine act, open payments website, physicians payment sunshine act, federal sunshine act" />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="Search for a specialty and gain insights into open payments spending on a specialty" />
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
                        url: "{{ URL::to('user/specialty/%specquery') }}",
                        filter: function(x) {
                            return $.map(x, function(item) {
                                return {keyword: item['name']};
                            });
                        },
                        wildcard: "%specquery"
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
			var c_analysisPath = "/Final_Web_Dashboards/specialty_filter";
			var c_pages = ["specialty"];
			var c_startPage = c_pages[0];
			var c_dataTableName = "open_payment_view";
			var c_filteringSchemeName = "Specialty_Filter";
			
			//
			// Fields
			//
			var xmlData = "";
			var customization = new spotfire.webPlayer.Customization();
			var app;
			var analysisLoaded = false;
			var count=0;

			function setSpecialty() {
			    // Filters to the selected region and fills the Sales Repo combobox
			    // with values corresponding to the selected region.
				$(".alert").hide();

			    var specialty;
				
				@if(Session::has('specialty'))
				{
					if(count == 0)
						{
							specialty = "{{ Session::get('specialty') }}";
							document.getElementById("keyword").value=specialty;
							count ++;
						}
					else
						{
							specialty = document.getElementById("keyword").value;
						}
				}
			    @else
				{
					if(count == 0)
						{
							specialty = "(All)";
							count ++;
						}
					else
						{
							specialty = document.getElementById("keyword").value;
						}
				}						
				@endif
	
				while(specialty.charAt(0) == (" ") ){specialty = specialty.substring(1);}
				 while(specialty.charAt(specialty.length-1) ==" " ){specialty = specialty.substring(0,specialty.length-1);}
	
			    var spec = new spotfire.webPlayer.FilterSettings();
				
				if ( specialty == 'All')
				{
					specialty = '(All)';
				}
				
			    if (!isNullOrEmpty(specialty)) {
			        switch (specialty) {
			            case '(All)':
			                spec.operation = spotfire.webPlayer.filteringOperation.ADDALL;
							$(".search-record").hide();
			                break;

			            case '(None)':
			                spec.operation = spotfire.webPlayer.filteringOperation.REMOVEALL;
			                break;

			            default:
			                spec.values = [specialty];
							$(".search-record").show();
			                break;
			        }

					app.analysisDocument.marking.setMarking( "specialty_company", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
					app.analysisDocument.marking.setMarking( "specialty_time", c_dataTableName, "1", spotfire.webPlayer.markingOperation.CLEAR);
			
					
			        app.analysisDocument.filter.setFilter(
						c_filteringSchemeName,
						c_dataTableName,
						"Physician_Specialty_Level2",
						spec);
			    }
				
				//Update Speciality Information
					var xmlhttp; 
					var obj;					
					
					specialty +="1";
					
					if (specialty=="1")
					  {
						document.getElementById("specialty").innerHTML="";
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
							document.getElementById("specialty").innerHTML = obj[0].name;
						}
					 }

					xmlhttp.open("GET","specialty/"+specialty,true);
					xmlhttp.send();
					
					specialty = specialty.substring(0,specialty.length-1);
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
				//alert(errorCode + ": " + description);
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
				setSpecialty();
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
				<h4 class="modal-title" style="color: white">Howdy!</h4>
			  </div>
			  <div class="modal-body">
				<p><b>Filter and Search</b></p><br>
					<ol>
						<li>	Type in your search query in the text / search box</li>
						<li>	A list of Specialties matching your query would appear</li>
						<li>	Select the desired Specialty from the list</li>
						<li>	Press Enter or click on the Search button</li>
					</ol>
					<div class="text-center">
						<img src="{{asset('assets/img/searchspec.png')}}">
					</div><br>
					<p><b>Trivia</b></p><br>
					<p>Specialty Dashboard use Identified General & Research payments data as published on December 19, 2014.</p><br>
					<p><b>Did you know</b> that you could also filter according to Month or Year.</p><br>
					<p><b>Did you know</b> that you could also filter the number of top physicians or top companies shown.</p>
			  </div>
			</div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	
<div class="sub-header">
			<div class="container">
				<div class="row">
				
					<div class="col-md-12 heading">
						<p><b>SPEND ANALYTICS &gt; </b><span class="cnt-btm" style="font-size: 14px;"> SPECIALTY ANALYSIS</span></p>
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
							<input type="search" class="typeahead custom-input-padding" placeholder="Search Specialty" id="keyword" onselect="setSpecialty();">
							<button class="btn go-btn" id="go" onclick="setSpecialty()" disabled="true">SEARCH</button>
							<button class="btn go-btn" data-toggle="chardinjs" data-intro="This button toggles the overlay, you can click it, even when the overlay is visible" data-position="left" id="help" type="button">HELP?</button>

						</div>
					</div>
				</div>
		</div>
			
		<div>
			<span class = "alert col-md-12 col-xs-12 error-login text-center" id="error" style="display:none; margin-top: 5px;"></span>
		</div>
			
			<div class="search-record" style="display: none;">
					<div class="row" style = "background-color: white;">
						<div class="col-md-4" style="padding: 10px; margin-botton 10px; margin-left: 20px;">
							<div style="font-weight:bold;"><span><img src="{{{ asset('assets/img/searchspecialtyb.png') }}}"> </span> Specialty</div>
							<div id = "specialty" style="color:#737373;"></div>
						</div>
					</div>
			</div>
		
		
		<div id ="webPlayer" class="col-md-12 col-xs-12" style = "padding: 0px;"></div>
            <!-- Blog Sidebar Widgets Column -->

        </div>
        <!-- /.row -->	
@include('feedback') 
@stop
