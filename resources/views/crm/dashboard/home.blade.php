@extends('crm.dashboard.layout.dashInclude')
@section('crmDashboardTitle')
    Dashboard
@endsection
@section('crmDashboard')
				<!-- Start page-Content here -->
				<div class="left-content">
					<div class="page-content h-100" id="scroll-block" data-simplebar data-simplebar-auto-hide="false">
						<div class="tab-content" id="tab-content-dasktop">
							<div class="tab-pane active" id="overview" role="tabpanel">

								<div class="row" id="tax-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="bg-primary bg-soft">
												<div class="row">
													<div class="col-7">
														<div class="text-primary p-3">
															<h5 class="text-primary">Welcome Back !</h5>
															<p>Skote Dashboard</p>
														</div>
													</div>
													<div class="col-5 align-self-end">
														<img src="{{ asset('/assets/crm/dashboard/') }}/images/profile-img.png" alt="" class="img-fluid">
													</div>
												</div>
											</div>
											<div class="card-body pt-0">
												<div class="row">
													<div class="col-sm-4">
														<div class="avatar-md profile-user-wid mb-4">
															<img src="{{ asset('/assets/crm/dashboard/') }}/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
														</div>
														<h5 class="font-size-15 text-truncate">Henry Price</h5>
														<p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
													</div>

													<div class="col-sm-8">
														<div class="pt-4">

															<div class="row">
																<div class="col-6">
																	<h5 class="font-size-15">125</h5>
																	<p class="text-muted mb-0">Projects</p>
																</div>
																<div class="col-6">
																	<h5 class="font-size-15">$1245</h5>
																	<p class="text-muted mb-0">Revenue</p>
																</div>
															</div>
															<div class="mt-4">
																<a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->

								<div class="row chart-large" id="invoices-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">											
												<h4 class="card-title mb-4">Invoices</h4>			
												<div id="column-charts" dir="ltr"></div>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->

								<div class="row" id="payments-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title mb-4">Monthly Earning</h4>
												<div class="row">
													<div class="col-sm-6">
														<p class="text-muted">This month</p>
														<h3>$34,252</h3>
														<p class="text-muted"><span class="text-success me-2"> 12% <i class="mdi mdi-arrow-up"></i> </span> From previous period</p>

														<div class="mt-4">
															<a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="mt-4 mt-sm-0">
															<div id="radialBar-chart" class="apex-charts"></div>
														</div>
													</div>
												</div>
												<p class="text-muted mb-0">We craft digital, graphic and dimensional thinking.</p>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->

								<div class="row" id="quotes-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title mb-5">Activity</h4>
												<ul class="verti-timeline list-unstyled">
													<li class="event-list">
														<div class="event-timeline-dot">
															<i class="bx bx-right-arrow-circle font-size-18"></i>
														</div>
														<div class="d-flex">
															<div class="flex-shrink-0 me-3">
																<h5 class="font-size-14">22 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
															</div>
															<div class="flex-grow-1">
																<div>
																	Responded to need ???Volunteer Activities
																</div>
															</div>
														</div>
													</li>
													<li class="event-list">
														<div class="event-timeline-dot">
															<i class="bx bx-right-arrow-circle font-size-18"></i>
														</div>
														<div class="d-flex">
															<div class="flex-shrink-0 me-3">
																<h5 class="font-size-14">17 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
															</div>
															<div class="flex-grow-1">
																<div>
																	Everyone realizes why a new common language would be desirable... <a href="javascript: void(0);">Read more</a>
																</div>
															</div>
														</div>
													</li>
													<li class="event-list active">
														<div class="event-timeline-dot">
															<i class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"></i>
														</div>
														<div class="d-flex">
															<div class="flex-shrink-0 me-3">
																<h5 class="font-size-14">15 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
															</div>
															<div class="flex-grow-1">
																<div>
																	Joined the group ???Boardsmanship Forum???
																</div>
															</div>
														</div>
													</li>
													<li class="event-list">
														<div class="event-timeline-dot">
															<i class="bx bx-right-arrow-circle font-size-18"></i>
														</div>
														<div class="d-flex">
															<div class="flex-shrink-0 me-3">
																<h5 class="font-size-14">12 Nov <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
															</div>
															<div class="flex-grow-1">
																<div>
																	Responded to need ???In-Kind Opportunity???
																</div>
															</div>
														</div>
													</li>
												</ul>
												<div class="text-center mt-4"><a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->							

								<div class="row" id="tasks-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title mb-4">Top Cities Selling Product</h4>

												<div class="text-center">
													<div class="mb-4">
														<i class="bx bx-map-pin text-primary display-4"></i>
													</div>
													<h3>1,456</h3>
													<p>San Francisco</p>
												</div>

												<div class="table-responsive mt-4">
													<table class="table align-middle table-nowrap">
														<tbody>
															<tr>
																<td style="width: 30%">
																	<p class="mb-0">San Francisco</p>
																</td>
																<td style="width: 25%">
																	<h5 class="mb-0">1,456</h5></td>
																<td>
																	<div class="progress bg-transparent progress-sm">
																		<div class="progress-bar bg-primary rounded" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<p class="mb-0">Los Angeles</p>
																</td>
																<td>
																	<h5 class="mb-0">1,123</h5>
																</td>
																<td>
																	<div class="progress bg-transparent progress-sm">
																		<div class="progress-bar bg-success rounded" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
															</tr>
															<tr>
																<td>
																	<p class="mb-0">San Diego</p>
																</td>
																<td>
																	<h5 class="mb-0">1,026</h5>
																</td>
																<td>
																	<div class="progress bg-transparent progress-sm">
																		<div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->

								<div class="row" id="expenses-block">
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h4 class="card-title mb-4">Latest Transaction</h4>
												<div class="table-responsive">
													<table class="table align-middle table-nowrap mb-0">
														<thead class="table-light">
															<tr>
																<th style="width: 20px;">
																	<div class="form-check font-size-16 align-middle">
																		<input class="form-check-input" type="checkbox" id="transactionCheck01">
																		<label class="form-check-label" for="transactionCheck01"></label>
																	</div>
																</th>
																<th class="align-middle">Order ID</th>
																<th class="align-middle">Billing Name</th>
																<th class="align-middle">Date</th>
																<th class="align-middle">Total</th>
																<th class="align-middle">Payment Status</th>
																<th class="align-middle">Payment Method</th>
																<th class="align-middle">View Details</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck02">
																		<label class="form-check-label" for="transactionCheck02"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
																<td>Neal Matthews</td>
																<td>
																	07 Oct, 2019
																</td>
																<td>
																	$400
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
																</td>
																<td>
																	<i class="fab fa-cc-mastercard me-1"></i> Mastercard
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>

															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck03">
																		<label class="form-check-label" for="transactionCheck03"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2541</a> </td>
																<td>Jamal Burnett</td>
																<td>
																	07 Oct, 2019
																</td>
																<td>
																	$380
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-danger font-size-11">Chargeback</span>
																</td>
																<td>
																	<i class="fab fa-cc-visa me-1"></i> Visa
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>

															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck04">
																		<label class="form-check-label" for="transactionCheck04"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2542</a> </td>
																<td>Juan Mitchell</td>
																<td>
																	06 Oct, 2019
																</td>
																<td>
																	$384
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
																</td>
																<td>
																	<i class="fab fa-cc-paypal me-1"></i> Paypal
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck05">
																		<label class="form-check-label" for="transactionCheck05"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2543</a> </td>
																<td>Barry Dick</td>
																<td>
																	05 Oct, 2019
																</td>
																<td>
																	$412
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
																</td>
																<td>
																	<i class="fab fa-cc-mastercard me-1"></i> Mastercard
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck06">
																		<label class="form-check-label" for="transactionCheck06"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2544</a> </td>
																<td>Ronald Taylor</td>
																<td>
																	04 Oct, 2019
																</td>
																<td>
																	$404
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-warning font-size-11">Refund</span>
																</td>
																<td>
																	<i class="fab fa-cc-visa me-1"></i> Visa
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>
															<tr>
																<td>
																	<div class="form-check font-size-16">
																		<input class="form-check-input" type="checkbox" id="transactionCheck07">
																		<label class="form-check-label" for="transactionCheck07"></label>
																	</div>
																</td>
																<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2545</a> </td>
																<td>Jacob Hunter</td>
																<td>
																	04 Oct, 2019
																</td>
																<td>
																	$392
																</td>
																<td>
																	<span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
																</td>
																<td>
																	<i class="fab fa-cc-paypal me-1"></i> Paypal
																</td>
																<td>
																	<!-- Button trigger modal -->
																	<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
																		View Details
																	</button>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
												<!-- end table-responsive -->
											</div>
										</div>
									</div>
								</div>
								<!-- end row -->
								
							</div>
						</div>
					</div>
				</div>
				<!-- End Page-content -->					

				<!-- Start right Content here -->
				<div class="right-content">					
	
					<!-- Nav tabs -->
					<div class="scroll-nav">
						<ul class="nav menu nav-pills nav-justified" role="tablist" id="top-menu">
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link active" data-bs-toggle="tab" href="#tax" role="tab" title="Tax">
									<span class="">Tax</span> 
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link" data-bs-toggle="tab" href="#invoices" role="tab" title="Invoices">
									<span class="">Invoices</span> 
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link" data-bs-toggle="tab" href="#payments" role="tab" title="Payments">
									<span class="">Payments</span>   
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link" data-bs-toggle="tab" href="#quotes" role="tab" title="Quotes">
									<span class="">Quotes</span>    
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab" title="Tasks">
									<span class="">Tasks</span> 
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link" data-bs-toggle="tab" href="#expenses" role="tab" title="Expenses">
									<span class="">Expenses</span>   
								</a>
							</li>
							<li class="nav-item sm-hidden right-icon">
								<a class="nav-link" href="#">
									<span class="d-block"><img src="{{ asset('/assets/crm/dashboard/') }}/images/edit.png" height="22"></span>   
								</a>
							</li>
						</ul>
					</div>

					<div class="page-content h-100" data-simplebar data-simplebar-auto-hide="false">

						<!-- Tab panes -->
						<div class="tab-content" id="tab-content">
							
							<div class="tab-pane" id="tax" role="tabpanel">
								<h5 class="bordered-title">Btw-aangife</h5>	
								<p class="mb-3">
									Raw denim you probably haven't heard of them jean shorts Austin.
									Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
									cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
									butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
									qui irure terry richardson ex squid. Aliquip placeat salvia cillum
									iphone. Seitan aliquip quis cardigan american apparel, butcher
									voluptate nisi qui.
								</p>							
								<h5 class="bordered-title">Winst-en-verlieserkening 2021</h5>
								<p class="mb-3">
									Raw denim you probably haven't heard of them jean shorts Austin.
									Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
									cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
									butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
									qui irure terry richardson ex squid. Aliquip placeat salvia cillum
									iphone. Seitan aliquip quis cardigan american apparel, butcher
									voluptate nisi qui.
								</p>	
								<div class="table-responsive">
									<table class="table align-middle table-nowrap mb-0">
										<thead class="table-light">
											<tr>
												<th class="align-middle" colspan="5">Past Due Invoices (2)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<div class="form-check font-size-16">
														<input class="form-check-input" type="checkbox" id="transactionCheck02">
														<label class="form-check-label" for="transactionCheck02"></label>
													</div>
												</td>
												<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
												<td>Neal Matthews<small class="text-mute d-block">07 Oct, 2019</small></td>
												<td>$3,400.00</td>
												<td>
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
														Past Due
													</button>
												</td>
											</tr>
											<tr>
												<td>
													<div class="form-check font-size-16">
														<input class="form-check-input" type="checkbox" id="transactionCheck02">
														<label class="form-check-label" for="transactionCheck02"></label>
													</div>
												</td>
												<td><a href="javascript: void(0);" class="text-body fw-bold">#SK2540</a> </td>
												<td>Neal Matthews<small class="text-mute d-block">07 Oct, 2019</small></td>
												<td>$3,400.00</td>
												<td>
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-secondary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
														Reversed
													</button>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="invoices" role="tabpanel">
								<img src="{{ asset('/assets/crm/dashboard/') }}/images/product/img-1.png" class="img-fluid">
								<p class="mb-0">
									Food truck fixie locavore, accusamus mcsweeney's marfa nulla
									single-origin coffee squid. Exercitation +1 labore velit, blog
									sartorial PBR leggings next level wes anderson artisan four loko
									farm-to-table craft beer twee. Qui photo booth letterpress,
									commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
									vinyl cillum PBR. Homo nostrud organic, assumenda labore
									aesthetic magna 8-bit.
								</p>
							</div>
							<div class="tab-pane" id="payments" role="tabpanel">
								<p class="mb-0">
									Etsy mixtape wayfarers, ethical wes anderson tofu before they
									sold out mcsweeney's organic lomo retro fanny pack lo-fi
									farm-to-table readymade. Messenger bag gentrify pitchfork
									tattooed craft beer, iphone skateboard locavore carles etsy
									salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
									Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
									mi whatever gluten-free.
								</p>
							</div>
							<div class="tab-pane" id="quotes" role="tabpanel">
								<p class="mb-0">
									Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
									art party before they sold out master cleanse gluten-free squid
									scenester freegan cosby sweater. Fanny pack portland seitan DIY,
									art party locavore wolf cliche high life echo park Austin. Cred
									vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
									farm-to-table.
								</p>
							</div>
							<div class="tab-pane" id="tasks" role="tabpanel">
								<p class="mb-0">
									Etsy mixtape wayfarers, ethical wes anderson tofu before they
									sold out mcsweeney's organic lomo retro fanny pack lo-fi
									farm-to-table readymade. Messenger bag gentrify pitchfork
									tattooed craft beer, iphone skateboard locavore carles etsy
									salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
									Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
									mi whatever gluten-free.
								</p>
							</div>
							<div class="tab-pane" id="expenses" role="tabpanel">
								<p class="mb-0">
									Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
									art party before they sold out master cleanse gluten-free squid
									scenester freegan cosby sweater. Fanny pack portland seitan DIY,
									art party locavore wolf cliche high life echo park Austin. Cred
									vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
									farm-to-table.
								</p>
							</div>
						</div>

					</div> <!-- end slimscroll-menu-->
				</div>
				<!-- end right content-->

				<!-- Modal -->
				<div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
								<p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

								<div class="table-responsive">
									<table class="table align-middle table-nowrap">
										<thead>
											<tr>
												<th scope="col">Product</th>
												<th scope="col">Product Name</th>
												<th scope="col">Price</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">
													<div>
														<img src="{{ asset('/assets/crm/dashboard/') }}/images/product/img-7.png" alt="" class="avatar-sm">
													</div>
												</th>
												<td>
													<div>
														<h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
														<p class="text-muted mb-0">$ 225 x 1</p>
													</div>
												</td>
												<td>$ 255</td>
											</tr>
											<tr>
												<th scope="row">
													<div>
														<img src="{{ asset('/assets/crm/dashboard/') }}/images/product/img-4.png" alt="" class="avatar-sm">
													</div>
												</th>
												<td>
													<div>
														<h5 class="text-truncate font-size-14">Phone patterned cases</h5>
														<p class="text-muted mb-0">$ 145 x 1</p>
													</div>
												</td>
												<td>$ 145</td>
											</tr>
											<tr>
												<td colspan="2">
													<h6 class="m-0 text-right">Sub Total:</h6>
												</td>
												<td>
													$ 400
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<h6 class="m-0 text-right">Shipping:</h6>
												</td>
												<td>
													Free
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<h6 class="m-0 text-right">Total:</h6>
												</td>
												<td>
													$ 400
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- end modal -->
				
				<footer class="footer">
					<div class="container-fluid">
						<div class="row">
                            <div class="col-sm-6">
                                Copywrite ?? <script>document.write(new Date().getFullYear())</script> Invoice Ninja.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    <img src="{{ asset('/assets/crm/dashboard/') }}/images/footlg.png" alt="" height="15">
                                </div>
                            </div>
						</div>
					</div>
				</footer>				

				<!-- Loader -->
				<div id="preloader">
					<div id="status">
						<div class="spinner-chase">
							<div class="chase-dot"></div>
							<div class="chase-dot"></div>
							<div class="chase-dot"></div>
							<div class="chase-dot"></div>
							<div class="chase-dot"></div>
							<div class="chase-dot"></div>
						</div>
					</div>
				</div>

@endsection