@extends('front.layouts.master')

@section('content')


    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{asset("dist-front/img/page-title/page-title-1.jpg")}}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- services -->
    <div class="main-services grey-bg pt-120 pb-90" data-background="{{asset("dist-front/img/pattern/pt1.png")}}">
        <div class="container">
            <div class="row text-center">
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="mfbox mfbox-white">
                        <div class="mf-shape"></div>
                        <div class="mfbox__icon mb-15">
                            <i class="flaticon-insight"></i>
                        </div>
                        <div class="mfbox__text">
                            <h3 class="mf-title">Fully Responsive for <br>
                                all devices</h3>
                            <p>Lorem Ipsum is simply dummy text of free available in market the printing and typesetting industry.</p>
                        </div>
                        <div class="mf-btn">
                            <a class="squire-btn" href="{{route('service', 1)}}"><i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="mfbox mfbox-white">
                        <div class="mf-shape"></div>
                        <div class="mfbox__icon mb-15">
                            <i class="flaticon-remarketing"></i>
                        </div>
                        <div class="mfbox__text">
                            <h3 class="mf-title">Largest Business<br> experts</h3>
                            <p>Lorem Ipsum is simply dummy text of free available in market the printing and typesetting industry.</p>
                        </div>
                        <div class="mf-btn">
                            <a class="squire-btn" href="{{ route('service', 1) }}"><i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                    <div class="mfbox mfbox-white">
                        <div class="mf-shape"></div>
                        <div class="mfbox__icon mb-15">
                            <i class="flaticon-technical-support"></i>
                        </div>
                        <div class="mfbox__text">
                            <h3 class="mf-title">SEO & Content <br>
                                writting</h3>
                            <p>Lorem Ipsum is simply dummy text of free available in market the printing and typesetting industry.</p>
                        </div>
                        <div class="mf-btn">
                            <a class="squire-btn" href="{{ route('service', 1) }}"><i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services end -->


@endsection
