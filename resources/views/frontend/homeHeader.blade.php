@php
    $section1 = \App\Models\HomepageModule::where(['section'=>'Section1'])->orderBy('id','DESC')->first();
@endphp
<!-- ./Page header -->
            <header class="section header text-contrast automate-social-header">
                <div class="shape-wrapper">
                    <div class="shape shape-background shape-main gradient gradient-blue-purple"></div>
                    <div class="shape shape-background shape-main shadow"></div>
                    <div class="shape shape-background shape-top"></div>
                    <div class="shape shape-background shape-right"></div>
                </div>

                @if(empty($section1))
                <div class="container overflow-hidden">
                    <div class="row gap-y">
                        <div class="col-lg-6">
                            <h1 class="text-contrast extra-bold display-md-3 display-lg-2 font-lg mb-5">Automate <span class="d-block light font-md">campaign management</span></h1>
                            <p class="text-contrast lead">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolore excepturi explicabo, harum in laudantium nulla officiis reprehenderit!
                            </p>

                            <form method="post" action="#" class="form" novalidate="novalidate">
                                <input type="hidden" name="_token" value="vzMWydesiCXNEZGqKYtJmjgnny8nwB7NSPszOjpm" />
                                <div class="input-group-register py-4">
                                    <input type="email" name="Subscribe[email]" class="form-control shadow-lg bg-contrast rounded-pill" placeholder="Enter your email" required />
                                    <button class="btn btn-rounded btn-primary btn-lg rounded-pill" type="submit">
                                        <i class="fa fa-rocket d-inline d-md-none"></i>
                                        <span class="d-none d-md-inline">Start Free Trial</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="container overflow-hidden">
                    <div class="row gap-y">
                        <div class="col-lg-6">
                            <h1 class="text-contrast extra-bold display-md-3 display-lg-2 font-lg mb-5">{{ $section1->title }} <span class="d-block light font-md">{{ $section1->slogan }}</span></h1>
                            <p class="text-contrast lead">
                                {{ $section1->description }}
                            </p>
                            
                            <a href="{{ $section1->btnUrl }}" class="btn btn-rounded btn-primary btn-lg rounded-pill" type="submit">
                                <i class="fa fa-rocket d-inline d-md-none"></i>
                                <span class="d-none d-md-inline">{{ $section1->btnTxt }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="main-shape-wrapper">
                    <div class="bubbles-wrapper">
                        <div data-aos="fade-up">
                            <figure>
                            @if(empty($section1->logo))
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/main-shape.svg" class="img-responsive main-shape floating" alt="" />
                            @else
                                <img src="{{ asset('/') }}/public/assets/images/section/{{ $section1->logo }}" class="img-responsive main-shape floating" alt="" />
                            @endif
                            </figure>
                        </div>

                        <ul class="animations m-0">
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xxl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/smile.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/heart.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-lg">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/heart.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/smile.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xxl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/smile.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xxl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/heart.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/smile.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-lg">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xxl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/heart.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xxl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/heart.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-xl">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/smile.svg" alt="" class="img-responsive" />
                            </li>
                            <li class="bubble icon icon-lg">
                                <img src="{{ asset('/') }}/assets/img/automate-social/header/like.svg" alt="" class="img-responsive" />
                            </li>
                        </ul>
                    </div>
                </div>
            </header>