@extends('front.layouts.master')

@section('content')

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Post Title Here</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item " aria-current="page">Post Title Here</li>
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
                                    <a href="blog-details.html">basic rules of running web agency business</a>
                                </h3>
                                <div class="blog-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable. If you are going to use a passage of
                                        Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                        middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                                        predefined chunks as necessary, making this the first true generator on the
                                        Internet. It uses a dictionary of over 200 Latin words, combined with a handful
                                        of model sentence structures, to generate Lorem Ipsum which looks reasonable.
                                        The generated Lorem Ipsum is therefore always free from repetition, injected
                                        humour, or non-characteristic words etc.</p>
                                </div>
                                <div class="blog-text mb-40">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English. Many desktop
                                        publishing packages and web page editors now use Lorem Ipsum as their default
                                        model text, and a search for 'lorem ipsum' will uncover many web sites still in
                                        their infancy. Various versions have evolved over the years, sometimes by
                                        accident, sometimes on purpose injected humour and the like.</p>
                                </div>
                                <div class="blog-info d-sm-flex align-items-center justify-content-between mb-40">
                                    <div class="blog-tag">
                                        <span>Tags: </span>
                                        <a href="#"> Business,</a>
                                        <a href="#">Agency,</a>
                                        <a href="#">Technology</a>
                                    </div>
                                    <div class="blog-category">
                                        <span>Category: </span>
                                        <a href="#"> Business</a>
                                        <a href="#">Agency</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__author mb-95 d-md-flex wow fadeInUp" data-wow-delay=".4s">
                            <div class="blog__author-img mr-30">
                                <img src="{{ asset('dist-front/img/blog/author/author-1.jpg') }}" alt="">
                            </div>
                            <div class="blog__author-content">
                                <h5>Sophie Ianiro</h5>
                                <div class="blog__author-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"> <i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <p>I said cracking goal down the pub blag cheeky bugger at public school A bit of how's
                                    your father boot.!</p>
                            </div>
                        </div>
                        <div class="post-comments mb-95 wow fadeInUp" data-wow-delay=".6s">
                            <div class="post-comment-title mb-40">
                                <h3>Comments</h3>
                            </div>
                            <div class="latest-comments">
                                <ul>
                                    <li>
                                        <div class="comments-box">
                                            <div class="comments-avatar">
                                                <img src="{{ asset('dist-front/img/blog/comment/comments-1.png') }}" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>David Angel Makel</h5>
                                                    <span class="post-meta">October 26, 2020</span>
                                                </div>
                                                <p>The bee's knees bite your arm off bits and bobs he nicked it gosh
                                                    gutted mate blimey, old off his nut argy bargy vagabond buggered
                                                    dropped.</p>
                                                <a href="#" class="comment-reply"> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comments-box">
                                            <div class="comments-avatar">
                                                <img src="{{ asset('dist-front/img/blog/comment/comments-rep-1.png') }}" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Bailey Wonger</h5>
                                                    <span class="post-meta">October 27, 2020</span>
                                                </div>
                                                <p>Do one say wind up buggered bobby bite your arm off gutted mate,
                                                    David victoria sponge cup of char chap fanny around.</p>
                                                <a href="#" class="comment-reply"> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comments-box">
                                            <div class="comments-avatar">
                                                <img src="{{ asset('dist-front/img/blog/comment/comments-rep-2.png') }}" alt="">
                                            </div>
                                            <div class="comments-text">
                                                <div class="avatar-name">
                                                    <h5>Hilary Ouse</h5>
                                                    <span class="post-meta">October 28, 2020</span>
                                                </div>
                                                <p>Baking cakes is cobblers wellies William geeza bits and bobs what a
                                                    plonker it's your round,</p>
                                                <a href="#" class="comment-reply">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-comment-form wow fadeInUp" data-wow-delay=".2s">
                            <h4>Leave a Reply </h4>
                            <span>Your email address will not be published.</span>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="post-input">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="post-input">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="post-input">
                                            <input type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="post-input">
                                            <textarea placeholder="Your message..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="post-check mb-40">
                                            <input type="checkbox">
                                            <span>Save my name, email, and website in this browser for the next time I comment.</span>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="tp-btn">Send Message</button>
                            </form>
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
