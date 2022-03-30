@extends('frontend.include')
@section('frontTitle') Feature @endsection
@section('pageHeadline') Feature @endsection
@section('pageDetails') Lorem ipsom dollar site is common text for the design industry @endsection
@section('pageHeader')
    @include('frontend.featureHeader')
@endsection
@section('frontcontent')
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
                    $serviceBox = \App\Models\FeaturepageModule::where('section','featureServiceBox')->get();
                @endphp
                @if(count($serviceBox)>0)
                @foreach($serviceBox as $sb)
                <div class="col-md-4 col-6 mx-auto">
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
    <!-- ./Bring to life - Swiper -->
<section class="section bg-light">
    <div class="container bring-to-front">
        <div class="row gap-y">
            @if(!empty($section3))
            <div class="col-md-6">
                <div class="rounded bg-primary-gradient shadow">
                    <div class="d-flex flex-column align-items-center py-3">
                        <img src="{{ asset('/public/assets/images/section/') }}/{{ $section3->logo }}" class="img-responsive w-50" alt="{{ $section3->title }}">
                    </div>
                </div>
                @php
                    $leftServiceBox = \App\Models\FeaturepageModule::where('section','featureServiceBox')->get();
                @endphp
                @if(count($leftServiceBox)>0)
                @foreach($leftServiceBox as $lsb)
                <div class="rounded shadow-box bg-contrast mt-4">
                    <div class="d-flex align-items-center px-3">
                        <i data-feather="bar-chart" class="stroke-primary  me-3 " width="36" height="36"></i>
                        <div class="flex-fill my-3  ps-3 b-l ">
                            <p class="bold text-primary my-0">{{ $lsb->title }}</p>
                            <p class="my-0 text-secondary">{{ $lsb->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="rounded shadow-box bg-contrast mt-4">
                    <div class="d-flex align-items-center px-3">
                        <i data-feather="bar-chart" class="stroke-primary  me-3 " width="36" height="36"></i>
                        <div class="flex-fill my-3  ps-3 b-l ">
                            <p class="bold text-primary my-0">Admin template included</p>
                            <p class="my-0 text-secondary">We've included a fully functional starter admin dashboard</p>
                        </div>
                    </div>
                </div>

                <div class="rounded shadow-box bg-contrast mt-4">
                    <div class="d-flex align-items-center px-3">
                        <i data-feather="smartphone" width="36" height="36" class="stroke-primary  me-3 "></i>
                        <div class="flex-fill my-3  ps-3 b-l ">
                            <p class="bold text-primary my-0">Powered with multiple starter apps</p>
                            <p class="my-0 text-secondary">It's awesome you to have a nice feature to show up</p>

                            <hr class="my-3">
                            <nav id="sw-nav-1" class="nav nav-tabs tabs-clean border-bottom-0">
                                <a href="javascript:;"
                                    class="nav-item nav-link  ps-md-0  py-0 d-flex flex-column align-items-center border-bottom-0 active"
                                    data-step="1">
                                    <i data-feather="mail" class="icon"></i>
                                    <span class="d-none small">Inbox</span>
                                </a>
                                <a href="javascript:;"
                                    class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                                    data-step="2">
                                    <i data-feather="calendar" class="icon"></i>
                                    <span class="d-none small">Calendar</span>
                                </a>
                                <a href="javascript:;"
                                    class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                                    data-step="3">
                                    <i data-feather="file" class="icon"></i>
                                    <span class="d-none small">Invoice</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-6  ms-md-auto text-md-start  text-center">
                <div class="mb-5">
                    <span class="badge bg-info text-contrast rounded-pill shadow-box bold py-2 px-4">{{ $section3->btnTxt }}</span>
                    <h2 class="mt-3">{{ $section3->title }}</h2>
                    <p class="lead text-secondary">
                        {{ $section3->description }}</p>
                </div>

                <div class="swiper-container" data-sw-navigation="#sw-nav-1" data-sw-navigation-active="active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="{{ asset('/public/assets/images/section/') }}/{{ $section3->rightImg }}" alt="{{ $section3->title }}" class="img-responsive rounded">
                            </figure>
                        </div>
                        <!-- <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="https://ontwerpdeal.nl/img/screens/dash/calendar.png" alt="" class="img-responsive rounded">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="https://ontwerpdeal.nl/img/screens/dash/invoice.png" alt="" class="img-responsive rounded">
                            </figure>
                        </div> -->
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-6">
                <div class="rounded bg-primary-gradient shadow">
                    <div class="d-flex flex-column align-items-center py-3">
                        <img src="https://ontwerpdeal.nl/img/bg/asset-1.svg" class="img-responsive w-50" alt="">
                    </div>
                </div>

                <div class="rounded shadow-box bg-contrast mt-4">
                    <div class="d-flex align-items-center px-3">
                        <i data-feather="bar-chart" class="stroke-primary  me-3 " width="36" height="36"></i>
                        <div class="flex-fill my-3  ps-3 b-l ">
                            <p class="bold text-primary my-0">Admin template included</p>
                            <p class="my-0 text-secondary">We've included a fully functional starter admin dashboard</p>
                        </div>
                    </div>
                </div>

                <div class="rounded shadow-box bg-contrast mt-4">
                    <div class="d-flex align-items-center px-3">
                        <i data-feather="smartphone" width="36" height="36" class="stroke-primary  me-3 "></i>
                        <div class="flex-fill my-3  ps-3 b-l ">
                            <p class="bold text-primary my-0">Powered with multiple starter apps</p>
                            <p class="my-0 text-secondary">It's awesome you to have a nice feature to show up</p>

                            <hr class="my-3">
                            <nav id="sw-nav-1" class="nav nav-tabs tabs-clean border-bottom-0">
                                <a href="javascript:;"
                                    class="nav-item nav-link  ps-md-0  py-0 d-flex flex-column align-items-center border-bottom-0 active"
                                    data-step="1">
                                    <i data-feather="mail" class="icon"></i>
                                    <span class="d-none small">Inbox</span>
                                </a>
                                <a href="javascript:;"
                                    class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                                    data-step="2">
                                    <i data-feather="calendar" class="icon"></i>
                                    <span class="d-none small">Calendar</span>
                                </a>
                                <a href="javascript:;"
                                    class="nav-item nav-link py-0 d-flex flex-column align-items-center border-bottom-0"
                                    data-step="3">
                                    <i data-feather="file" class="icon"></i>
                                    <span class="d-none small">Invoice</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6  ms-md-auto text-md-start  text-center">
                <div class="mb-5">
                    <span class="badge bg-info text-contrast rounded-pill shadow-box bold py-2 px-4">Simple and transparent</span>
                    <h2 class="mt-3">Bring your application to life</h2>
                    <p class="lead text-secondary">
                        DashCore includes an outstanding starter Admin Dashboard. You can start developing right away your web application.</p>
                </div>

                <div class="swiper-container" data-sw-navigation="#sw-nav-1" data-sw-navigation-active="active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="https://ontwerpdeal.nl/img/screens/dash/inbox.png" alt="" class="img-responsive rounded">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="https://ontwerpdeal.nl/img/screens/dash/calendar.png" alt="" class="img-responsive rounded">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="shadow-box">
                                <img src="https://ontwerpdeal.nl/img/screens/dash/invoice.png" alt="" class="img-responsive rounded">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
    <!-- ./Why DashCore -->
<section class="section bg-light">
    @if(!empty($section4))
    <div class="container bring-to-front pb-0">
        <div class="section-heading text-center w-75 mx-auto">
        <h2>{{ $section4->title }}</h2>
        <p class="lead text-secondary">{{ $section4->description }}</p>
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
                        <h2 class="bold mb-4">{{ $section4->designerHeading }}</h2>
                        <p class="lead text-secondary">{{ $section4->designerTxt }}</p>
                    </div>
                    <div class="col-lg-6">
                        <figure class="px-2">
                            <img src="{{ asset('/public/assets/images/section/') }}/{{$section4->designerImg }}" class="img-responsive shadow rounded" alt="{{ $section4->designerHeading }}">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="developers">
                <div class="row gap-y">
                    <div class="col-lg-6">
                        <h2 class="bold mb-4">{{ $section4->developerHeading }}</h2>
                        <p class="lead text-secondary">{{ $section4->developerHeading }}</p>
                    </div>
                    <div class="col-lg-6">
                        <figure class="px-2">
                            <img src="{{ asset('/public/assets/images/section/') }}/{{$section4->developerImg }}" class="img-responsive shadow rounded" alt="{{ $section4->developerHeading }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @else
    <div class="container bring-to-front pb-0">
        <div class="section-heading text-center w-75 mx-auto">
        <h2>Why Dashcore template?</h2>
        <p class="lead text-secondary">When you're looking for a template you want it to stand-out. Dashcore comes
            with
            hundreds of customizable features addressed to developers and designers.</p>
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
                        <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Culpa
                            cumque deleniti facere ipsa laborum saepe, tenetur ullam? Consequatur, deserunt eaque
                            facilis hic, illo laboriosam minima quae quia temporibus totam vel.</p>
                    </div>
                    <div class="col-lg-6">
                        <figure class="px-2">
                            <img src="https://ontwerpdeal.nl/img/screens/developer.png"
                                class="img-responsive shadow rounded" alt="...">
                        </figure>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="developers">
                <div class="row gap-y">
                    <div class="col-lg-6">
                        <h2 class="bold mb-4">Engaging designers with tons of design elements</h2>
                        <p class="lead text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Culpa
                            cumque deleniti facere ipsa laborum saepe, tenetur ullam? Consequatur, deserunt eaque
                            facilis hic, illo laboriosam minima quae quia temporibus totam vel.</p>
                    </div>
                    <div class="col-lg-6">
                        <figure class="px-2">
                            <img src="https://ontwerpdeal.nl/img/screens/designer.png"
                                class="img-responsive shadow rounded" alt="...">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
</section>
    <!-- ./How to Videos -->
@if(!empty($section5))
    <!-- ./How to Videos -->
<section class="section bg-darker edge top-left">
    <div class="container pt-8">
        <div class="section-heading text-center w-75 mx-auto">
            <i data-feather="film" width="36" height="36"></i>
            <h2 class="text-contrast bold">{{ $section5->title }}</h2>
            <p class="lead text-muted">
                {{ $section5->description }}
            </p>
        </div>

        <div class="row gap-y">
            @php
                $videoBox = \App\Models\FeaturepageModule::where('section','VideoBox')->get();
            @endphp
            @if(count($videoBox)>0)
            @foreach($videoBox as $vb)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-dark border-0">
                    <a href="{{ $vb->gridVideo }}"
                        class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                        style="background-image: url({{ asset('/public/assets/images/section/') }}/{{ $vb->logo }})"
                        data-effect="mfp-fade" data-type="iframe">
                        <div class="content text-center">
                            <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                        </div>
                    </a>

                    <div class="card-body">
                        <h4 class="card-title text-contrast">{{ $vb->videoHeading }}</h4>

                        <p class="card-text text-muted">{{ $vb->videoText }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-dark border-0">
                    <a href="https://www.youtube.com/watch?v=EykWcFEtFqo"
                        class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                        style="background-image: url(https://picsum.photos/350/200/?random&gravity=south)"
                        data-effect="mfp-fade" data-type="iframe">
                        <div class="content text-center">
                            <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                        </div>
                    </a>

                    <div class="card-body">
                        <h4 class="card-title text-contrast">Welcome to Dashcore</h4>

                        <p class="card-text text-muted">Discover how to get started with DashCore now.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-dark border-0">
                    <a href="https://www.youtube.com/watch?v=MXghcI8hcWU"
                        class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                        style="background-image: url(https://picsum.photos/350/200/?random&gravity=east)"
                        data-effect="mfp-fade" data-type="iframe">
                        <div class="content text-center">
                            <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                        </div>
                    </a>

                    <div class="card-body">
                        <h4 class="card-title text-contrast">Customizing theme</h4>

                        <p class="card-text text-muted">Learn how to fit the theme to your own needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card bg-dark border-0">
                    <a href="https://www.youtube.com/watch?v=HLG_s9b2Uuw"
                        class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                        style="background-image: url(https://picsum.photos/350/200/?random&gravity=north)"
                        data-effect="mfp-fade" data-type="iframe">
                        <div class="content text-center">
                            <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                        </div>
                    </a>

                    <div class="card-body">
                        <h4 class="card-title text-contrast">Using the API</h4>

                        <p class="card-text text-muted">Integrating the API with your new template.</p>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

    <!-- ./Single testimonial - Right -->
<section class="section singl-testimonial shadow">
    <div class="container-fluid py-0">
        <div class="row align-items-center gradient gradient-navy-blue text-contrast">
            <div class="col-md-7 image-background cover center-top"
                 style="background-image: url({{ asset('/public/assets/images/section/') }}/{{ $section5->quoteImage }});"></div>

            <div class="col-md-3 mx-auto py-4 py-md-0">
                <blockquote class="bold mt-1 text-contrast">
                    <i class="quote fas fa-quote-left"></i>
                    {{ $section5->quote }}
                </blockquote>

                <hr class="my-4">
                <div class="small text-contrast">
                    {!! $section5->quoteWriter !!}
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="section bg-darker edge top-left">
    <div class="container pt-8">
        <div class="section-heading text-center w-75 mx-auto">
        <i data-feather="film" width="36" height="36"></i>
        <h2 class="text-contrast bold">How to videos</h2>
        <p class="lead text-muted">
            Take a look at how you can take advantage of the tons of features
            included with our template.
        </p>
    </div>

    <div class="row gap-y">
                <div class="col-12 col-md-6 col-lg-4">
            <div class="card bg-dark border-0">
                <a href="https://www.youtube.com/watch?v=EykWcFEtFqo"
                    class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                    style="background-image: url(https://picsum.photos/350/200/?random&gravity=south)"
                    data-effect="mfp-fade" data-type="iframe">
                    <div class="content text-center">
                        <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                    </div>
                </a>

                <div class="card-body">
                    <h4 class="card-title text-contrast">Welcome to Dashcore</h4>

                    <p class="card-text text-muted">Discover how to get started with DashCore now.</p>
                </div>
            </div>
        </div>
                <div class="col-12 col-md-6 col-lg-4">
            <div class="card bg-dark border-0">
                <a href="https://www.youtube.com/watch?v=MXghcI8hcWU"
                    class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                    style="background-image: url(https://picsum.photos/350/200/?random&gravity=east)"
                    data-effect="mfp-fade" data-type="iframe">
                    <div class="content text-center">
                        <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                    </div>
                </a>

                <div class="card-body">
                    <h4 class="card-title text-contrast">Customizing theme</h4>

                    <p class="card-text text-muted">Learn how to fit the theme to your own needs.</p>
                </div>
            </div>
        </div>
                <div class="col-12 col-md-6 col-lg-4">
            <div class="card bg-dark border-0">
                <a href="https://www.youtube.com/watch?v=HLG_s9b2Uuw"
                    class="modal-popup mfp-iframe overlay gradient gradient-blue-purple alpha-3 p-6 image-background cover"
                    style="background-image: url(https://picsum.photos/350/200/?random&gravity=north)"
                    data-effect="mfp-fade" data-type="iframe">
                    <div class="content text-center">
                        <i data-feather="play" width="48" height="48" stroke-width="1" class="stroke-contrast"></i>
                    </div>
                </a>

                <div class="card-body">
                    <h4 class="card-title text-contrast">Using the API</h4>

                    <p class="card-text text-muted">Integrating the API with your new template.</p>
                </div>
            </div>
        </div>
            </div>
    </div>
</section>

    <!-- ./Single testimonial - Right -->
<section class="section singl-testimonial shadow">
    <div class="container-fluid py-0">
        <div class="row align-items-center gradient gradient-navy-blue text-contrast">
            <div class="col-md-7 image-background cover center-top"
                 style="background-image: url(https://ontwerpdeal.nl/img/testimonials/2.jpg);"></div>

            <div class="col-md-3 mx-auto py-4 py-md-0">
                <blockquote class="bold mt-1 text-contrast">
                    <i class="quote fas fa-quote-left"></i>
                    If your company is struggling to stay in business, there may be several options you can explore.
                    <span class="bold">Dashcore,</span> was the perfect template. It is very easy to implement, has
                    great design, and it has all the functionality we were looking for.
                </blockquote>

                <hr class="my-4">
                <div class="small text-contrast">
                    <span class="bold d-block">Jean Doe,</span>
                    CEO & Founder of Awesome Company
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ./FAQs -->
<section class="section bg-light edge bottom-right border-top">
    <div class="container">
        <div class="row">
            @if(!empty($section6))
            <div class="col-md-4">
                <h2>{{ $section6->title }}</h2>
                <p class="lead">{{ $section6->slogan }}</p>
                <p class="text-muted">{{ $section6->description }}</p>
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