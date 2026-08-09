<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Binifox - Laravel Script</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("dist-front/img/favicon.png") }}" />

    @include('front.layouts.styles')
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.
</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="loading-icon text-center d-sm-flex align-items-center">
                <img class="loading-logo mr-10" src={{asset("dist-front/img/preloader/preloader-icon.png")}} alt="" />
                <img src={{asset("dist-front/img/preloader/preloader-logo.png")}} alt="" />
            </div>
        </div>
    </div>
</div>
<!-- pre loader area end -->

<!-- header  -->
@include('front.layouts.header')
<!-- header end -->

<!-- search popup area start -->
<div class="search__popup transition-3">
    <div class="search__popup-close">
        <button type="button" class="search-popup-close-btn"><i class="fal fa-times"></i></button>
    </div>
    <div class="search__popup-wrapper">
        <form action="#">
            <div class="search__popup-input">
                <input type="text" placeholder="Enter Your Keyword..." />
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- search popup area end -->

<!-- sidebar area start -->
@include('front.layouts.sidebar')
<!-- sidebar area end -->

<div class="body-overlay transition-3"></div>

<main>
    @yield('content')
</main>

<!-- footer area start -->
@include('front.layouts.footer')
<!-- footer area end -->

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->

@include('front.layouts.scripts')

</body>
</html>
