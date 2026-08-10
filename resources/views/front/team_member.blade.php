@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Brant Grundy</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('team_members') }}">Team Members</a></li>
                                <li class="breadcrumb-item " aria-current="page">Brant Grundy</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->


    <!-- team details area start -->
    <section class="team__details pt-120 pb-160">
        <div class="container">
            <div class="team__details-inner p-relative white-bg">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="team__details-img w-img mr-70">
                            <img src="{{ asset('dist-front/img/team/details/team-01.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="team__details-content pt-105">
                            <span class="wow fadeInUp" data-wow-delay=".4s">UI/UX Designer</span>
                            <h3 class="wow fadeInUp" data-wow-delay=".6s">Brant Grundy</h3>
                            <p class="wow fadeInUp" data-wow-delay=".8s">So I said on your bike mate easy peasy dropped a clanger blow  porkies is fantastic show off show.!</p>
                            <div class="team__details-contact mb-45">
                                <ul>
                                    <li class="wow fadeInUp" data-wow-delay="1s">
                                        <div class="icon theme-color ">
                                            <i class="fal fa-envelope"></i>
                                        </div>
                                        <div class="text theme-color ">
                                            <span><a href="mailto:support@zibber.com">support@zibber.com</a></span>
                                        </div>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="1s">
                                        <div class="icon theme-color">
                                            <i class="fas fa-phone-volume"></i>
                                        </div>
                                        <div class="text theme-color">
                                            <span><a href="tel:(+642)-394-396-432">(+642) 394 396 432</a></span>
                                        </div>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="1s">
                                        <div class="icon">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="text">
                                            <a target="_blank" href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">Ave 14th Street, Mirpur 210, <br> San Franciso, USA 3296.</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="team__details-social theme-social wow fadeInUp" data-wow-delay="1s">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-vimeo-v"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="team__details-info mt-60">
                        <h4 class="wow fadeInUp" data-wow-delay=".4s">Information</h4>
                        <p class="wow fadeInUp" data-wow-delay=".6s">jolly good codswallop what a plonker he nicked it bog-standard porkies gosh the full monty, wind up at public school hanky panky cheeky bugger Richard do one some dodgy chav bite your arm off. Argy-bargy excuse my French brown bread up the duff bleeder fanny around spend a penny barmy bonnet, bubble and squeak brolly bugger no biggie smashing get stuffed mate old lurgy, cup of tea nice one mufty that I knackered some dodgy chav. Say vagabond morish crikey excuse my French bonnet William blatant spend a penny, knackered bite your arm off what a plonker blimey smashing a blinding shot pardon me grub, wind up cracking goal Jeffrey hanky panky are you taking the piss such a fibber hunky-dory.</p>
                        <p class="wow fadeInUp" data-wow-delay=".8s">So I said on your bike mate easy peasy dropped a clanger blow off porkies is fantastic show off show off pick your nose and blow off, faff about bubble and squeak bugger all mate happy days hotpot don't get shirty with me jolly good gormless barmy.</p>

                        <a href="contact.html" class="tp-btn mt-10 wow fadeInUp" data-wow-delay="1s">Appionment</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team details area end -->



@endsection
