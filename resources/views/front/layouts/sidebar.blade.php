<div class="sidebar__area">
    <div class="sidebar__wrapper">
        <div class="sidebar__close">
            <button class="sidebar__close-btn" id="sidebar__close-btn">
                <i class="fal fa-times"></i>
            </button>
        </div>
        <div class="sidebar__content">
            <div class="logo mb-40">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('dist-front/img/logo/logo-dark.png') }}" alt="logo" />
                </a>
            </div>
            <div class="mobile-menu fix"></div>

            <div class="sidebar__search p-relative mt-40 mb-20">
                <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button type="submit"><i class="fad fa-search"></i></button>
                </form>
            </div>
            <div class="sidebar__contact mb-45">
                <ul>
                    <li class="wow fadeInUp" data-wow-delay="1s">
                        <div class="icon theme-color">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="text theme-color">
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
                            <a
                                target="_blank"
                                href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873"
                            >Ave 14th Street, Mirpur 210, <br />
                                San Franciso, USA 3296.</a
                            >
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
