@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Team Members</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Team Members</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->


    <!-- team  -->
    <div class="team-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-1.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Philimia Darwin</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-2.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Hilixa Maria</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-3.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Willamson Hilai</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-7.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Limonda Pwedie</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-8.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Limonda Pwedie</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="tpteam text-center mb-60">
                        <div class="tpteam__img">
                            <img src="{{ asset('dist-front/img/team/team-member-9.jpg') }}" alt="">
                            <div class="tpteam__social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="tpteam__text">
                            <h3 class="tpteam-title"><a href="{{route('team_member', 1)}}">Limonda Pwedie</a></h3>
                            <h5>Designer</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team  -->

@endsection
