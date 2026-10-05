@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>{{ $team_member?->name ?? 'Team Member Details' }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('team_members') }}">Team Members</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $team_member?->name ?? 'Detail' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- team details area start -->
    @if(isset($team_member))
        <section class="team__details pt-120 pb-160">
            <div class="container">
                <div class="team__details-inner p-relative white-bg">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team__details-img w-img mr-70">
                                <img src="{{ $team_member->photo ? asset('uploads/'.$team_member->photo) : asset('dist-front/img/team/team-member-1.jpg') }}" alt="{{ $team_member->name }}">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team__details-content pt-105">
                                <span class="wow fadeInUp" data-wow-delay=".4s">{{ $team_member->designation }}</span>
                                <h3 class="wow fadeInUp" data-wow-delay=".6s">{{ $team_member->name }}</h3>
                                @if($team_member->short_description)
                                    <p class="wow fadeInUp" data-wow-delay=".8s">{{ $team_member->short_description }}</p>
                                @endif

                                <div class="team__details-contact mb-45">
                                    <ul>
                                        @if($team_member->email)
                                            <li class="wow fadeInUp" data-wow-delay="1s">
                                                <div class="icon theme-color">
                                                    <i class="fal fa-envelope"></i>
                                                </div>
                                                <div class="text theme-color">
                                                    <span><a href="mailto:{{ $team_member->email }}">{{ $team_member->email }}</a></span>
                                                </div>
                                            </li>
                                        @endif

                                        @if($team_member->phone)
                                            <li class="wow fadeInUp" data-wow-delay="1s">
                                                <div class="icon theme-color">
                                                    <i class="fas fa-phone-volume"></i>
                                                </div>
                                                <div class="text theme-color">
                                                    <span><a href="tel:{{ $team_member->phone }}">{{ $team_member->phone }}</a></span>
                                                </div>
                                            </li>
                                        @endif

                                        @if($team_member->address)
                                            <li class="wow fadeInUp" data-wow-delay="1s">
                                                <div class="icon">
                                                    <i class="fal fa-map-marker-alt"></i>
                                                </div>
                                                <div class="text">
                                                    <a href="javascript:void(0)">{{ $team_member->address }}</a>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>

                                <div class="team__details-social theme-social wow fadeInUp" data-wow-delay="1s">
                                    <ul>
                                        @if($team_member->facebook)
                                            <li>
                                                <a href="{{ $team_member->facebook }}" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($team_member->twitter)
                                            <li>
                                                <a href="{{ $team_member->twitter }}" target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($team_member->linkedin)
                                            <li>
                                                <a href="{{ $team_member->linkedin }}" target="_blank">
                                                    <i class="fab fa-linkedin"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($team_member->instagram)
                                            <li>
                                                <a href="{{ $team_member->instagram }}" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($team_member->description)
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="team__details-info mt-60">
                                <p class="wow fadeInUp" data-wow-delay=".6s">
                                    {!! $team_member->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @else
        <div class="container my-5 text-center">
            <div class="alert alert-danger">Team member not found.</div>
        </div>
    @endif
    <!-- team details area end -->
@endsection
