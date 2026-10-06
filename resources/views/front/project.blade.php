@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>{{ $project->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('projects') }}">Projects</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $project->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->
    <!-- project details area start  -->
    <section class="project-details-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="project-big-thumb">
                        <img src="{{ asset('uploads/'.$project->photo) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                    <div class="p-details-content mb-40">
                        <p>{!! $project->description !!}</p>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="sidebar-wrap mb-40">
                        <div class="sidebar-right">
                            @if($project->location)
                                <div class="sidebar-single">
                                    <label>Location:</label>
                                    <span>{{ $project->location }}</span>
                                </div>
                            @endif
                            @if($project->category)
                                <div class="sidebar-single">
                                    <label>Category:</label>
                                    <span>{{ $project->category }}</span>
                                </div>
                            @endif
                            @if($project->manager)
                                <div class="sidebar-single">
                                    <label>Manager:</label>
                                    <span>{{ $project->manager }}</span>
                                </div>
                            @endif
                            @if($project->start_date)
                                <div class="sidebar-single">
                                    <label>Start Date:</label>
                                    <span>{{ $project->start_date }}</span>
                                </div>
                            @endif
                            @if($project->end_date)
                                <div class="sidebar-single">
                                    <label>End Date:</label>
                                    <span>{{ $project->end_date }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- project detials area end  -->
    <!-- pagination area  -->
    <div class="portfolio__pagination-wrapper">
        <div class="container">
            <div class="pagination-border pt-40 pb-40">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="portfolio__pagination">
                            <a href="{{ $previous_project ? route('project', $previous_project->slug) : 'javascript:void(0);' }}" class="link-btn-2">
                                <i class="fal fa-long-arrow-left"></i>
                                Prev
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="portfolio__pagination text-end">
                            <a href="{{ $next_project ? route('project', $next_project->slug) : 'javascript:void(0);' }}" class="link-btn-2">
                                Next
                                <i class="fal fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pagination area  end-->
@endsection
