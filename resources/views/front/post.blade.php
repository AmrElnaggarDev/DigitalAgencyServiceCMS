@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>{{ $post->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $post->title }}</li>
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
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="blog">
                            </div>
                            <div class="blog-details blog-details-2">
                                <ul class="blog-meta">
                                    <li><span><i class="fal fa-clock"></i> {{ $post->created_at->format('d M Y') }}</span></li>
                                    <li>
                                        @if($post->category)
                                            <a href="{{ route('blog.category', $post->category->slug) }}"><i class="fal fa-folder"></i> {{ $post->category->name }}</a>
                                        @endif
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    {!! $post->description !!}
                                </div>
                                <div class="blog-info d-sm-flex align-items-center justify-content-between mb-40 mt-40">
                                    <div class="blog-tag">
                                        @if($post->tags)
                                            <span>Tags: </span>
                                            @foreach(explode(',', $post->tags) as $tag)
                                                <a href="{{ route('blog.tag', trim($tag)) }}">{{ trim($tag) }}@if(!$loop->last),@endif</a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="blog-category">
                                        <span>Category: </span>
                                        @if($post->category)
                                            <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment Section Placeholder: Will be implemented later -->
                        <div class="post-comments mb-95 wow fadeInUp" data-wow-delay=".6s">
                            <div class="post-comment-title mb-40">
                                <h3>Comments (0)</h3>
                            </div>
                            <div class="latest-comments">
                                <p>Comments feature coming soon.</p>
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
