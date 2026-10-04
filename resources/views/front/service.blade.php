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

                            @foreach($service->faqs as $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <p>{!! nl2br($faq->answer) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
