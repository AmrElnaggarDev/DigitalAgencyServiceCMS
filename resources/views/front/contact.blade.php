@extends('front.layouts.master')

@section('content')

    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- contact area  -->
    <section class="contact-area pt-120 pb-80 fix">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-lg-6">
                    <div class="section-title-wrapper mb-15">
                        <h5 class="section-subtitle mb-20">contact with us</h5>
                        <h2 class="section-title">Speak with our
                            consultant</h2>
                    </div>
                    <div class="contact-info mr-50 mr-xs-0 mr-md-0">
                        @php $contactItem = $contact_page_item; @endphp
                        @if($contactItem && $contactItem->phone)
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fad fa-comments"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>Call Anytime</span>
                                    <h5><a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactItem->phone) }}">{{ $contactItem->phone }}</a></h5>
                                </div>
                            </div>
                        @endif

                        @if($contactItem && $contactItem->email)
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>send email</span>
                                    <h5><a href="mailto:{{ $contactItem->email }}">{{ $contactItem->email }}</a></h5>
                                </div>
                            </div>
                        @endif

                        @if($contactItem && $contactItem->address)
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-info-icon">
                                    <a href="#"><i class="fal fa-map-marker-alt"></i></a>
                                </div>
                                <div class="contact-info-text mt-10">
                                    <span>visit office</span>
                                    <h5>{{ $contactItem->address }}</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xxl-7 col-xl-6 col-lg-6">
                    <div class="contact-form">
                        @if(session('success'))
                            <div class="alert alert-success mb-3">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                        @endif
                        <form action="{{ route('contact.submit') }}" id="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                    <input name="name" type="text" placeholder="Your Name" value="{{ old('name') }}">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                    <input name="email" type="email" placeholder="Email Adress" value="{{ old('email') }}">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                    <input name="phone" type="text" placeholder="Phone" value="{{ old('phone') }}">
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 mb-20">
                                    <input name="subject" type="text" placeholder="Subject" value="{{ old('subject') }}">
                                </div>
                                <div class="col-xxl-12 col-xl-12 col-lg-12 mb-20">
                                    <textarea placeholder="Write Massage" name="massage">{{ old('massage') }}</textarea>
                                </div>
                                <div class="col-xxl-12 col-xl-12 mb-20">
                                    <button type="submit" class="tp-btn">Send a message</button>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    @if($contactItem && $contactItem->map_iframe)
        <!-- contact map area  -->
        <div class="contact-map">
            <div id="contact-map">
                {!! $contactItem->map_iframe !!}
            </div>
        </div>
        <!-- contact map area end  -->
    @endif
@endsection
