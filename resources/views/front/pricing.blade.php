@extends('front.layouts.master')

@section('content')

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background={{asset("dist-front/img/page-title/page-title-1.jpg")}}></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Pricing</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">pricing</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- pricing area start -->
    <section class="pricing__area pt-100 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="pricing__item text-center transition-3 mb-30">
                        <div class="pricing__header mb-25">
                            <h3>Personal</h3>
                            <p>What You Are Looking For!</p>
                        </div>
                        <div class="pricing__tag d-flex align-items-start justify-content-center mb-30">
                            <span>$</span>
                            <h4>26</h4>
                        </div>
                        <div class="pricing__switch mb-10">
                            <button type="button">Switch to yearly billing</button>
                        </div>
                        <div class="pricing__buy mb-20">
                            <a href="#" class="tp-btn w-100"> <span></span> Buy Now</a>
                        </div>
                        <div class="pricing__features text-start">
                            <ul>
                                <li>Powerful Admin Panel</li>
                                <li>1 Native Android App</li>
                                <li>Multi-Language Support</li>
                                <li>Free SSL Certificate</li>
                                <li>1X Allocated Resources</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="pricing__item text-center transition-3 mb-30">
                        <div class="pricing__header mb-25">
                            <h3>Professional</h3>
                            <p>What You Are Looking For!</p>
                        </div>
                        <div class="pricing__tag d-flex align-items-start justify-content-center mb-30">
                            <span>$</span>
                            <h4>44</h4>
                        </div>
                        <div class="pricing__switch mb-10">
                            <button type="button">Switch to yearly billing</button>
                        </div>
                        <div class="pricing__buy mb-20">
                            <a href="#" class="tp-btn w-100"> <span></span> Buy Now</a>
                        </div>
                        <div class="pricing__features text-start">
                            <ul>
                                <li>Powerful Admin Panel</li>
                                <li>1 Native Android App</li>
                                <li>Multi-Language Support</li>
                                <li>Free SSL Certificate</li>
                                <li>1X Allocated Resources</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="pricing__item active text-center transition-3 mb-30">
                        <div class="pricing__header mb-25">
                            <h3>Pro Store</h3>
                            <p>What You Are Looking For!</p>
                        </div>
                        <div class="pricing__tag d-flex align-items-start justify-content-center mb-30">
                            <span>$</span>
                            <h4>66</h4>
                        </div>
                        <div class="pricing__switch mb-10">
                            <button type="button">Switch to yearly billing</button>
                        </div>
                        <div class="pricing__buy mb-20">
                            <a href="#" class="tp-btn w-100"> <span></span> Buy Now</a>
                        </div>
                        <div class="pricing__features text-start">
                            <ul>
                                <li>Powerful Admin Panel</li>
                                <li>1 Native Android App</li>
                                <li>Multi-Language Support</li>
                                <li>Free SSL Certificate</li>
                                <li>1X Allocated Resources</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="pricing__item text-center transition-3 mb-30">
                        <div class="pricing__header mb-25">
                            <h3>Business</h3>
                            <p>What You Are Looking For!</p>
                        </div>
                        <div class="pricing__tag d-flex align-items-start justify-content-center mb-30">
                            <span>$</span>
                            <h4>89</h4>
                        </div>
                        <div class="pricing__switch mb-10">
                            <button type="button">Switch to yearly billing</button>
                        </div>
                        <div class="pricing__buy mb-20">
                            <a href="#" class="tp-btn w-100"> <span></span> Buy Now</a>
                        </div>
                        <div class="pricing__features text-start">
                            <ul>
                                <li>Powerful Admin Panel</li>
                                <li>1 Native Android App</li>
                                <li>Multi-Language Support</li>
                                <li>Free SSL Certificate</li>
                                <li>1X Allocated Resources</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pricing area end -->

@endsection
