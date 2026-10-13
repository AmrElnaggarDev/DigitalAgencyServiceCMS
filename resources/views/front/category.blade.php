@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Category: {{ $category->name }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $category->name }}</li>
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

                        @foreach($posts as $post)
                            <div class="blog-wrap blog-item mb-50">
                                <div class="blog-thumb">
                                    <img src="{{ asset('uploads/'.$post->photo) }}" alt="blog">
                                </div>
                                <div class="blog-details blog-details-2">
                                    <ul class="blog-meta">
                                        <li><span><i class="fal fa-clock"></i> {{ $post->created_at->format('d M') }}</span></li>
                                        <li>
                                            @if($post->category)
                                                <a href="{{ route('blog.category', $post->category->slug) }}"><i class="fal fa-folder"></i> {{ $post->category->name }}</a>
                                            @endif
                                        </li>
                                    </ul>
                                    <h3 class="blog-title">
                                        <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p>{{ $post->short_description }}</p>
                                    @if($post->tags)
                                        <div class="blog-tag mb-20">
                                            <span>Tags: </span>
                                            @foreach(explode(',', $post->tags) as $singleTag)
                                                <a href="{{ route('blog.tag', trim($singleTag)) }}">{{ trim($singleTag) }}@if(!$loop->last),@endif</a>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="blog-btn mt-25">
                                        <a href="{{ route('post', $post->slug) }}" class="tp-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center mt-30">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">

                                    @if($posts->hasPages())
                                        {{-- Previous Page Link --}}
                                        @if (!$posts->onFirstPage())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $posts->previousPageUrl() }}">
                                                    <i class="fas fa-arrow-left"></i>
                                                </a>
                                            </li>
                                        @endif
                                        {{-- Pagination Elements --}}
                                        @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                            <li class="page-item {{ ($page == $posts->currentPage()) ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        {{-- Next Page Link --}}
                                        @if ($posts->hasMorePages())
                                            <li class="page-item next-page">
                                                <a class="page-link" href="{{ $posts->nextPageUrl() }}">
                                                    <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </li>
                                        @endif
                                    @endif

                                </ul>
                            </nav>
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
