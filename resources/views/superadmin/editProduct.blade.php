@extends('superadmin.layouts.master')
@section('title') @lang('Update Product') @endsection
@section('css')
<link href="{{ asset('/') }}public/assets/libs/jsvectormap/jsvectormap.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}public/assets/libs/swiper/swiper.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('superadmin.components.breadcrumb')
@slot('li_1') Dashboards @endslot
@slot('title') Update Product @endslot
@endcomponent
    <div class="row">  
        <div class="col-xl-11 mx-auto">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Update Product</h4>
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
                    @if(!empty($product))
                    <form action="{{ route('updateProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" value="{{ $product->productName }}" name="productName" id="productName" placeholder="Enter product name">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="annualPrice" class="form-label">Annual Price</label>
                                <input type="text" class="form-control" value="{{ $product->annualPrice }}" name="annualPrice" id="annualPrice" placeholder="Enter annual price">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="monthlyPrice" class="form-label">Monthly Price</label>
                                <input type="text" class="form-control" name="monthlyPrice" id="monthlyPrice" value="{{ $product->monthlyPrice }}" placeholder="Enter monthly price">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="employee" class="form-label">Number of Employee</label>
                                <input type="text" class="form-control" value="{{ $product->employee }}" name="employee" id="employee" placeholder="Enter total employee facility">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="storage" class="form-label">Storage Size</label>
                                <input type="number" class="form-control" name="storage" id="storage" value="{{ $product->storage }}" placeholder="Enter max storage size. Put -1 for unlimited storage size">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="storage" class="form-label">Storage Unit</label>
                                <select name="storageUnit" id="storageUnit" class="form-control">
                                    <option value="{{ $product->storageUnit }}">{{ $product->storageUnit }}</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="productStatus" class="form-label">Status</label>
                                <select class="form-control" name="productStatus" id="productStatus">
                                    <option value="{{ $product->status }}">{{ $product->status }}</option>
                                    <option value="Enable">Enable</option>
                                    <option value="Disable">Disable</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="productDetails" class="form-label">Details</label>
                                <textarea class="form-control" id="productDetails" name="productDetails" rows="3" placeholder="Enter at a glance of the language">{{ $product->details }}</textarea>
                            </div>
                            <div class="col-12 my-2">
                                <h4>Select Module</h4>
                            </div>
                            <div class="col-12 mb-2 row">
                                <div class="form-check form-check-inline form-switch col-12 mb-4">
                                    <input class="form-check-input select_all_permission" type="checkbox" role="switch" id="select_all_permission">
                                    <label class="form-check-label" for="select_all_permission">Select All</label>
                                </div>
                                <!-- Custom Switches -->
                                @php
                                    $mod1 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Clients'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck1" value="Clients" @if(!empty($mod1) && $mod1->moduleName=='Clients') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck1">Clients</label>
                                </div>
                                @php
                                    $mod2 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Employees'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck10" value="Employees" @if(!empty($mod2) && $mod2->moduleName=='Employees') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck10">Employees</label>
                                </div>

                                @php
                                    $mod3 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Projects'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck11" value="Projects" @if(!empty($mod3) && $mod3->moduleName=='Projects') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck11">Projects</label>
                                </div>

                                @php
                                    $mod4 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Attandence'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck12" value="Attandence" @if(!empty($mod4) && $mod4->moduleName=='Attandence') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck12">Attandence</label>
                                </div>

                                @php
                                    $mod5 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Tasks'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck13" value="Tasks" @if(!empty($mod5) && $mod5->moduleName=='Tasks') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck13">Tasks</label>
                                </div>

                                @php
                                    $mod6 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Estimate'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck14" value="Estimate" @if(!empty($mod6) && $mod6->moduleName=='Estimate') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck14">Estimate</label>
                                </div>

                                @php
                                    $mod7 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Invoice'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck15" value="Invoice" @if(!empty($mod7) && $mod7->moduleName=='Invoice') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck15">Invoice</label>
                                </div>
                                @php
                                    $mod8 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Payments'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck16" value="Payments" @if(!empty($mod8) && $mod8->moduleName=='Payments') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck16">Payments</label>
                                </div>

                                @php
                                    $mod9 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Time Logs'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck17" value="Time Logs" @if(!empty($mod9) && $mod9->moduleName=='Time Logs') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck17">Time Logs</label>
                                </div>

                                @php
                                    $mod10 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Tickets'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck18" value="Tickets" @if(!empty($mod10) && $mod10->moduleName=='Tickets') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck18">Tickets</label>
                                </div>

                                @php
                                    $mod11 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Events'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck19" value="Events" @if(!empty($mod11) && $mod11->moduleName=='Events') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck19">Events</label>
                                </div>

                                @php
                                    $mod12 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Messages'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck1" value="Messages" @if(!empty($mod12) && $mod12->moduleName=='Messages') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck1">Messages</label>
                                </div>

                                @php
                                    $mod13 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Notices'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck2" value="Notices" @if(!empty($mod13) && $mod13->moduleName=='Notices') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck2">Notices</label>
                                </div>

                                @php
                                    $mod14 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Leaves'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck3" value="Leaves" @if(!empty($mod14) && $mod14->moduleName=='Leaves') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck3">Leaves</label>
                                </div>
                                @php
                                    $mod15 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Leads'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck4" value="Leads" @if(!empty($mod15) && $mod15->moduleName=='Leads') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck4">Leads</label>
                                </div>

                                @php
                                    $mod16 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Holidays'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck5" value="Holidays" @if(!empty($mod16) && $mod16->moduleName=='Holidays') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck5">Holidays</label>
                                </div>

                                @php
                                    $mod17 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Products'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck6" value="Products" @if(!empty($mod17) && $mod17->moduleName=='Products') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck6">Products</label>
                                </div>

                                @php
                                    $mod18 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Expenses'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck7" value="Expenses" @if(!empty($mod18) && $mod18->moduleName=='Expenses') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck7">Expenses</label>
                                </div>

                                @php
                                    $mod19 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Contracts'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck8" value="Contracts" @if(!empty($mod19) && $mod19->moduleName=='Contracts') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck8">Contracts</label>
                                </div>

                                @php
                                    $mod20 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Reports'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck20" value="Reports" @if(!empty($mod20) && $mod20->moduleName=='Reports') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck20">Reports</label>
                                </div>

                                @php
                                    $mod21 = \App\Models\PackageModule::where(['packId'=>$product->id,'moduleName'=>'Ticket Support'])->first();
                                @endphp
                                <div class="form-check form-check-inline form-switch col-md-2 col-2">
                                    <input class="form-check-input module_checkbox" type="checkbox" role="switch" name="module[]" id="SwitchCheck21" value="Ticket Support" @if(!empty($mod21) && $mod21->moduleName=='Ticket Support') checked @endif>
                                    <label class="form-check-label" for="SwitchCheck21">Ticket Support</label>
                                </div>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('updateProLogo') }}" class="mt-4" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <input type="hidden" name="productName" value="{{ $product->productName }}">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <img src="{{ asset('/') }}public/assets/images/product/{{ $product->media }}" alt="{{ $product->productName }}" class="img-fluid">
                            </div>
                            <div class="col-7 mb-3">
                                <label for="logo" class="form-label">New Media</label>
                                <input type="file" name="logo" class="form-control" id="logo" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Update Media</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="alert alert-info">Sorry! No data found</div>
                    @endif
                </div>
            </div> <!-- .card-->
            <div class="mb-4">
                <a href="{{ route('productList') }}" class="btn btn-success btn-sm">Pricing Table</a> 
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
