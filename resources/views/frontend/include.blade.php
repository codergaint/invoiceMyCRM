@php
    $details = \App\Models\GeneralSettings::orderBy('id','DESC')->first();
    if(!empty($details)):
        $companyName    = $details->companyName;
        $address        = $details->address;
        $phone          = $details->phone;
        $email          = $details->email;
        $lightlogo      = url('/').'/public/assets/images/logo/'.$details->frontLogo;
        $logo           = url('/').'/public/assets/images/logo/'.$details->randLogo;
        $favicon        = url('/').'/public/assets/images/logo/'.$details->favicon;
    else:
        $companyName    = "";
        $address        = "";
        $phone          = "";
        $email          = "";
        $logo           = "{{ asset('/') }}assets/img/logo.png";
        $lightlogo      = "{{ asset('/') }}assets/img/logo-light.png";
        $favicon        = "{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc";
    endif;
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
        <meta name="csrf-token" content="vzMWydesiCXNEZGqKYtJmjgnny8nwB7NSPszOjpm" />
        <title>@yield('frontTitle')| {{ $companyName }}</title>
        <meta name="description" content="Premium Template and Starter Kit for Laravel powered Apps" />
        <meta name="author" content="{{ $companyName }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ $favicon }}" />
        <link rel="apple-touch-icon" href="apple-touch-icon.html" />

        <link href="{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc" rel="stylesheet" />
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- ./Making stripe menu navigation -->
        <nav class="st-nav navbar main-nav navigation fixed-top" id="main-nav">
            <div class="container">
                <ul class="st-nav-menu nav navbar-nav">
                    <li class="st-nav-section nav-item">
                        <a href="#main" class="navbar-brand">
                            <img src="{{ $logo }}" alt="{{ $companyName }}" class="logo logo-sticky d-inline-block d-lg-none" />
                            <img src="{{ $lightlogo }}" alt="{{ $companyName }}" class="logo d-none d-lg-inline-block" />
                        </a>
                    </li>
                    <li class="st-nav-section st-nav-primary nav-item">
                        <a href="{{ url('/') }}" class="st-root-link nav-link">
                            Home
                        </a>
                        <a href="{{ route('feature') }}" class="st-root-link nav-link">
                            Feature
                        </a>
                        <a href="{{ route('pricing') }}" class="st-root-link nav-link">
                            Pricing
                        </a>
                        <a href="contact.html" class="st-root-link nav-link">
                            Contact
                        </a>
                    </li>
                    <li class="st-nav-section st-nav-secondary nav-item">
                        <a href="{{ route('userLogin') }}" class="btn btn-outline rounded-pill me-3 px-3">
                            <i class="fas fa-sign-in-alt d-none d-md-inline me-md-0 me-lg-2"></i>
                            <span class="d-md-none d-lg-inline">Login</span>
                        </a>

                        <a href="{{ route('userSignUp') }}" class="btn btn-solid rounded-pill px-3">
                            <i class="fas fa-user-plus d-none d-md-inline me-md-0 me-lg-2"></i>
                            <span class="d-md-none d-lg-inline">Signup</span>
                        </a>
                    </li>

                    <!-- Mobile Navigation -->
                    <li class="st-nav-section st-nav-mobile nav-item">
                        <button class="st-root-link navbar-toggler" type="button">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="st-popup">
                            <div class="st-popup-container">
                                <a class="st-popup-close-button">Close</a>
                                <div class="st-dropdown-content-group">
                                    <h4 class="text-uppercase regular">Pages</h4>

                                    <a href="about.html" class="regular text-primary"> <i class="far fa-building me-2"></i> About </a>
                                    <a href="contact.html" class="regular text-success"> <i class="far fa-envelope me-2"></i> Contact </a>
                                    <a href="pricing.html" class="regular text-warning"> <i class="fas fa-hand-holding-usd me-2"></i> Pricing </a>
                                    <a href="faqs.html" class="regular text-info"> <i class="far fa-question-circle me-2"></i> FAQs </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="overflow-hidden">
            @yield('pageHeader')
            @yield('frontcontent')
            <!-- ./Footer - Five Columns -->
            <footer class="section site-footer bg-darker text-contrast">
                <div class="container">
                    <div class="row gap-y text-center text-md-start">
                        <div class="col-md-4 me-auto">
                            <img src="{{ $lightlogo }}" alt="{{ $companyName }}" class="logo" />

                            <p>DashCore, a carefully crafted and powerful HTML5 template, it's perfect to showcase your startup or software</p>
                        </div>

                        <div class="col-md-2">
                            <!-- <h6 class="bold py-2 text-contrast text-uppercase">Company</h6> -->
                            <nav class="nav flex-column">
                                <a href="about.html" class="nav-item py-2 text-contrast">
                                    About
                                </a>
                                <a href="terms.html" class="nav-item py-2 text-contrast">
                                    Terms
                                </a>
                                <a href="faqs.html" class="nav-item py-2 text-contrast">
                                    Faq
                                </a>
                            </nav>
                        </div>

                        <!-- <div class="col-md-2">
                        <h6 class="bold py-2 text-contrast text-uppercase">Features</h6>
                        <nav class="nav flex-column">
                        <a href="javascript:;" class="nav-item py-2 text-contrast">
                        Features
                        </a>
                        <a href="javascript:;" class="nav-item py-2 text-contrast">
                        API
                        </a>
                        <a href="javascript:;" class="nav-item py-2 text-contrast">
                        Customers
                        </a>
                        </nav>
                        </div> -->

                        <div class="col-md-2">
                            <!-- <h6 class="bold py-2 text-contrast text-uppercase">Resources</h6> -->
                            <nav class="nav flex-column">
                                <a href="contact.html" class="nav-item py-2 text-contrast">
                                    Support
                                </a>
                                <a href="blog-grid.html" class="nav-item py-2 text-contrast">
                                    Blog
                                </a>
                                <a href="403.html" class="nav-item py-2 text-contrast">
                                    403 Error
                                </a>
                            </nav>
                        </div>
                        <div class="col-md-2">
                            <!-- <h6 class="bold py-2 text-contrast text-uppercase">Resources</h6> -->
                            <nav class="nav flex-column">
                                <a href="404.html" class="nav-item py-2 text-contrast">
                                    404 Error
                                </a>
                                <a href="500.html" class="nav-item py-2 text-contrast">
                                    500 Error
                                </a>
                                <a href="403.html" class="nav-item py-2 text-contrast">
                                    403 Error
                                </a>
                            </nav>
                        </div>
                        <div class="col-md-2">
                            <h6 class="bold py-2 text-contrast text-uppercase text-md-end">Follow us</h6>

                            <nav class="nav justify-content-end">
                                <a href="javascript:;" class="btn btn-circle btn-sm btn-light me-2">
                                    <i class="fab fa-facebook font-regular"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-circle btn-sm btn-light me-2">
                                    <i class="fab fa-twitter font-regular"></i>
                                </a>
                                <a href="javascript:;" class="btn btn-circle btn-sm btn-light">
                                    <i class="fab fa-instagram font-regular"></i>
                                </a>
                            </nav>
                        </div>
                    </div>

                    <hr class="mt-5 bg-secondary op-5" />
                    <div class="row small align-items-center">
                        <div class="col-md-4">
                            <p class="mt-2 mb-0">
                            &copy; <script>
                                document.write(new Date().getFullYear())
                            </script> {{ $companyName }} <i
                                    class="mdi mdi-heart text-danger"></i> All rights reserved</p>
                        </div>
                    </div>
                </div>
            </footer>
        </main>

        <div class="messages-area"></div>
        <script src="{{ asset('/') }}assets/js/frontend/manifestfc65.js?id=f8aa739ea61012b673ac"></script>
        <script src="{{ asset('/') }}assets/js/frontend/vendor8f83.js?id=f9c4bdab4319e2f4567b"></script>
        <script src="{{ asset('/') }}assets/js/frontend/appd15c.js?id=0dc6b9bdb7755c857cfc"></script>
    </body>
</html>
