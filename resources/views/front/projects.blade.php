@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{asset("dist-front/img/page-title/page-title-1.jpg")}}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Projects</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item " aria-current="page">projects</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- START PORTFOLIO DESIGN AREA -->
    <section class="portfolio-area pt-120 pb-120">
        <div class="container">
            <div id="portfolio-grid" class="row row-portfolio">
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-1.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-1.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route('project', 1) }}">Binifox Busines</a></h3>
                                <h4>Busines, Agency</h4>

                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-1.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-2.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-2.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route ('project', 1) }}">Marketing Analysis</a>
                                </h3>
                                <h4>Consultation, Idea</h4>
                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-2.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-3.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-3.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route ('project', 1) }}">Busines Idea</a></h3>
                                <h4>Deaign, Brand</h4>
                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-3.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-4.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-4.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route ('project', 1) }}">Logo Design</a></h3>
                                <h4>Print, Market</h4>
                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-4.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-5.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-5.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route ('project', 1) }}">Digital Marketing</a></h3>
                                <h4>Logo, Busines</h4>
                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-5.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                    <div class="tportfolio mb-30">
                        <div class="tportfolio__img">
                            <a class="popup-image" href="{{asset("dist-front/img/portfolio/port-6.jpg")}}" data-fancybox="gallery">
                                <img src="{{asset("dist-front/img/portfolio/port-6.jpg")}}" alt=""/>
                            </a>
                            <div class="tportfolio__text tportfolio__text-2">
                                <h3 class="tportfolio-title"><a href="{{ route ('project', 1) }}">Super Experience</a></h3>
                                <h4>Market, Idea</h4>
                                <div class="portfolio-plus">
                                    <a href="{{asset("dist-front/img/portfolio/port-6.jpg")}}" data-fancybox="gallery">
                                        <i class="fal fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / END PORTFOLIO DESIGN AREA -->


@endsection
