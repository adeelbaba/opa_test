@extends('site.layouts.analytics')

{{-- Web site Title --}}
@section('title')
   Specialty :: OpenPayments Analytics
    @parent
@stop

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
							specialty="{{ Session::get('specialty') }}";
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
					specialty = document.getElementById("keyword").value;
				}						
				@endif
	
				while(specialty.charAt(0) == (" ") ){specialty = specialty.substring(1);}
				 while(specialty.charAt(specialty.length-1) ==" " ){specialty = specialty.substring(0,specialty.length-1);}
	
			    var spec = new spotfire.webPlayer.FilterSettings();

			    if (!isNullOrEmpty(specialty)) {
			        switch (specialty) {
			            case '(All)':
			                spec.operation = spotfire.webPlayer.filteringOperation.ADDALL;
			                break;

			            case '(None)':
			                spec.operation = spotfire.webPlayer.filteringOperation.REMOVEALL;
			                break;

			            default:
			                spec.values = [specialty];
							$(".table").show();
			                break;
			        }

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
							document.getElementById("specialty").innerHTML = obj[0].name;
						}
					 }

					xmlhttp.open("GET","specialty/"+specialty,true);
					xmlhttp.send();
					
					specialty = specialty.substring(0,specialty.length-1);
			}

      
			//
			// Web Player Callbacks
			//
			function errorCallback(errorCode, description)
			{
				$(".table").hide();
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
			
		</script>
		
		<div class="container">

        <br>
		<br>

        <div class="row">
            <!-- Blog Entries Column -->
			<div colspan="1" style="background-color: #EEEEEE; height: 30px;">
			<td class="col-md-12 col-xs-12">	
				<div id = "results" class="col-md-12 col-xs-12 results">
					<input type="search" class="typeahead custom-input-padding" placeholder="Search Specialty" id="keyword" onselect="setSpecialty();">
					<button class="btn btn-default btn-send" id="go" onclick="setSpecialty()"><span class="glyphicon glyphicon-search"></span> SEARCH</button>
				</div>
			</td>
			<td>
			<br>
			<div>
			<span class = "alert col-md-12 col-xs-12 error-login text-center" id="error" style="display:none; margin-top: 5px;"></span>
			</div>
			<td>
			<div class="col-md-12 col-xs-12">
			<table class="table table-striped table-hover" style="display:none;">
			<thead>
				<tr>
					<th class="col-md-2">Specialty</th>
				</tr>
			</thead>
			<tr>
			<td id="specialty"></td>
			</tr>
			</table>
			</div>
			</td>
            <div id ="webPlayer" class="col-md-12 col-xs-12" style = "padding: 0px;"></div>
			</td>
            <!-- Blog Sidebar Widgets Column -->

        </div>
        <!-- /.row -->
</div>
        <hr>
 </div>
		
		
		
@stop
