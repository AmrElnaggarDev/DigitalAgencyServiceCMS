@extends('admin.layouts.master')

@section('content')

    <div class="page-heading">
        <h1>Welcome back, {{ auth('admin')->user()->name }} 👋</h1>
        <p>Here's a quick overview of your content and website activity.</p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-blue-100 text-primary-600">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Total Posts</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['posts'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-purple-100 text-purple-600">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Total Comments</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['comments'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-orange-100 text-orange-600">
                        <i class="fa-solid fa-reply"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Total Replies</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['replies'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-green-100 text-green-600">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Total Services</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['services'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-red-100 text-red-600">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Total Projects</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['projects'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-cyan-100 text-cyan-600">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Team Members</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['team_members'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-yellow-100 text-yellow-600">
                        <i class="fa-solid fa-quote-right"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Testimonials</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['testimonials'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-indigo-100 text-indigo-600">
                        <i class="fa-solid fa-circle-question"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">FAQs</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['faqs'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-pink-100 text-pink-600">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Packages</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['packages'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card-custom">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-emerald-100 text-emerald-600">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-0">Subscribers</p>
                        <p class="text-2xl fw-bold mb-0">{{ $stats['subscribers'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
