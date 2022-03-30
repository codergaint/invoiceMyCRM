@php
    $feature =  \App\Models\FeaturepageModule::where('section','featurePageDetailsSection')->orderBy('id','DESC')->first();
@endphp
<header class="page header text-white bg-primary">
    <div class="container">
        <div class="row">
            @if(!empty($feature))
            <div class="col-md-10 mx-auto text-center">
                <h1 class="bold font-md font-md-lg text-white">{{ $feature->title }}</h1>
                <p class="lead">{{ $feature->description }}</p>
                <a href="{{ $feature->btnUrl }}" class="btn btn-primary btn-lg btn-rounded bold px-4 mt-4">{{ $feature->btnTxt }}</a>
            </div>
            @else
            <div class="col-md-10 mx-auto text-center">
                <h1 class="bold font-md font-md-lg">DashCore fully integrates with multiple tools, it will make your
                    customization experience a breeze</h1>
                <p class="lead text-muted">From a simple HTML page to a complete module bundler, even a task runner,
                    DashCore comes with ease integration for every need</p>
                <a href="#!" class="btn btn-primary btn-lg btn-rounded bold px-4 mt-4">Join DashCore</a>
            </div>
            @endif
        </div>
    </div>
    <!-- <div class="bubbles-wrap">
        <div class="bubbles-container"></div>
    </div> -->
</header>
        
            <div class="position-relative">
                <div class="shape-divider shape-divider-bottom shape-divider-fluid-x text-contrast">
                    <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z"></path>
                    </svg>
                </div>
            </div>