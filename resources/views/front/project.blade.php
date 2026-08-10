@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Project Title Here</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('projects') }}">Projects</a></li>
                                <li class="breadcrumb-item " aria-current="page">Project Title Here</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- project details area start  -->
    <section class="project-details-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="project-big-thumb">
                        <img src="{{ asset('dist-front/img/portfolio/portfolio-big-img.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                    <div class="p-details-content mb-40">
                        <h3>Fimlor Experience</h3>
                        <p>Need something changed or is there something not quite working the way you envisaged? Is your van a little old and tired and need refreshing? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                        <p>Need something changed or is there something not quite working the way you envisaged? Is your van a little old and tired and need refreshing? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="sidebar-wrap mb-40">
                        <div class="sidebar-right">
                            <div class="sidebar-single">
                                <label>Clients:</label>
                                <span>Jessica Brown</span>
                            </div>
                            <div class="sidebar-single">
                                <label>Category:</label>
                                <span>Design, Development</span>
                            </div>
                            <div class="sidebar-single">
                                <label>Value:</label>
                                <span>Jessica Brown</span>
                            </div>
                            <div class="sidebar-single">
                                <label>Date:</label>
                                <span>20 June, 2021</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project detials area end  -->

    <!-- pagination area  -->
    <div class="portfolio__pagination-wrapper">
        <div class="container">
            <div class="pagination-border pt-40 pb-40">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="portfolio__pagination">
                            <a href="{{ route('project', 1) }}" class="link-btn-2">
                                <i class="fal fa-long-arrow-left"></i>
                                Next
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="portfolio__pagination text-end">
                            <a href="{{ route('project', 1) }}" class="link-btn-2">
                                Prev
                                <i class="fal fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pagination area  end-->


@endsection
