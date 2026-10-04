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
                @foreach($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="mfbox mfbox-white">
                            <div class="mf-shape"></div>
                            <div class="mfbox__icon mb-15">
                                <i class="{{ $service->icon }}"></i>
                            </div>
                            <div class="mfbox__text">
                                <h3 class="mf-title">
                                    <a href="{{ route('service', $service->slug) }}">
                                        {{ $service->title }}
                                    </a>
                                </h3>
                                <p> {{ $service->short_description }}</p>
                            </div>
                            <div class="mf-btn">
                                <a class="squire-btn" href="{{route('service', $service->slug)}}"><i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                    <div class="col-lg-12 d-flex justify-content-center mt-30">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                @if($services->hasPages())
                                    {{-- Previous Page Link --}}
                                    @if (!$services->onFirstPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $services->previousPageUrl() }}">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                    @endif
                                    {{-- Pagination Elements --}}
                                    @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                                        <li class="page-item {{ ($page == $services->currentPage()) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach
                                    {{-- Next Page Link --}}
                                    @if ($services->hasMorePages())
                                        <li class="page-item next-page">
                                            <a class="page-link" href="{{ $services->nextPageUrl() }}">
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
    </div>
    <!-- services end -->


@endsection
