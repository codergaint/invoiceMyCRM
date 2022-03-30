<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| Invoice MyCRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mange CRM,CRM Profile" name="description" />
    <meta content="Virtual IT Professional" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico')}}">
    @include('superadmin.layouts.head-css')
</head>

@section('body')
    @include('superadmin.layouts.body')
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('superadmin.layouts.topbar')
        @include('superadmin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('superadmin.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    @include('superadmin.layouts.customizer')

    <!-- JAVASCRIPT -->
    @include('superadmin.layouts.vendor-scripts')
</body>

</html>
