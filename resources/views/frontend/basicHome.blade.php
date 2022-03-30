@extends('frontend.include')
@section('frontTitle') Homepage @endsection
@section('frontcontent')
    @section('pageHeader')
        @include('frontend.homeHeader')
    @endsection
            <!-- Features Carousel -->
            <section class="section features-carousel border-bottom">
                <div class="container pt-0">
                    <div class="cards-wrapper">
                        <div
                            class="swiper-container"
                            data-sw-autoplay="3500"
                            data-sw-loop="true"
                            data-sw-nav-arrows=".features-nav"
                            data-sw-show-items="1"
                            data-sw-space-between="30"
                            data-sw-breakpoints='{"768": {"slidesPerView": 3}, "992": {"slidesPerView": 4}}'
                        >
                            <div class="swiper-wrapper px-1">
                                @php
                                    $section2 = \App\Models\HomepageModule::where(['section'=>'Section2'])->orderBy('id','DESC')->get();
                                @endphp
                                @if(!empty($section2))
                                @foreach($section2 as $sec2)
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}public/assets/images/section/{{ $sec2->logo }}" class="img-responsive" alt="{{ $sec2->title }}" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">{{ $sec2->title }}</p>
                                            <p class="regular small text-secondary">{{ $sec2->slogan }}</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">{{ $sec2->statisticMeter }}k</p>
                                                <p class="text-secondary small mt-0">{{ $sec2->statisticText }}</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/0.html" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Social Integration</p>
                                            <p class="regular small text-secondary">Consequuntur ea sapiente ut</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/1.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Design Strategy</p>
                                            <p class="regular small text-secondary">Alias eum expedita illo rem!</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/2.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Save Money</p>
                                            <p class="regular small text-secondary">Consectetur adipisicing elit</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/3.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Business Brain</p>
                                            <p class="regular small text-secondary">Rem repellendus rerum, vel!</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/4.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Worldwide Support</p>
                                            <p class="regular small text-secondary">Consectetur adipisicing elit</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/5.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Social Settings</p>
                                            <p class="regular small text-secondary">Facilis numquam odio sit amet.</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide px-2 px-sm-1">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <div class="logo mx-auto my-3">
                                                <img src="{{ asset('/') }}/assets/img/automate-social/icons/6.svg" class="img-responsive" alt="" />
                                            </div>

                                            <hr class="w-50 mx-auto my-3" />

                                            <p class="bold mt-4">Insightful Statistics</p>
                                            <p class="regular small text-secondary">facere quasi rem suscipit!</p>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-around">
                                            <div class="roi">
                                                <p class="text-darker lead bold mb-0">1.5k</p>
                                                <p class="text-secondary small mt-0">New subscribers</p>
                                            </div>
                                            <a href="javascript:;"><i class="fas fa-info-circle fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Add Arrows -->
                            <div class="text-primary features-nav features-nav-next">
                                <span class="text-uppercase small">Next</span>
                                <i class="features-nav-icon fas fa-long-arrow-alt-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ./Get Started -->
            <section class="section get-started">
                <div class="container bring-to-front">
                    @php
                        $section3 = \App\Models\HomepageModule::where('section','Section3')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section3))
                    <div class="section-heading text-center">
                        <h2 class="extra-bold">{{ $section3->title }}</h2>
                        <p class="lead text-muted">{{ $section3->slogan }}</p>
                    </div>

                    <div class="pb-8 position-relative">
                        <div class="browser shadow-lg mx-auto" data-aos="fade-up">
                            <div class="screen">
                                <img src="{{ asset('/') }}public/assets/images/section/{{ $section3->logo }}" class="img-responsive" alt="{{ $section3->title }}" />
                            </div>
                        </div>

                        <div class="floating-box bg-contrast">
                            <div class="p-4 p-lg-5 shadow-lg rounded text-center">
                                <p class="lead">
                                    {{ $section3->description }}
                                </p>

                                <p class="handwritten highlight font-md mt-5">{{ $section3->boxHeading }}</p>
                                <a href="{{ $section3->btnUrl}}" class="btn btn-rounded btn-lg btn-primary px-4">
                                    {{ $section3->btnTxt }}
                                </a>

                                <hr class="w-50 mx-auto my-4" />
                                <p class="small text-secondary">
                                    {{ $section3->boxText }}
                                </p>
                            </div>
                        </div>

                        <a href="{{ $section3->videoLink }}" class="modal-popup mfp-iframe play-video btn btn-primary btn-circle text-contrast shadow" data-aos="fade-left" data-effect="mfp-fade" data-type="iframe">
                            <i class="fas fa-play font-lg"></i>
                        </a>
                    </div>
                    @else
                    <div class="section-heading text-center">
                        <h2 class="extra-bold">All-in-one Marketing Solution</h2>
                        <p class="lead text-muted"><span class="text-primary">Everything you need in one solution</span>, introducing Marketing Automation Tool, a powerful product for growing your business.</p>
                    </div>

                    <div class="pb-8 position-relative">
                        <div class="browser shadow-lg mx-auto" data-aos="fade-up">
                            <div class="screen">
                                <img src="{{ asset('/') }}/assets/img/screens/dash/4.png" class="img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="floating-box bg-contrast">
                            <div class="p-4 p-lg-5 shadow-lg rounded text-center">
                                <p class="lead">
                                    Communicate better, put all your customer information in one single place, get insights and stats in a nutshell
                                </p>

                                <p class="handwritten highlight font-md mt-5">No credit card needed</p>
                                <a href="javascript:;" class="btn btn-rounded btn-lg btn-primary px-4">
                                    Start Now
                                </a>

                                <hr class="w-50 mx-auto my-4" />
                                <p class="small text-secondary">
                                    By registering you will get 14 days of free access to the full featured solution
                                </p>
                            </div>
                        </div>

                        <a href="https://www.youtube.com/watch?v=MXghcI8hcWU" class="modal-popup mfp-iframe play-video btn btn-primary btn-circle text-contrast shadow" data-aos="fade-left" data-effect="mfp-fade" data-type="iframe">
                            <i class="fas fa-play font-lg"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </section>
            <!-- ./Why Us -->
            <section class="section why-us">
                <div class="shapes-container">
                    <div class="absolute shape-background top right"></div>
                </div>

                <div class="container">
                    @php
                        $section4 = \App\Models\HomepageModule::where('section','Section4')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section4))
                    <div class="section-heading text-center">
                        <h2 class="bold">{{ $section4->title }}</h2>
                        <p class="lead text-secondary">
                            {{ $section4->slogan }}
                        </p>
                    </div>

                    <div class="row gap-y">
                        <div class="col-md-5 position-relative">
                            <ul class="list-unstyled why-icon-list">
                                @php 
                                    $section4Box = \App\Models\HomepageModule::where('section','Section4Box')->orderBy('id','ASC')->get();
                                @endphp
                                @if(count($section4Box)>0)
                                @foreach($section4Box as $sb4)
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-info shadow-info text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="cloud" width="36" height="36" class="cloud"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">{{ $sb4->title }}</h5>
                                            <p class="my-0">{{ $sb4->description }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @else
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-info shadow-info text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="cloud" width="36" height="36" class="cloud"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Integrations</h5>
                                            <p class="my-0">Aut debitis deserunt ea explicabo hic id incidunt, minus</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-success shadow-success text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="dollar-sign" width="36" height="36" class="dollar-sign"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Payments</h5>
                                            <p class="my-0">Amet assumenda aut consequatur, corporis dolorum ea esse</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-alternate shadow-alternate text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="thumbs-up" width="36" height="36" class="thumbs-up"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Marketing</h5>
                                            <p class="my-0">Aliquam amet assumenda debitis dicta distinctio eaque enim</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-danger shadow-danger text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="pie-chart" width="36" height="36" class="pie-chart"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Analytics</h5>
                                            <p class="my-0">Accusantium consequuntur eaque eius itaque labore, neque</p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <div class="col-md-7">
                            <figure data-aos=" fade-left ">
                                <img src="{{ asset('/') }}public/assets/images/section/{{ $section4->logo }}" class="img-responsive" alt="{{ $section4->title }}" />
                            </figure>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="{{ $section4->btnUrl }}" class="btn btn-primary btn-rounded">{{ $section4->btnTxt }}</a>
                        <p class="small">- or -</p>
                        <a href="javascript:;" class="btn btn-link">Contact us</a>
                    </div>
                    @else
                    <div class="section-heading text-center">
                        <h2 class="bold">Why DashCore</h2>
                        <p class="lead text-secondary">
                            Our mission is to provide you with an all-in-one template so you don't have to look aside in order to get what you need
                        </p>
                    </div>

                    <div class="row gap-y">
                        <div class="col-md-5 position-relative">
                            <ul class="list-unstyled why-icon-list">
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-info shadow-info text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="cloud" width="36" height="36" class="cloud"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Integrations</h5>
                                            <p class="my-0">Aut debitis deserunt ea explicabo hic id incidunt, minus</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-success shadow-success text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="dollar-sign" width="36" height="36" class="dollar-sign"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Payments</h5>
                                            <p class="my-0">Amet assumenda aut consequatur, corporis dolorum ea esse</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-alternate shadow-alternate text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="thumbs-up" width="36" height="36" class="thumbs-up"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Marketing</h5>
                                            <p class="my-0">Aliquam amet assumenda debitis dicta distinctio eaque enim</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-item">
                                    <div class="d-flex align-items-start">
                                        <div class="rounded-circle bg-danger shadow-danger text-contrast p-3 icon-xl d-flex align-items-center justify-content-center me-3">
                                            <i data-feather="pie-chart" width="36" height="36" class="pie-chart"></i>
                                        </div>

                                        <div class="flex-fill">
                                            <h5 class="bold">Analytics</h5>
                                            <p class="my-0">Accusantium consequuntur eaque eius itaque labore, neque</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-7">
                            <figure data-aos=" fade-left ">
                                <img src="{{ asset('/') }}/assets/img/automate-social/build.svg" class="img-responsive" alt="" />
                            </figure>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <a href="javascript:;" class="btn btn-primary btn-rounded">Register for a free demo</a>
                        <p class="small">- or -</p>
                        <a href="javascript:;" class="btn btn-link">Contact us</a>
                    </div>
                    @endif
                </div>
            </section>
            <!-- ./Advanced Marketing Automation Solution -->
            <section class="section text-contrast advanced-automation-solution overflow-hidden">
                <div class="shape-wrapper">
                    <div class="shape shape-background mountain top shape-left"></div>
                </div>

                <div class="container">
                    @php
                        $section5 = \App\Models\HomepageModule::where('section','Section5')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section5))
                    <div class="section-heading text-center">
                        <h2 class="bold text-contrast">{{ $section5->title }}</h2>
                        <p class="lead">
                            {{ $section5->description }}
                        </p>
                    </div>

                    <div class="bg-contrast shadow-lg rounded">
                        <div class="browser">
                            <div class="screen">
                                <img src="{{ asset('/') }}public/assets/images/section/{{ $section5->logo }}" class="img-responsive rounded-bottom" alt="" />
                            </div>

                            <div class="bubbles-speech d-none d-md-block">
                                <span class="absolute small shadow speech-bubble" style="top: 47%; left: 1%;" data-aos="slide-up">Accesible option</span>
                                <span class="absolute small shadow speech-bubble" style="top: 69%; left: 61%;" data-aos="slide-up">Inline editing box</span>
                                <span class="absolute small shadow speech-bubble" style="top: 15%; left: 85%;" data-aos="slide-up">Interaction options</span>
                                <span class="absolute small shadow speech-bubble" style="top: 7%; left: 30%;" data-aos="slide-up">Easy search box</span>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="section-heading text-center">
                        <h2 class="bold text-contrast">Advanced Email Automation System</h2>
                        <p class="lead">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consequatur dicta, dignissimos fugiat nisi rerum similique voluptates? Aspernatur at beatae excepturi laboriosam molestiae quae reprehenderit sit
                            suscipit tempora, voluptatibus voluptatum?
                        </p>
                    </div>

                    <div class="bg-contrast shadow-lg rounded">
                        <div class="browser">
                            <div class="screen">
                                <img src="{{ asset('/') }}/assets/img/screens/dash/1.png" class="img-responsive rounded-bottom" alt="" />
                            </div>

                            <div class="bubbles-speech d-none d-md-block">
                                <span class="absolute small shadow speech-bubble" style="top: 47%; left: 1%;" data-aos="slide-up">Accesible option</span>
                                <span class="absolute small shadow speech-bubble" style="top: 69%; left: 61%;" data-aos="slide-up">Inline editing box</span>
                                <span class="absolute small shadow speech-bubble" style="top: 15%; left: 85%;" data-aos="slide-up">Interaction options</span>
                                <span class="absolute small shadow speech-bubble" style="top: 7%; left: 30%;" data-aos="slide-up">Easy search box</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

            <!-- ./Bring to life - Swiper -->
            <section class="section bg-light">
                <div class="container bring-to-front">
                    @php
                        $section6 = \App\Models\HomepageModule::where('section','Section6')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section6))
                    <div class="row gap-y">
                        <div class="col-md-6">
                            <div class="rounded bg-primary-gradient shadow">
                                <div class="d-flex flex-column align-items-center py-3">
                                    <img src="{{ asset('/') }}public/assets/images/section/{{ $section6->rightImg }}" class="img-responsive w-50" alt="{{ $section6->title }}" />
                                </div>
                            </div>
                            @php
                                $section6Box = \App\Models\HomepageModule::where('section','Section6Box')->orderBy('id','DESC')->get();
                            @endphp
                            @if(count($section6Box)>0)
                            @foreach($section6Box as $sb6)
                            <div class="rounded shadow-box bg-contrast mt-4">
                                <div class="d-flex align-items-center px-3">
                                    <i data-feather="bar-chart" class="stroke-primary me-3" width="36" height="36"></i>
                                    <div class="flex-fill my-3 ps-3 b-l">
                                        <p class="bold text-primary my-0">{{ $sb6->title }}</p>
                                        <p class="my-0 text-secondary">{{ $sb6->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="rounded shadow-box bg-contrast mt-4">
                                <div class="d-flex align-items-center px-3">
                                    <i data-feather="bar-chart" class="stroke-primary me-3" width="36" height="36"></i>
                                    <div class="flex-fill my-3 ps-3 b-l">
                                        <p class="bold text-primary my-0">Admin template included</p>
                                        <p class="my-0 text-secondary">We've included a fully functional starter admin dashboard</p>
                                    </div>
                                </div>
                            </div>

                                <div class="d-flex align-items-center px-3">
                                    <i data-feather="smartphone" width="36" height="36" class="stroke-primary me-3"></i>
                                    <div class="flex-fill my-3 ps-3 b-l">
                                        <p class="bold text-primary my-0">Powered with multiple starter apps</p>
                                        <p class="my-0 text-secondary">It's awesome you to have a nice feature to show up</p>

                                        <hr class="my-3" />
                                        <nav id="sw-nav-1" class="nav nav-tabs tabs-clean border-bottom-0">
                                            <a href="javascript:;" class="nav-item nav-link ps-md-0 py-0 d-flex flex-column align-items-center border-bottom-0 active" data-step="1">
                                                <i data-feather="mail" class="icon"></i>
                                                <span class="d-none small">Inbox</span>
                                            </a>
                                            <a href="javascript:;" class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0" data-step="2">
                                                <i data-feather="calendar" class="icon"></i>
                                                <span class="d-none small">Calendar</span>
                                            </a>
                                            <a href="javascript:;" class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0" data-step="3">
                                                <i data-feather="file" class="icon"></i>
                                                <span class="d-none small">Invoice</span>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6 ms-md-auto text-md-start text-center">
                            <div class="mb-5">
                                <span class="badge bg-info text-contrast rounded-pill shadow-box bold py-2 px-4">{{ $section6->btnTxt }}</span>
                                <h2 class="mt-3">{{ $section6->title }}</h2>
                                <p class="lead text-secondary">
                                    {{ $section6->description }}
                                </p>
                            </div>

                            <div class="swiper-container" data-sw-navigation="#sw-nav-1" data-sw-navigation-active="active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}public/assets/images/section/{{ $section6->logo }}" alt="{{ $section6->title }}" class="img-responsive rounded" />
                                        </figure>
                                    </div>
                                    <!-- <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}/assets/img/screens/dash/calendar.png" alt="" class="img-responsive rounded" />
                                        </figure>
                                    </div>
                                    <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}/assets/img/screens/dash/invoice.png" alt="" class="img-responsive rounded" />
                                        </figure>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row gap-y">
                        <div class="col-md-6">
                            <div class="rounded bg-primary-gradient shadow">
                                <div class="d-flex flex-column align-items-center py-3">
                                    <img src="{{ asset('/') }}/assets/img/bg/asset-1.svg" class="img-responsive w-50" alt="" />
                                </div>
                            </div>

                            <div class="rounded shadow-box bg-contrast mt-4">
                                <div class="d-flex align-items-center px-3">
                                    <i data-feather="bar-chart" class="stroke-primary me-3" width="36" height="36"></i>
                                    <div class="flex-fill my-3 ps-3 b-l">
                                        <p class="bold text-primary my-0">Admin template included</p>
                                        <p class="my-0 text-secondary">We've included a fully functional starter admin dashboard</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded shadow-box bg-contrast mt-4">
                                <div class="d-flex align-items-center px-3">
                                    <i data-feather="smartphone" width="36" height="36" class="stroke-primary me-3"></i>
                                    <div class="flex-fill my-3 ps-3 b-l">
                                        <p class="bold text-primary my-0">Powered with multiple starter apps</p>
                                        <p class="my-0 text-secondary">It's awesome you to have a nice feature to show up</p>

                                        <hr class="my-3" />
                                        <nav id="sw-nav-1" class="nav nav-tabs tabs-clean border-bottom-0">
                                            <a href="javascript:;" class="nav-item nav-link ps-md-0 py-0 d-flex flex-column align-items-center border-bottom-0 active" data-step="1">
                                                <i data-feather="mail" class="icon"></i>
                                                <span class="d-none small">Inbox</span>
                                            </a>
                                            <a href="javascript:;" class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0" data-step="2">
                                                <i data-feather="calendar" class="icon"></i>
                                                <span class="d-none small">Calendar</span>
                                            </a>
                                            <a href="javascript:;" class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0" data-step="3">
                                                <i data-feather="file" class="icon"></i>
                                                <span class="d-none small">Invoice</span>
                                            </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 ms-md-auto text-md-start text-center">
                            <div class="mb-5">
                                <span class="badge bg-info text-contrast rounded-pill shadow-box bold py-2 px-4">Simple and transparent</span>
                                <h2 class="mt-3">Bring your application to life</h2>
                                <p class="lead text-secondary">
                                    DashCore includes an outstanding starter Admin Dashboard. You can start developing right away your web application.
                                </p>
                            </div>

                            <div class="swiper-container" data-sw-navigation="#sw-nav-1" data-sw-navigation-active="active">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}/assets/img/screens/dash/inbox.png" alt="" class="img-responsive rounded" />
                                        </figure>
                                    </div>
                                    <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}/assets/img/screens/dash/calendar.png" alt="" class="img-responsive rounded" />
                                        </figure>
                                    </div>
                                    <div class="swiper-slide">
                                        <figure class="shadow-box">
                                            <img src="{{ asset('/') }}/assets/img/screens/dash/invoice.png" alt="" class="img-responsive rounded" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <!-- ./Why DashCore -->
            <section class="section bg-light">
                <div class="container bring-to-front pb-0">
                    @php
                        $section7 = \App\Models\HomepageModule::where('section','Section7')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section7))
                    <div class="section-heading text-center w-75 mx-auto">
                        <h2>{{ $section7->title }}</h2>
                        <p class="lead text-secondary">{{ $section7->description }}</p>
                    </div>

                    <div class="shadow bg-contrast p-5 rounded">
                        <nav class="nav nav-tabs tabs-clean slide d-inline-flex mb-4">
                            <a class="nav-item nav-link text-uppercase bold active" data-bs-toggle="tab" href="#designers">
                                Developers
                            </a>
                            <a class="nav-item nav-link text-uppercase bold" data-bs-toggle="tab" href="#developers">
                                Designers
                            </a>
                        </nav>

                        <div class="tab-content">
                            <div class="tab-pane active" id="designers">
                                <div class="row gap-y">
                                    <div class="col-lg-6">
                                        <h2 class="bold mb-4">{{ $section7->designerHeading }}</h2>
                                        <p class="lead text-secondary">
                                            {{ $section7->designerTxt }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <figure class="px-2">
                                            <img src="{{ asset('/') }}public/assets/images/section/{{ $section7->designerImg }}" class="img-responsive shadow rounded" alt="{{ $section7->designerHeading }}" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="developers">
                                <div class="row gap-y">
                                    <div class="col-lg-6">
                                        <h2 class="bold mb-4">{{ $section7->developerHeading }}</h2>
                                        <p class="lead text-secondary">
                                            {{ $section7->developerTxt }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <figure class="px-2">
                                            <img src="{{ asset('/') }}public/assets/images/section/{{ $section7->developerImg }}" class="img-responsive shadow rounded" alt="{{ $section7->developerHeading }}" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="section-heading text-center w-75 mx-auto">
                        <h2>Why Dashcore template?</h2>
                        <p class="lead text-secondary">When you're looking for a template you want it to stand-out. Dashcore comes with hundreds of customizable features addressed to developers and designers.</p>
                    </div>

                    <div class="shadow bg-contrast p-5 rounded">
                        <nav class="nav nav-tabs tabs-clean slide d-inline-flex mb-4">
                            <a class="nav-item nav-link text-uppercase bold active" data-bs-toggle="tab" href="#designers">
                                Developers
                            </a>
                            <a class="nav-item nav-link text-uppercase bold" data-bs-toggle="tab" href="#developers">
                                Designers
                            </a>
                        </nav>

                        <div class="tab-content">
                            <div class="tab-pane active" id="designers">
                                <div class="row gap-y">
                                    <div class="col-lg-6">
                                        <h2 class="bold mb-4">Engaging developers with organized code</h2>
                                        <p class="lead text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cumque deleniti facere ipsa laborum saepe, tenetur ullam? Consequatur, deserunt eaque facilis hic, illo laboriosam minima quae quia
                                            temporibus totam vel.
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <figure class="px-2">
                                            <img src="{{ asset('/') }}/assets/img/screens/developer.png" class="img-responsive shadow rounded" alt="..." />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="developers">
                                <div class="row gap-y">
                                    <div class="col-lg-6">
                                        <h2 class="bold mb-4">Engaging designers with tons of design elements</h2>
                                        <p class="lead text-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa cumque deleniti facere ipsa laborum saepe, tenetur ullam? Consequatur, deserunt eaque facilis hic, illo laboriosam minima quae quia
                                            temporibus totam vel.
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <figure class="px-2">
                                            <img src="{{ asset('/') }}/assets/img/screens/designer.png" class="img-responsive shadow rounded" alt="..." />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

            <!-- ./Pricing Includes -->
            <section class="section bg-darker">
                <div class="container pt-15 pb-5">
                    @php
                        $section8 = \App\Models\HomepageModule::where('section','Section8')->orderBy('id','DESC')->first();
                    @endphp
                    @if(!empty($section8))
                    <div class="section-heading text-center" style="margin-top: -185px !important;">
                        <h2 class="bold text-contrast">{{  $section8->title }}</h2>
                        <p class="lead text-muted">{{ $section8->description }}</p>
                    </div>
                    <div class="row g-4">
                        @php
                            $sb8 = \App\Models\HomepageModule::where('section','Section8Box')->get();
                        @endphp
                        @if(count($sb8)>0)
                        @foreach($sb8 as $s8b)
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="headphones" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">{{ $s8b->title }}</h6>
                                            <p class="text-muted mt-0">{{ $s8b->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="headphones" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">First class support</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="box" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Code snippets</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="headphones" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Full documentation</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="lock" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Total control of your code</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="airplay" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Responsive design</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="monitor" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Browser support</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="section-heading text-center" style="margin-top: -185px !important;">
                        <h2 class="bold text-contrast">Abid is here</h2>
                        <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="headphones" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">First class support</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="box" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Code snippets</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="headphones" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Full documentation</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="lock" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Total control of your code</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="airplay" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Responsive design</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-dark border-0 lift-hover">
                                <div class="card-body">
                                    <div class="d-flex align-items-start pb-3">
                                        <div class="bg-success p-3 rounded-circle center-flex me-3">
                                            <i data-feather="monitor" class="stroke-contrast"></i>
                                        </div>
                                        <div class="flex-fill">
                                            <h6 class="text-contrast">Browser support</h6>
                                            <p class="text-muted mt-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci atque beatae dicta dolores hic porro quam voluptatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </section>
            <!-- ./Get Theme CTA -->
            <section class="section bg-darker">
                <div class="container">
                    @if($section8)
                    <div class="section-heading">
                        <div class="row">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
                                <span class="badge badge-light badge-pill text-uppercase bold px-4 py-2 mb-4">Get started</span>

                                <h2 class="text-contrast">{{ $section8->writerHeading }} <span class="typed" data-strings='["Money", "Time", "Costs"]'></span></h2>

                                <p class="lead text-muted">
                                    {{ $section8->writingText }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="handwritten highlight font-md">{{ $section8->designerTxt }}</p>

                        <a href="{{ $section8->btnUrl }}" target="_blank" class="btn btn-lg btn-alternate text-contrast px-4">{{ $section8->btnTxt }}</a>
                    </div>
                    @else
                    <div class="section-heading">
                        <div class="row">
                            <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
                                <span class="badge badge-light badge-pill text-uppercase bold px-4 py-2 mb-4">Get started</span>

                                <h2 class="text-contrast">DashCore saves <span class="typed" data-strings='["Money", "Time", "Costs"]'></span></h2>

                                <p class="lead text-muted">
                                    DashCore will saves you tons of hard work, it is easy to customize and it comes with hundreds of features.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="handwritten highlight font-md">Available on Themeforest!!!</p>

                        <a href="https://themeforest.net/item/dashcore-saas-startup-software-template/22397137" target="_blank" class="btn btn-lg btn-alternate text-contrast px-4">Buy Dashcore Now</a>
                    </div>
                    @endif
                </div>
            </section>

            <!-- ./Partners -->
            <section class="section partners bg-light">
                <div class="container icons-list">
                    <div class="swiper-container" data-sw-show-items="5" data-sw-space-between="30" data-sw-autoplay="2500" data-sw-loop="true">
                        <div class="swiper-wrapper align-items-center">
                        @php
                            $company = \App\Models\HomepageModule::where('section','Section9')->get();
                        @endphp
                        @if(count($company)>0)
                        @foreach($company as $com)
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}public/assets/images/section/{{ $com->companyLogo }}" class="img-responsive" alt="{{ $com->companyName }}" style="max-height: 60px;" />
                            </div>
                        @endforeach
                        @else
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/1.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/2.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/3.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/4.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/5.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/6.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('/') }}/assets/img/logos/7.png" class="img-responsive" alt="" style="max-height: 60px;" />
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- ./Join - As Developer/Designer -->
            <section class="section bg-light">
                <div class="container bring-to-front py-0">
                    <div class="shadow bg-contrast p-5 rounded">
                        <div class="row gap-y align-items-center text-center text-lg-start">
                        @php
                            $oportunity = \App\Models\HomepageModule::where('section','OportunityBox')->get();
                        @endphp
                        @if(count($oportunity)>0)
                        @foreach($oportunity as $opor)
                            <div class="col-12 col-md-6 py-4 px-3 px-md-5 b-md-r">
                                <i data-feather="star" width="36" height="36" class="stroke-primary"></i>
                                <a href="javascript:;" class="mt-4 text-primary d-flex align-items-center justify-content-center justify-content-md-start">
                                    <h4 class="mb-0 me-3">{{ $opor->title }}</h4>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                                <p class="mt-4">
                                    {{ $opor->description }}
                                </p>
                            </div>
                        @endforeach
                        @else
                            <div class="col-12 col-md-6 py-4 px-3 px-md-5 b-md-r">
                                <i data-feather="star" width="36" height="36" class="stroke-primary"></i>
                                <a href="javascript:;" class="mt-4 text-primary d-flex align-items-center justify-content-center justify-content-md-start">
                                    <h4 class="mb-0 me-3">Join as Designer</h4>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                                <p class="mt-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis sequi
                                    soluta vel veniam.
                                </p>
                            </div>

                            <div class="col-12 col-md-6 py-4 px-3 px-md-5 just">
                                <i data-feather="code" width="36" height="36" class="stroke-info"></i>
                                <a href="javascript:;" class="mt-4 text-info d-flex align-items-center justify-content-center justify-content-md-start">
                                    <h4 class="mb-0 me-3">Join as Developer</h4>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                                <p class="mt-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, consequuntur fugit minima natus optio quisquam sint sunt? Earum harum in laudantium nobis obcaecati odio, praesentium, quis sequi
                                    soluta vel veniam.
                                </p>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- ./CTA - Create Account -->
            <section class="section bg-contrast edge top-left b-b">
                <div class="container pt-5">
                    <div class="d-flex align-items-center flex-column flex-md-row">
                        <div class="text-center text-md-start">
                            <p class="light mb-0 text-primary lead">Ready to get started?</p>
                            <h2 class="mt-0 bold">Create an account now</h2>
                        </div>

                        <a href="register.html" class="btn btn-primary btn-rounded mt-3 mt-md-0 ms-md-auto">
                            Create DashCore account
                        </a>
                    </div>
                </div>
            </section>
@endsection