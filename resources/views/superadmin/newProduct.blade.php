@extends('superadmin.layouts.master')
@section('title') @lang('Create Product') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') New Product @endslot
@endcomponent
    <div class="row">  
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Create Product</h4>
                    <div class="flex-shrink-0">
                        <a href="{{ route('productList') }}" class="btn btn-soft-info btn-sm">
                            <i class="ri-file-list-3-line align-middle"></i> Pricing Table
                        </a>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {!! Session::get('success') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!! Session::get('error') !!}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="annualPrice" class="form-label">Annual Price</label>
                                <input type="text" class="form-control" name="annualPrice" id="annualPrice" placeholder="Enter annual price">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="monthlyPrice" class="form-label">Monthly Price</label>
                                <input type="text" class="form-control" name="monthlyPrice" id="monthlyPrice" placeholder="Enter monthly price">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="employee" class="form-label">Number of Employee</label>
                                <input type="text" class="form-control" name="employee" id="employee" placeholder="Enter total employee facility">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="storage" class="form-label">Storage Size</label>
                                <input type="number" class="form-control" name="storage" id="storage" placeholder="Enter max storage size. Put -1 for unlimited storage size">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="storage" class="form-label">Storage Unit</label>
                                <select name="storageUnit" id="storageUnit" class="form-control">
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="logo" class="form-label">Product Media</label>
                                <input type="file" name="logo" class="form-control" id="logo">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="productStatus" class="form-label">Status</label>
                                <select class="form-control" name="productStatus" id="productStatus">
                                    <option value="Enable">Enable</option>
                                    <option value="Disable">Disable</option>
                                </select>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="productDetails" class="form-label">Details</label>
                                <textarea class="form-control" id="productDetails" name="productDetails" rows="3" placeholder="Enter at a glance of the language"></textarea>
                            </div>
                            <div class="my-2">
                                <h4>Select Module</h4>
                            </div>
                            <div class="col-12 mb-2 row">
                                <div class="form-check form-check-inline form-switch col-12 mb-4">
                                    <input class="form-check-input select_all_permission" type="checkbox" role="switch" id="select_all_permission" checked>
                                    <label class="form-check-label" for="select_all_permission">Select All</label>
                                </div>
                                <!-- Custom Switches -->
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck1" value="Clients" checked>
                                    <label class="form-check-label" for="SwitchCheck1">Clients</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck10" value="Employees" checked>
                                    <label class="form-check-label" for="SwitchCheck10">Employees</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck11" value="Projects" checked>
                                    <label class="form-check-label" for="SwitchCheck11">Projects</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck12" value="Attandence" checked>
                                    <label class="form-check-label" for="SwitchCheck12">Attandence</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck13" value="Tasks" checked>
                                    <label class="form-check-label" for="SwitchCheck13">Tasks</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck14" value="Estimate" checked>
                                    <label class="form-check-label" for="SwitchCheck14">Estimate</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck15" value="Invoice" checked>
                                    <label class="form-check-label" for="SwitchCheck15">Invoice</label>
                                </div>
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck16" value="Payments" checked>
                                    <label class="form-check-label" for="SwitchCheck16">Payments</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck17" value="Time Logs" checked>
                                    <label class="form-check-label" for="SwitchCheck17">Time Logs</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck18" value="Tickets" checked>
                                    <label class="form-check-label" for="SwitchCheck18">Tickets</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck19" value="Events" checked>
                                    <label class="form-check-label" for="SwitchCheck19">Events</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck1" value="Messages" checked>
                                    <label class="form-check-label" for="SwitchCheck1">Messages</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck2" value="Notices" checked>
                                    <label class="form-check-label" for="SwitchCheck2">Notices</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck3" value="Leaves" checked>
                                    <label class="form-check-label" for="SwitchCheck3">Leaves</label>
                                </div>
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck4" value="Leads" checked>
                                    <label class="form-check-label" for="SwitchCheck4">Leads</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck5" value="Holidays" checked>
                                    <label class="form-check-label" for="SwitchCheck5">Holidays</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck6" value="Products" checked>
                                    <label class="form-check-label" for="SwitchCheck6">Products</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck7" value="Expenses" checked>
                                    <label class="form-check-label" for="SwitchCheck7">Expenses</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck8" value="Contracts" checked>
                                    <label class="form-check-label" for="SwitchCheck8">Contracts</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck20" value="Reports" checked>
                                    <label class="form-check-label" for="SwitchCheck20">Reports</label>
                                </div>

                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck21" value="Ticket Support" checked>
                                    <label class="form-check-label" for="SwitchCheck21">Ticket Support</label>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- .card-->
            <div class="mb-4">
                <a href="{{ route('productList') }}" class="btn btn-success btn-sm">Manage Product</a> 
            </div>
            
        </div> <!-- .col-->
        <!-- end col -->
    </div>
@endsection
@section('script')
<!-- apexcharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('public/assets/libs/swiper/swiper.min.js')}}"></script>
<!-- dashboard init -->
<script src="{{ asset('public/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
<script src="{{ asset('public/assets/js/app.min.js') }}"></script>
<script>
    $('.select_all_permission').change(function () {
        console.log('this is change')
        if($(this).is(':checked')){
            $('.module_checkbox').prop('checked', true);
        } else {
            $('.module_checkbox').prop('checked', false);
        }
    });
</script>
@endsection
