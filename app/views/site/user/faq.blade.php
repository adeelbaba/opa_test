@extends('site.layouts.default')

{{-- Web site Title --}}
		@section('title')
		 OpenPaymentsAnalytics - Frequently Asked Questions
		@stop
		@section('meta_keywords')
		<meta name="keywords" content="Frequently Asked Questions, FAQ, FAQs, Frequently Asked Questions at Open Payments Analytics, Open Payments Analytics, OPA, CMS,  Streebo Inc., cms, sunshine act, yments, payment sunshine act, the sunshine act, physician payments sunshine act, ysician sunshine act, open payments website, physicians payment sunshine act, federal sunshine act" />
		@show
		@section('meta_author')
		<meta name="author" content="Streebo" />
		@show
		@section('meta_description')
		<meta name="description" content="FAQ, Frequently Asked Questions at open payments analytics" />
        @show

{{-- Content --}}
@section('content')

<div class="row sub-header">
		<div class="container">
			<div class="col-md-12 heading">
				<p>
					<span class="cnt-btm">FREQUENTLY ASKED QUESTIONS</span>
				</p>
			</div>
		</div>
</div>
	
	<section class="container">
			<div class="row about-margin">
			
			<div class="col-md-12">
				<div class="form-margin">
					
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; Can you tell me more about CMS Open Payments data?</p>
									<p class="txt-justify" style="margin-top: 10px;">Good question. The Centers of Medicare and Medicaid Services (CMS), has published financial interaction data between pharmaceuticals, physicians & teaching hospitals. This data, collectively, is called Open Payments data. The data published so far, is only for the duration of August 2013 to December 2013.</p>
								<br> 
						<div class="line-break"></div>

						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; I know all about the published data, but which version of the data is used on OPA?</p>
									<p class="txt-justify" style="margin-top: 10px;">You’re already a pro! The data released so far comprises of payments made during the period of August to December 2013. There has been, however, two batch releases of this data, the first batch was released on September 30, 2014 and the second was released on December 19, 2014. OPA is using the latest data from December 19, 2014 release.</p>
								<br> 
						<div class="line-break"></div>

						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; Is unidentified data also used in the analysis?</p>
									<p class="txt-justify" style="margin-top: 10px;">We want to make sure you get the clearest analysis possible, which is why OPA uses only the identified dataset.</p>
								<br> 
						<div class="line-break"></div>

						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; How many categories of data have been made public?</p>
									<p class="txt-justify" style="margin-top: 10px;">Payments are broadly categorized into three areas, Research payments, General payments and Ownership payments.  
									</p>
									<p class="txt-justify" style="margin-top: 10px;">
									As the name implies Research payments comprise of research grants, General Payments include spending on Food & Beverage, Consulting, Travel etc. and the Ownership data points to stakes owned by physicians.
									</p>
								<br> 
						<div class="line-break"></div>

						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; Which categories are used on OPA?</p>
									<p class="txt-justify" style="margin-top: 10px;">To keep it relevant to the Pharma sales and marketing folks, we are using Research Payments and General Payments in our dashboards.</p>
								<br> 
						<div class="line-break"></div>

						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; Okay so how do I use OPA?</p>
									<p class="txt-justify" style="margin-top: 10px;">Easy. You request an account, because we’re fancy like that. No, really, at this point, we are only accepting requests from individuals who belong to a Pharma company so we ask you to use your corporate email while registering.  Next, the nice guys who run OPA will review and approve your request. As soon as your request is approved, you can login to your OPA account and start exploring the OPA dashboards that are, at this point, Company, Physician, Specialty, and Competitor Information pages. See, super simple!</p>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; I am on the Company page, what should I do?</p>
									<p class="txt-justify" style="margin-top: 10px;">If you are accessing the company page for the first time, the dashboard will show results for a default company.</p>
									<p class="txt-justify" style="margin-top: 10px;">You can search for a specific Company by typing in a Name. The search results will populate in the dropdown, select and then press Enter. The dashboard below will update with the values for the searched company.</p>

									<p class="txt-justify" style="margin-top: 10px;">The dashboard shows the following visualizations for the company.</p>
									<ul>
									<li>Spending by Specialty</li>
									<li>Top Physicians by Spend</li>
									<li>Spend by Month &</li>
									<li>Spend by Type</li>
									</ul>
									<p class="txt-justify" style="margin-top: 10px;">Note that you can drill down a specific area by selecting the appropriate section on the viz. For instance, the selected company spends in three specialties – you can drill down the results by selecting a specific specialty.</p>

									<p class="txt-justify" style="margin-top: 10px;">The results are based on Research and General payments data.</p>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; I am on the Physician page, what should I do?</p>
									<p class="txt-justify" style="margin-top: 10px;">The very first access to this page will give you a combined result of spending on all the physicians.</p>

									<p class="txt-justify" style="margin-top: 10px;">You can search for a specific physician by typing in his / her name (first name, middle name, last name).  The dashboard will update to show Research and General payments data for the selected physician.</p>

									<p class="txt-justify" style="margin-top: 10px;">The dashboard contains:</p>
									<ul>
									<li>Physician Information (Name, City, State, Specialty)</li>
									<li>Spending Summary</li>
									<li>Spend by Companies</li>
									<li>Spend by Month</li>
									<li>Spend by Type</li>
									</ul>
									<p class="txt-justify" style="margin-top: 10px;">You can select a specific company or the month or type to see the updated results on the visualization.</p>

									<p class="txt-justify" style="margin-top: 10px;">The results are based on Research and General payments data.</p>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; I am on the Specialty page, what should I do?</p>
									<p class="txt-justify" style="margin-top: 10px;">The very first time you access this page, you will see a combined result of spending on all specialties. Open Payments has defined physician specialties at multiple levels of hierarchy. This page shows only the second level of specialties in the hierarchy. Want more specific information regarding specialties? No problem, we’ve got you covered. Just drop us a line via the contact form and we’ll help you out in no time.</p>

									<p class="txt-justify" style="margin-top: 10px;">Also, you can search for a specific specialty by typing in the specialty name in the search field and pressing Enter or clicking the Search button.  The dashboard will update to show Research and General payments data for the selected specialty.</p>

									<p class="txt-justify" style="margin-top: 10px;">The dashboard contains:</p>
									<ul>
									<li>Top Companies with their spending on the selected specialty.</li>
									<li>Top Physicians with their spending on the selected specialty.</li>
									<li>Spend by Month</li>
									<li>Spend by Type</li>
									</ul>
									<p class="txt-justify" style="margin-top: 10px;">You can select a specific company to drill down the dashboard on this page.</p>

									<p class="txt-justify" style="margin-top: 10px;">The results are based on Research and General payments data.</p>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; I am on the Competitor Info page, what should I do?</p>
									<p class="txt-justify" style="margin-top: 10px;">This page is slightly different than the rest of the pages. Here’s what you need to do:</p>
									<ol>
									<li>Type in the desired company name in the space provided. The dropdown besides the search field will update after the search. Select the company from the dropdown menu.</li>
									<li>Repeat the process to select another company as the competitor.</li>
									</ol>
									<p class="txt-justify" style="margin-top: 10px;">Once you have completed the above steps, the dashboard will update providing you a comparison between the selected companies in the following areas:</p>
									<ul>
									<li>Spend by Specialty</li>
									<li>Spend by Month</li>
									<li>Spend by Type</li>
									<li>Top Physicians</li>
									</ul>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; My account got rejected. Why is that?</p>
									<p class="txt-justify" style="margin-top: 10px;">Unfortunately, at this time we are only accepting requests from individuals working directly for a pharmaceutical company. Please try registering with your corporate email. If you’re still interested in speaking to us about OPA, drop us a line and we’d love to chat!</p>
								<br> 
						<div class="line-break"></div>
						
						<p class="faqs-text">
									<span class="head-search">Q</span> 
									&nbsp; OPA sounds really exciting. How can I find out more?</p>
									<p class="txt-justify" style="margin-top: 10px;">We would absolutely love to hear from you! Feedback, opinion, comments, questions, we’re looking forward to it all. Just use the contact form provided and we promise to get back to you within 24 hours.  <a href="{{{ URL::to('contact') }}}" style="color: #000 !important;">here.</a></p>
								<br> 
						<div class="line-break"></div>

					</div>
			</div>
		</div>

		</div>
	</section>
@stop
