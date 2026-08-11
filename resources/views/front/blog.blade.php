@extends('front.layouts.master')

@section('content')

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item " aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- blog area start -->
    <section class="blog__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__wrapper pr-50">
                        <div class="blog-wrap blog-item mb-50">
                            <div class="blog-thumb">
                                <img src="{{ asset('dist-front/img/blog/blog-big-1.jpg') }}" alt="blog">
                            </div>
                            <div class="blog-details blog-details-2">
                                <ul class="blog-meta">
                                    <li><a href="#"><i class="fal fa-clock"></i> 20 JUN</a></li>
                                    <li><a href="#"><i class="fal fa-user-circle"></i> Tania</a></li>
                                    <li><a href="#"><i class="fal fa-comments"></i> 2 Comments</a></li>
                                </ul>
                                <h3 class="blog-title">
                                    <a href="{{ route('post', 1) }}">basic rules of running web agency business</a>
                                </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum.</p>
                                <div class="blog-btn mt-25">
                                    <a href="{{ route('post', 1) }}" class="tp-btn">Read More</a>
                                </div>
                            </div>
                        </div>

                        <div class="blog-wrap blog-item mb-50">
                            <div class="blog-thumb">
                                <img src="{{ asset('dist-front/img/blog/blog-big-1.jpg') }}" alt="blog">
                            </div>
                            <div class="blog-details blog-details-2">
                                <ul class="blog-meta">
                                    <li><a href="#"><i class="fal fa-clock"></i> 20 JUN</a></li>
                                    <li><a href="#"><i class="fal fa-user-circle"></i> Tania</a></li>
                                    <li><a href="#"><i class="fal fa-comments"></i> 2 Comments</a></li>
                                </ul>
                                <h3 class="blog-title">
                                    <a href="{{ route('post', 1) }}">basic rules of running web agency business</a>
                                </h3>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum.</p>
                                <div class="blog-btn mt-25">
                                    <a href="{{ route('post', 1) }}" class="tp-btn">Read More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="basic-pagination wow fadeInUp mt-30" data-wow-delay=".2s">
                                <ul class="d-flex align-items-center">
                                    <li class="prev">
                                        <a href="blog.html" class="link-btn link-prev">
                                            Prev
                                            <i class="fal fa-long-arrow-left"></i>
                                            <i class="fal fa-long-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            <span>1</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="blog.html">
                                            <span>2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.html">
                                            <span>3</span>
                                        </a>
                                    </li>
                                    <li class="next">
                                        <a href="blog.html" class="link-btn">
                                            Next
                                            <i class="fal fa-long-arrow-right"></i>
                                            <i class="fal fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog__sidebar">
                        @include('front.layouts.blog_sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->

@endsection
