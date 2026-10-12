@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Photo Gallery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Photo Gallery</li>
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
                @foreach($photos as $photo)
                    <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                        <div class="tportfolio mb-30">
                            <div class="tportfolio__img">
                                <a class="popup-image" href="{{ asset('uploads/'.$photo->photo) }}" data-fancybox="gallery">
                                    <img src="{{ asset('uploads/'.$photo->photo) }}" alt="" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover;" />
                                </a>
                                @if($photo->caption)
                                    <div class="tportfolio__text tportfolio__text-2 text-center">
                                        <h4>{{ $photo->caption }}</h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center mt-30">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            @if($photos->hasPages())
                                {{-- Previous Page Link --}}
                                @if (!$photos->onFirstPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $photos->previousPageUrl() }}">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                @endif
                                {{-- Pagination Elements --}}
                                @foreach ($photos->getUrlRange(1, $photos->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $photos->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                {{-- Next Page Link --}}
                                @if ($photos->hasMorePages())
                                    <li class="page-item next-page">
                                        <a class="page-link" href="{{ $photos->nextPageUrl() }}">
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
    </section>
    <!-- / END PORTFOLIO DESIGN AREA -->

@endsection
