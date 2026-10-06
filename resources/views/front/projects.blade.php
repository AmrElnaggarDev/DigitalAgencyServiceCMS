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
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-6 grid-item">
                        <div class="tportfolio mb-30">
                            <div class="tportfolio__img">
                                <a class="popup-image" href="{{ asset('uploads/'.$project->photo) }}" data-fancybox="gallery">
                                    <img src="{{ asset('uploads/'.$project->photo) }}" alt="{{ $project->title }}" style="width: 100%; height: 260px; object-fit: cover;" />
                                </a>
                                <div class="tportfolio__text tportfolio__text-2">
                                    <h3 class="tportfolio-title"><a href="{{ route('project', $project->slug) }}">{{ $project->title }}</a></h3>
                                    <h4>{{ $project->category }}</h4>
                                    <div class="portfolio-plus">
                                        <a href="{{ asset('uploads/'.$project->photo) }}" data-fancybox="gallery">
                                            <i class="fal fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center mt-30">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            @if($projects->hasPages())
                                {{-- Previous Page Link --}}
                                @if (!$projects->onFirstPage())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $projects->previousPageUrl() }}">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                @endif
                                {{-- Pagination Elements --}}
                                @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $projects->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                {{-- Next Page Link --}}
                                @if ($projects->hasMorePages())
                                    <li class="page-item next-page">
                                        <a class="page-link" href="{{ $projects->nextPageUrl() }}">
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
