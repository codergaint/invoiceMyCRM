<!doctype html>
<html lang="en">
    <head>
        @php
            if(!empty($user)):
                $verified = $user->email_verified_at;
            else:
                $verified = NULL;
            endif;
            if(!empty($details)):
                $companyName    = $details->companyName;
                $address        = $details->address;
                $phone          = $details->phone;
                $email          = $details->email;
                $lightlogo      = url('/').'/public/assets/images/logo/'.$details->frontLogo;
                $logo           = url('/').'/public/assets/images/logo/'.$details->randLogo;
                $favicon        = url('/').'/public/assets/images/logo/'.$details->favicon;
            else:
                $companyName    = "invoiceMyCRM";
                $address        = "";
                $phone          = "";
                $email          = "";
                $logo           = "{{ asset('/') }}assets/img/logo.png";
                $lightlogo      = "{{ asset('/') }}assets/img/logo-light.png";
                $favicon        = "{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc";
            endif;
        @endphp
        <meta charset="utf-8" />
        <title>{{ $companyName }} || @yield('crmDashboardTitle')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/assets/crm/dashboard/') }}/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('/assets/crm/dashboard/') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('/assets/crm/dashboard/') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('/assets/crm/dashboard/') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />		
        <link href="{{ asset('/assets/crm/dashboard/') }}/libs/tui-chart/tui-chart.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('/assets/crm/dashboard/') }}/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('/assets/crm/dashboard/') }}/images/logo-dark.png" alt="" height="30">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('/assets/crm/dashboard/') }}/images/logo-light.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('/assets/crm/dashboard/') }}/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

						<ul class="nav menu nav-pills nav-justified me-3" role="tablist" id="top-menu-dasktop">
							<li class="nav-item waves-effect waves-light">
								<a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab" title="Overview" aria-selected="false">
									<span class="">Overview</span> 
								</a>
							</li>
							<li class="nav-item waves-effect waves-light">
                                <a href="{{ route('crmLogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('crmLogout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
								</a>
							</li>
						</ul>

                        <!-- App Search-->
                        <form class="app-search d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                    </div>
					<div class="d-flex sm-show">
						<a href="#"><span><img src="{{ asset('/assets/crm/dashboard/') }}/images/edit.png" height="22"></span></a>
					</div>
                </div>
            </header>
            
            @include('crm.dashboard.layout.sidebar')

			<!-- Start main Content here -->
			<div class="main-content">
			    @if($verified==NULL)
			        <div class="card card-primary">
			            <div class="card-header">
			                <h3>Verify your account!</h3>
			            </div>
			            <div class="card-body">
        			        <div class="alert alert-success">
        			            Please verify your account by verification email sent to your mail. If you didn't received verification email please <a href="{{ route('resendVerify',['mail'=>$user->email]) }}">click here</a> to resend verification code.
        			        </div>
			            </div>
			        </div>
			    @else
			        @yield('crmDashboard')
			    @endif
			</div>
			<!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/apexcharts/apexcharts.min.js"></script>		

        <!-- tui charts plugins -->
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/tui-chart/tui-chart-all.min.js"></script>

        <!-- tui charts map -->
        <script src="{{ asset('/assets/crm/dashboard/') }}/libs/tui-chart/maps/usa.js"></script>

        <!-- tui charts plugins -->
        <script src="{{ asset('/assets/crm/dashboard/') }}/js/pages/tui-charts.init.js"></script>

        <script src="{{ asset('/assets/crm/dashboard/') }}/js/pages/dashboard.init.js"></script>

		<script>
			jQuery(window).on("load", function(){ 

				if ($(window).width() < 992) {
					var menuobj = $("#top-menu-dasktop").html();
					$("#top-menu-dasktop").remove();
					$("#top-menu").prepend(menuobj);
					var contentobj = $("#tab-content-dasktop").html();
					$("#tab-content-dasktop").remove();
					$("#tab-content").prepend(contentobj);

				}
			});

			$(window).resize(function() {
				if ($(window).width() < 992) {
					location.reload();
				}
			});

			$(document).ready(function(){
				if ($(window).width() >= 992) {
					observer.observe(document.querySelector("#tax-block"));
					observer.observe(document.querySelector("#invoices-block"));
					observer.observe(document.querySelector("#payments-block"));
					observer.observe(document.querySelector("#quotes-block"));
					observer.observe(document.querySelector("#tasks-block"));
					observer.observe(document.querySelector("#expenses-block"));
					
				}
				if ($(window).width() < 992) {
					$(".menu a[href$='#tax']").removeClass('active');
					$(".tab-content #tax").removeClass('active');
					$(".menu a[href$='#overview']").addClass('active');
					$(".tab-content #overview").addClass('active');
					//$(".chart-large #column-charts").removeAttr('id');
				} 
			});
			function removeClasses(){
					$(".menu a[href$='#tax']").removeClass('active');
					$(".tab-content #tax").removeClass('active');
					$(".menu a[href$='#invoices']").removeClass('active');
					$(".tab-content #invoices").removeClass('active');
					$(".menu a[href$='#payments']").removeClass('active');
					$(".tab-content #payments").removeClass('active');
					$(".menu a[href$='#quotes']").removeClass('active');
					$(".tab-content #quotes").removeClass('active');
					$(".menu a[href$='#tasks']").removeClass('active');
					$(".tab-content #tasks").removeClass('active');
					$(".menu a[href$='#expenses']").removeClass('active');
					$(".tab-content #expenses").removeClass('active');		
			}
			var observer = new IntersectionObserver(function(entries) {
				if(entries[0].isIntersecting === true && entries[0].target.id == "tax-block"){
					removeClasses();
					$(".menu a[href$='#tax']").addClass('active');
					$(".tab-content #tax").addClass('active');
				}
				if(entries[0].isIntersecting === true && entries[0].target.id == "invoices-block"){
					removeClasses();
					$(".menu a[href$='#invoices']").addClass('active');
					$(".tab-content #invoices").addClass('active');
				}
				if(entries[0].isIntersecting === true && entries[0].target.id == "payments-block"){
					removeClasses();
					$(".menu a[href$='#payments']").addClass('active');
					$(".tab-content #payments").addClass('active');
				}
				if(entries[0].isIntersecting === true && entries[0].target.id == "quotes-block"){
					removeClasses();
					$(".menu a[href$='#quotes']").addClass('active');
					$(".tab-content #quotes").addClass('active');
				}
				if(entries[0].isIntersecting === true && entries[0].target.id == "tasks-block"){
					removeClasses();
					$(".menu a[href$='#tasks']").addClass('active');
					$(".tab-content #tasks").addClass('active');
				}
				if(entries[0].isIntersecting === true && entries[0].target.id == "expenses-block"){
					removeClasses();
					$(".menu a[href$='#expenses']").addClass('active');
					$(".tab-content #expenses").addClass('active');
				}
				//if(entries[0].isIntersecting === true)
					//console.log('Element is fully visible in screen');
			}, { root: document.querySelector('#scroll-block'), threshold: [0.9], rootMargin: "0px 0px 300px 0px" });

		</script>

        <script src="{{ asset('/assets/crm/dashboard/') }}/js/app.js"></script>
    </body>
</html>
