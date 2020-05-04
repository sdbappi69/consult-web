@extends('layout.app')

@section('content')

	<!-- Step Style -->
	<link href="{{ url('/') }}/css/step.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<div class="container">

		<form id="regForm" action="">

			<h1>Book an appointment:</h1>

			<!-- One "tab" for each step in the form: -->
			<div class="tab">Please select the date:
			  <p><input id="datepicker" placeholder="Select a date" oninput="this.className = ''"></p>
			</div>

			<div class="tab">Please select the slot:
				<input type="hidden" name="slot" value="1" oninput="this.className = ''">

				<!-- Style #3 -->
				<div class="plan-style">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs plans-tabs plans-style-tab" id="featuresTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link" href="#shared" aria-controls="shared" role="tab" data-toggle="tab">Rank 1</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#vps" aria-controls="vps" role="tab" data-toggle="tab">Rank 2</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#cloud" aria-controls="cloud" role="tab" data-toggle="tab">Rank 3</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#dedicated" aria-controls="dedicated" role="tab" data-toggle="tab">Rank 4</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content" id="featuresTabContent">
						<!-- Shared Hosting -->
						<div role="tabpanel" class="tab-pane fade show active" id="shared">
							<div class="row">
								<!-- #STARTER PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 1</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 2 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 2</h3>
										<!-- Price -->
										<span>1500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 3 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 3</h3>
										<!-- Price -->
										<span>2500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 4 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 4</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
							</div>
						</div>
						<!-- Vps Hosting -->
						<div role="tabpanel" class="tab-pane fade" id="vps">
							<div class="row">
								<!-- #STARTER PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 1</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 2 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 2</h3>
										<!-- Price -->
										<span>1500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 3 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 3</h3>
										<!-- Price -->
										<span>2500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 4 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 4</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
							</div>
						</div>
						<!-- Cloud Hosting -->
						<div role="tabpanel" class="tab-pane fade" id="cloud">
							<div class="row">
								<!-- #STARTER PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 1</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 2 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 2</h3>
										<!-- Price -->
										<span>1500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 3 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 3</h3>
										<!-- Price -->
										<span>2500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 4 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 4</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
							</div>
						</div>
						<!-- Dedicated Hosting -->
						<div role="tabpanel" class="tab-pane fade" id="dedicated">
							<div class="row">
								<!-- #STARTER PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 1</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 2 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 2</h3>
										<!-- Price -->
										<span>1500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 3 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 3</h3>
										<!-- Price -->
										<span>2500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
								<!-- #Name 4 PLAN -->
								<div class="col-lg-3 col-sm-6">
									<div class="plan-st3">
										<!-- Title -->
										<h3>Name 4</h3>
										<!-- Price -->
										<span>500 BDT / Slot</span>
										<!-- Features -->
										<ul>
											<li>
												<a>10GB Bandwidth</a>
											</li>
											<li>
												<a>1TB Storage Space</a>
											</li>
											<li>
												<a>10 Free Sub-domains</a>
											</li>
											<li>
												<a>Cpanel &amp; FTP</a>
											</li>
											<li>
												<a>99.9% Uptime</a>
											</li>
											<li>
												<a>Mysql Databases</a>
											</li>
										</ul>
										<!-- Order -->
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab">Please select the communication medium:
				<p>
					<select oninput="this.className = ''">
						<option value="">Select Medium</option>
						<option value="1">Default</option>
						<option value="2">Mobile</option>
						<option value="3">Viber</option>
					</select>
				</p>
			  <p><input type="text" placeholder="Enter Username" oninput="this.className = ''"></p>
			</div>

			<div class="tab">Appointment confirm:
			  <p>Success Message</p>
			</div>

			<div style="overflow:auto; margin-top: 25px;">
			  <div style="float:left;">
			    <button type="button" class="user-sub" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
			  </div>
			  <div style="float:right;">
			    <button type="button" class="user-sub" id="nextBtn" onclick="nextPrev(1)">Next</button>
			  </div>
			</div>

			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
			  <span class="step"></span>
			  <span class="step"></span>
			  <span class="step"></span>
			  <span class="step"></span>
			</div>

		</form>

		<div class="clearfix"></div>

		@include('home.faq')

		<!-- Partners -->
		<div class="clearfix"></div>
		
	</div>
	<!-- /Container -->

	<!-- Step -->
	<script src="{{ url('/') }}/js/step.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<script>
	  	$(function() {
	    	$("#datepicker").datepicker();
	  	});
	 </script>

@endsection