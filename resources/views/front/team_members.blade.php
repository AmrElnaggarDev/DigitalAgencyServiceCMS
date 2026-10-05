@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>Team Members</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Team Members</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->

    <!-- team area start -->
    <div class="team-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                @if(isset($team_members) && $team_members->count() > 0)
                    @foreach($team_members as $team_member)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="tpteam text-center mb-60">
                                <div class="tpteam__img">
                                    <img src="{{ asset('uploads/'.$team_member->photo) }}" alt="{{ $team_member->name }}">
                                    <div class="tpteam__social">
                                        @if($team_member->facebook)
                                            <a href="{{ $team_member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        @endif

                                        @if($team_member->twitter)
                                            <a href="{{ $team_member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        @endif

                                        @if($team_member->linkedin)
                                            <a href="{{ $team_member->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                        @endif

                                        @if($team_member->instagram)
                                            <a href="{{ $team_member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="tpteam__text">
                                    <h3 class="tpteam-title">
                                        <a href="{{ route('team_member', $team_member->slug ?? $team_member->id) }}">{{ $team_member->name }}</a>
                                    </h3>
                                    <h5>{{ $team_member->designation }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Pagination Links --}}
                    @if($team_members->hasPages())
                        <div class="col-lg-12 d-flex justify-content-center mt-30">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{-- Previous Page Link --}}
                                    @if (!$team_members->onFirstPage())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $team_members->previousPageUrl() }}">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($team_members->getUrlRange(1, $team_members->lastPage()) as $page => $url)
                                        <li class="page-item {{ ($page == $team_members->currentPage()) ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($team_members->hasMorePages())
                                        <li class="page-item next-page">
                                            <a class="page-link" href="{{ $team_members->nextPageUrl() }}">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    @endif
                @else
                    <div class="col-12 text-center">
                        <p class="alert alert-warning">No team members found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- team area end -->
@endsection
