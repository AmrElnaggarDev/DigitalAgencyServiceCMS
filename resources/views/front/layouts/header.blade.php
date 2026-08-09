<header>
    <div id="header-sticky" class="header-area header-transparent header-pad header-border">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="logo logo-border">
                        <a href="{{ route('home') }}">
                            <img class="logo-white" src="{{ asset('dist-front/img/logo/logo.png') }}" alt="logo" />
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="about.html">About</a>
                                </li>
                                <li>
                                    <a href="services.html">Services </a>
                                    <ul class="sub-menu">
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="services-details.html">Services Details</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about.html">Pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="pricing.html">Pricing</a></li>
                                        <li><a href="portfolio.html">portfolio</a></li>
                                        <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="team-details.html">Team Details</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="error.html">404</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html">News </a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">News</a></li>
                                        <li><a href="blog-details.html">News Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-6">
                    <div class="header-right-info d-flex align-items-center justify-content-end">
                        <div class="header-search">
                            <button class="search-toggle" type="button"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="sidebar__menu d-lg-none">
                            <div class="sidebar-toggle-btn ml-30" id="sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="header-btn d-none d-lg-block">
                            <a href="contact.html" class="tp-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
