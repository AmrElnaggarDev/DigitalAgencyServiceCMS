@extends('front.layouts.master')

@section('content')

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background={{asset("dist-front/img/page-title/page-title-1.jpg")}}></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2> {{ $service->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('services') }}">Services</a></li>
                                <li class="breadcrumb-item " aria-current="page">{{ $service->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- service details area start here -->
    <section class="service-detals pt-120 pb-100 fix">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="develop-wrapper">
                        <div class="develop-thumb">
                            <img src="{{asset('uploads/'. $service->photo)}}" alt="" style="width: 100%; height: auto;">
                        </div>
                        <div class="develop-content">
                            <p>
                                {!! $service->description !!}
                            </p>
                        </div>
                    </div>


                    <div class="choose-right aos-init aos-animate mt-4" data-aos="fade-left" data-aos-duration="1000">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                        How to process the function for development?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                     data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>There are many variations of passages of available but the majority have
                                            suffered alteration in that some form by injected randomised words which
                                            don’t look even as slightly believable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                        Where should I incorporate my business?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                     data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Web fonts are often terrible for web performance and none of the font loading
                                            strategies are particularly effective to address that. Upcoming font options
                                            may finally deliver on the promise.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                        How there are many variations of passages
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                    <div class="accordion-body">
                                        <p>Front-end and design are remarkably complex these days. That’s why we invite
                                            kind, smart folks from the community to run online workshops for all of us
                                            to learn together. And we have new ones.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="widget_categories grey-bg">
                            <h4 class="bs-widget-title pl-20">All Services</h4>
                            <ul>
                                @foreach($services as $service)
                                    <li><a href="{{route('service', $service->slug)}}">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service details area end here -->

                                <li><a href="{{route('service', 1)}}">App Development</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service details area end here -->

@endsection
