@extends('frontend.include')
@section('frontTitle') Pricing @endsection
@section('pageHeadline') Pricing @endsection
@section('pageDetails') Lorem ipsom dollar site is common text for the design industry @endsection
@section('pageHeader')
    @include('frontend.pageHeader')
@endsection
@section('frontcontent')
    <!-- ./Pricing Table - Simple Columns -->
    <section class="section">
        <div class="container">
            <div class="row">
                @if(count($pricing)>0)
                @php
                    $x = 1;
                @endphp
                @foreach($pricing as $price)
                <div class="col-md-4 mt-5 col-12">
                    <div class="card text-center">
                        <div class="pricing card-header p-5 d-flex align-items-center flex-column @if($x%2==0) bg-primary text-contrast @else bg-light text-dark @endif">
                            <h4 class="bold @if($x%2==0) text-contrast @else text-dark @endif">{{ $price->productName }}</h4>

                            <div class="pricing-value">
                                <span class="price @if($x%2==0) text-contrast @else text-dark @endif">
                                    {{ $price->monthlyPrice }}
                                </span>
                            </div>

                            <p>{{ $price->details }}</p>
                        </div>

                        <ul class="list-group list-group-flush">
                            @php
                                $mod1 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Clients'])->first();
                                $mod2 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Employees'])->first();
                                $mod3 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Projects'])->first();
                                $mod4 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Attandence'])->first();
                                $mod5 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Tasks'])->first();
                                $mod6 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Estimate'])->first();
                                $mod7 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Invoice'])->first();
                                $mod8 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Payments'])->first();
                                $mod9 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Time Logs'])->first();
                                $mod10 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Tickets'])->first();
                                $mod11 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Events'])->first();
                                $mod12 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Messages'])->first();
                                $mod13 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Notices'])->first();
                                $mod14 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Leaves'])->first();
                                $mod15 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Leads'])->first();
                                $mod16 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Holidays'])->first();
                                $mod17 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Products'])->first();
                                $mod18 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Expenses'])->first();
                                $mod19 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Contracts'])->first();
                                $mod20 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Reports'])->first();
                                $mod21 = \App\Models\PackageModule::where(['packId'=>$price->id,'moduleName'=>'Ticket Support'])->first();
                            @endphp
                            <li class="list-group-item"><b>Storage</b> {{ $price->storage }}</li>
                            <li class="list-group-item"><b>Employee Facility</b> {{ $price->employee }}</li>
                            <li class="list-group-item"> @if(!empty($mod1)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Clients</li>
                            <li class="list-group-item"> @if(!empty($mod2)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Employees</li>
                            <li class="list-group-item"> @if(!empty($mod3)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Projects</li>
                            <li class="list-group-item"> @if(!empty($mod4)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Attandence</li>
                            <li class="list-group-item"> @if(!empty($mod5)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Tasks</li>
                            <li class="list-group-item"> @if(!empty($mod6)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Estimate</li>
                            <li class="list-group-item"> @if(!empty($mod7)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Invoice</li>
                            <li class="list-group-item"> @if(!empty($mod8)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Payments</li>
                            <li class="list-group-item"> @if(!empty($mod9)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Time Logs</li>
                            <li class="list-group-item"> @if(!empty($mod10)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Tickets</li>
                            <li class="list-group-item"> @if(!empty($mod11)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Events</li>
                            <li class="list-group-item"> @if(!empty($mod12)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Messages</li>
                            <li class="list-group-item"> @if(!empty($mod13)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Notices</li>
                            <li class="list-group-item"> @if(!empty($mod14)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Leaves</li>
                            <li class="list-group-item"> @if(!empty($mod15)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Leads</li>
                            <li class="list-group-item"> @if(!empty($mod16)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Holidays</li>
                            <li class="list-group-item"> @if(!empty($mod17)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Products</li>
                            <li class="list-group-item"> @if(!empty($mod18)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Expenses</li>
                            <li class="list-group-item"> @if(!empty($mod19)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Contracts</li>
                            <li class="list-group-item"> @if(!empty($mod20)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Reports</li>
                            <li class="list-group-item"> @if(!empty($mod21)) <i class="fas fa-check-square text-success"></i> @else <i class="fas fa-times text-danger"></i> @endif Ticket Support</li>
                        </ul>

                        <div class="card-body">
                            <a href="javascript:;" class="btn btn-rounded btn-outline-primary"> Buy now <i class="fa fa-long-arrow-alt-right ms-3"></i> </a>
                        </div>
                    </div>
                </div>
                @php
                    $x++;
                @endphp
                @endforeach
                @else
                <div class="col-md-4 mt-5 col-12">
                    <div class="card text-center">
                        <div class="pricing card-header p-5 d-flex align-items-center flex-column bg-light">
                            <h4 class="bold">Personal</h4>

                            <div class="pricing-value">
                                <span class="price text-dark">
                                    0.99
                                </span>
                            </div>

                            <p>For individuals &amp; small business.</p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item strike-through">Cras justo odio</li>
                            <li class="list-group-item strike-through">Dapibus ac facilisis in</li>
                            <li class="list-group-item strike-through">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>

                        <div class="card-body">
                            <a href="javascript:;" class="btn btn-rounded btn-outline-primary"> Buy now <i class="fa fa-long-arrow-alt-right ms-3"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 col-12">
                    <div class="card text-center">
                        <div class="pricing card-header p-5 d-flex align-items-center flex-column bg-primary text-contrast">
                            <h4 class="bold text-contrast">Business</h4>

                            <div class="pricing-value">
                                <span class="price text-contrast">
                                    19.99
                                </span>
                            </div>

                            <p>For growing companies.</p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item strike-through">Cras justo odio</li>
                            <li class="list-group-item strike-through">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>

                        <div class="card-body">
                            <a href="javascript:;" class="btn btn-rounded btn-primary"> Buy now <i class="fa fa-long-arrow-alt-right ms-3"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5 col-12">
                    <div class="card text-center">
                        <div class="pricing card-header p-5 d-flex align-items-center flex-column bg-light">
                            <h4 class="bold">Enterprise</h4>

                            <div class="pricing-value">
                                <span class="price text-dark">
                                    99.99
                                </span>
                            </div>

                            <p>For enterprise teams.</p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                        </ul>

                        <div class="card-body">
                            <a href="javascript:;" class="btn btn-rounded btn-outline-primary"> Buy now <i class="fa fa-long-arrow-alt-right ms-3"></i> </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ./Plans features -->
    <section class="section">
        <div class="container">
            @if(!empty($section2))
            <div class="section-heading text-center">
                <h2 class="bold">{{ $section2->title }}</h2>
                <p class="lead text-secondary">{{ $section2->description }}</p>
            </div>

            <div class="row gap-y text-center">
                @php
                    $serviceBox = \App\Models\PricingpageModule::where('section','priceServiceBox')->get();
                @endphp
                @if(count($serviceBox)>0)
                @foreach($serviceBox as $sb)
                <div class="col-md-4">
                    <i data-feather="headphones" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">{{ $sb->title }}</h5>
                    <p class="my-0">{{ $sb->description }}</p>
                </div>
                @endforeach
                @else
                <div class="col-md-4">
                    <i data-feather="headphones" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">First class support</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="box" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Code snippets</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="headphones" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Full documentation</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="lock" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Total control of your code</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="airplay" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Responsive design</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="monitor" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Browser support</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                @endif
            </div>
            @else
            <div class="section-heading text-center">
                <h2 class="bold">All our plans include</h2>
                <p class="lead text-secondary">Get access to a ton of features out of the box</p>
            </div>

            <div class="row gap-y text-center">
                <div class="col-md-4">
                    <i data-feather="headphones" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">First class support</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="box" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Code snippets</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="headphones" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Full documentation</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="lock" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Total control of your code</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="airplay" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Responsive design</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
                <div class="col-md-4">
                    <i data-feather="monitor" width="36" height="36" class="stroke-info me-2 m-0"></i>
                    <h5 class="bold my-3">Browser support</h5>
                    <p class="my-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- ./FAQs -->
    <section class="section bg-light edge bottom-right border-top">
        <div class="container">
            <div class="row">
                @if(!empty($section3))
                <div class="col-md-4">
                    <h2>{{ $section3->title }}</h2>
                    <p class="lead">{{ $section3->slogan }}</p>
                    <p class="text-muted">{{ $section3->description }}</p>
                </div>

                <div class="col-md-8">
                    <div class="accordion accordion-clean" id="faqs-accordion">
                        @php
                            $faq   = \App\Models\Faq::all();
                        @endphp
                        @if(count($faq)>0)
                            @php
                                $x = 1;
                            @endphp
                            @foreach($faq as $fq)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <a href="#" class="card-title btn" data-bs-toggle="collapse" data-bs-target="#priceFaq{{ $x }}">
                                        <i class="fas fa-angle-down angle"></i>
                                        {{ $fq->question }}
                                    </a>
                                </div>

                                <div id="priceFaq{{ $x }}" class="collapse @if($x==1) show @endif" data-bs-parent="#faqs-accordion">
                                    <div class="card-body">
                                        {!! $fq->answer !!}
                                    </div>
                                </div>
                            </div>
                            @php
                                $x++;
                            @endphp
                            @endforeach
                        @else
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn" data-bs-toggle="collapse" data-bs-target="#v1-q0">
                                    <i class="fas fa-angle-down angle"></i>
                                    What does the package include?
                                </a>
                            </div>

                            <div id="v1-q0" class="collapse show" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    When you buy Dashcore, you get all you see in the demo but the images. We include SASS files for styling, complete JS files with comments, all HTML variations. Besides we include all mobile PSD mockups.
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q1">
                                    <i class="fas fa-angle-down angle"></i>
                                    What is the typical response time for a support question?
                                </a>
                            </div>

                            <div id="v1-q1" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    Since you report us a support question we try to make our best to find out what is going on, depending on the case it could take more or les time, however a standard time could be minutes or hours.
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q2">
                                    <i class="fas fa-angle-down angle"></i>
                                    What do I need to know to customize this template?
                                </a>
                            </div>

                            <div id="v1-q2" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">Our documentation give you all you need to customize your copy. However you will need some basic web design knowledge (HTML, Javascript and CSS)</div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q3">
                                    <i class="fas fa-angle-down angle"></i>
                                    Can I suggest a new feature?
                                </a>
                            </div>

                            <div id="v1-q3" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    Definitely &lt;span class=&#039;bold&#039;&gt;Yes&lt;/span&gt;, you can contact us to let us know your needs. If your suggestion represents any value to both we can include it as a part of the theme or
                                    you can request a custom build by an extra cost. Please note it could take some time in order for the feature to be implemented.
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @else
                <div class="col-md-4">
                    <h2>Do you have <span class="bold">questions?</span></h2>
                    <p class="lead">Not sure how this template can help you? Wonder why you need to buy our theme?</p>
                    <p class="text-muted">Here are the answers to some of the most common questions we hear from our appreciated customers</p>
                </div>

                <div class="col-md-8">
                    <div class="accordion accordion-clean" id="faqs-accordion">
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn" data-bs-toggle="collapse" data-bs-target="#v1-q0">
                                    <i class="fas fa-angle-down angle"></i>
                                    What does the package include?
                                </a>
                            </div>

                            <div id="v1-q0" class="collapse show" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    When you buy Dashcore, you get all you see in the demo but the images. We include SASS files for styling, complete JS files with comments, all HTML variations. Besides we include all mobile PSD mockups.
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q1">
                                    <i class="fas fa-angle-down angle"></i>
                                    What is the typical response time for a support question?
                                </a>
                            </div>

                            <div id="v1-q1" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    Since you report us a support question we try to make our best to find out what is going on, depending on the case it could take more or les time, however a standard time could be minutes or hours.
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q2">
                                    <i class="fas fa-angle-down angle"></i>
                                    What do I need to know to customize this template?
                                </a>
                            </div>

                            <div id="v1-q2" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">Our documentation give you all you need to customize your copy. However you will need some basic web design knowledge (HTML, Javascript and CSS)</div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <a href="#" class="card-title btn collapsed" data-bs-toggle="collapse" data-bs-target="#v1-q3">
                                    <i class="fas fa-angle-down angle"></i>
                                    Can I suggest a new feature?
                                </a>
                            </div>

                            <div id="v1-q3" class="collapse" data-bs-parent="#faqs-accordion">
                                <div class="card-body">
                                    Definitely &lt;span class=&#039;bold&#039;&gt;Yes&lt;/span&gt;, you can contact us to let us know your needs. If your suggestion represents any value to both we can include it as a part of the theme or
                                    you can request a custom build by an extra cost. Please note it could take some time in order for the feature to be implemented.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- ./CTA - Start Now -->
    <section class="section">
        <div class="container bring-to-front">
            <div class="shadow rounded text-center bg-dark p-5">
                @if(!empty($startNow))
                <div class="text-contrast">
                    <i class="fa fa-heart fa-2x mb-3"></i>
                    <h2 class="mb-5 text-contrast">{{ $startNow->title }}</h2>
                    <p class="handwritten highlight font-md">{{ $startNow->description }}</p>
                </div>

                <a href="{{ $startNow->btnUrl }}" class="btn btn-success text-contrast btn-rounded mt-4">
                    {{ $startNow->btnTxt }}
                </a>
                @else
                <div class="text-contrast">
                    <i class="fa fa-heart fa-2x mb-3"></i>
                    <h2 class="mb-5 text-contrast">Try Dashcore now... Love it forever!</h2>
                    <p class="handwritten highlight font-md">Why wait? Start now!</p>
                </div>

                <a href="register.html" class="btn btn-success text-contrast btn-rounded mt-4">
                    Buy DashCore on Themeforest
                </a>
                @endif
            </div>
        </div>
    </section>
    <!-- ./CTA - Create Account -->
    <section class="section bg-contrast edge top-left b-b">
        <div class="container pt-5">
            <div class="d-flex align-items-center flex-column flex-md-row">
                @if(!empty($createAccount))
                <div class="text-center text-md-start">
                    <p class="light mb-0 text-primary lead">{{ $createAccount->title }}</p>
                    <h2 class="mt-0 bold">{{ $createAccount->description }}</h2>
                </div>

                <a href="{{ $createAccount->btnUrl }}" class="btn btn-primary btn-rounded mt-3 mt-md-0 ms-md-auto">
                    {{ $createAccount->btnTxt }}
                </a>
                @else
                <div class="text-center text-md-start">
                    <p class="light mb-0 text-primary lead">Ready to get started?</p>
                    <h2 class="mt-0 bold">Create an account now</h2>
                </div>

                <a href="register.html" class="btn btn-primary btn-rounded mt-3 mt-md-0 ms-md-auto">
                    Create DashCore account
                </a>
                @endif
            </div>
        </div>
    </section>
@endsection