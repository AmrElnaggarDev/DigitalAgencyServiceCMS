@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Pricing</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Pricing</li>
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
                @foreach($packages as $package)
                    <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="pricing__item {{ $package->is_featured == 'Yes' ? 'active' : '' }} text-center transition-3 mb-30">
                            <div class="pricing__header mb-25">
                                <h3>{{ $package->heading }}</h3>
                                <p>{{ $package->subheading }}</p>
                            </div>
                            <div class="pricing__tag d-flex align-items-start justify-content-center mb-30">
                                <span>{{ $package->currency_symbol }}</span>
                                <h4>{{ $package->price }}</h4>
                            </div>
                            <div class="pricing__buy mb-20">
                                <a href="{{ route('contact') }}" class="tp-btn w-100"> <span></span> Buy Now</a>
                            </div>
                            <div class="pricing__features text-start">
                                <ul>
                                    @foreach($package->features as $feature)
                                        <li>{{ $feature->feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- pricing area end -->
@endsection
