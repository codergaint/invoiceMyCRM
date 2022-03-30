<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('public/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span >@lang('General Menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('superAdmin') }}">
                        <i class="ri-dashboard-line"></i> <span >Dashboard</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('companyList') }}">
                        <i class="ri-building-2-line"></i> <span >Company</span>
                    </a>
                </li> <!-- end company menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('superAdmin') }}">
                        <i class="ri-survey-line"></i> <span >Invoice</span>
                    </a>
                </li> <!-- end invoice menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('superAdmin') }}">
                        <i class="ri-group-line"></i> <span >Staff Members</span>
                    </a>
                </li>  <!-- end staff menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('superAdmin') }}">
                        <i class="ri-lifebuoy-line"></i> <span >Support Tickets</span>
                    </a>
                </li> <!-- end support menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('Frontend Management')</span></li>
                <!-- end pricing menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('productList') }}">
                        <i class="ri-price-tag-fill"></i> <span >Pricing</span>
                    </a>
                </li> 
                <!-- end pricing menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('homeSection') }}">
                        <i class="ri-pages-line"></i> <span >Default Pages</span>
                    </a>
                </li> <!-- end default page menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('layouts') }}">
                        <i class="ri-pages-line"></i> <span >Layouts</span>
                    </a>
                </li> <!-- end default page menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('siteMeta') }}">
                        <i class="ri-google-line"></i> <span >Site Meta</span>
                    </a>
                </li>  <!-- end site meta menu -->  
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('faqList') }}">
                        <i class="ri-book-open-line"></i> <span >FAQ</span>
                    </a>
                </li> <!-- end faq menu -->
                <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('Settings')</span></li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#pageManage" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="pageManage">
                        <i class="ri-settings-2-line"></i> <span >Global Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="pageManage">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('languageList') }}" class="nav-link" >Language</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('currencyList') }}" class="nav-link" >Currency</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mailSetup') }}" class="nav-link" >Email Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('superAdmin') }}" class="nav-link" >API</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('onlineCredential') }}" class="nav-link" >Payment Creditials</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('superAdmin') }}" class="nav-link" >Social Login</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end page menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('generalSettings') }}">
                        <i class="ri-settings-line"></i> <span >General Settings</span>
                    </a>
                </li> 
                <!-- end profile menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('adminProfile') }}">
                        <i class="ri-shield-user-line"></i> <span >Profile Settings</span>
                    </a>
                </li> 
                <!-- end profile menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
