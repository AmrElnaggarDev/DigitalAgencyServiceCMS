@php $siteSetting = $global_setting ?? null; @endphp
<footer data-bg-color="#222429" data-background="{{ asset('dist-front/img/bg/04.png') }}">
    <div class="footer-top pt-115 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-widget mb-30">
                        <div class="footer-logo mb-30">
                            <a href="{{ route('home') }}"><img src="{{ ($siteSetting && $siteSetting->logo_footer) ? asset('uploads/' . $siteSetting->logo_footer) : asset('dist-front/img/logo/logo.png') }}" alt="{{ $siteSetting->site_name ?? 'logo' }}" /></a>
                        </div>
                        <div class="footer-text mb-20">
                            <p>
                                {{ $siteSetting->footer_text ?? 'Lorem ipsum dolor sit amet consecte tur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua tepo the.' }}
                            </p>
                        </div>
                        <div class="footer-subsccribe">
                            <h5>Subscribe</h5>
                            <form action="{{ route('subscribe.store') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Enter your email" required="" />
                                <button type="submit"><i class="fal fa-rocket"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-md-6">
                    <div class="footer-widget mb-30 pl-20">
                        <h3 class="footer-title">Departments</h3>
                        <div class="footer-menu-2">
                            <ul>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About us</a></li>
                                <li><a href="{{ route('services') }}">Services</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('contact') }}">Contact us</a></li>
                                <li><a href="{{ route('terms') }}">Terms Of Use</a></li>
                                <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('projects') }}">Projects</a></li>
                                <li><a href="{{ route('photo_gallery') }}">Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 d-lg-none d-xl-block">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-title">Latest Post</h3>
                        @php $recent_posts = \App\Models\Post::orderBy('id','desc')->take(3)->get(); @endphp
                        <div class="blog-feeds pr-15">
                            @foreach($recent_posts as $recent_post)
                                <div class="signle-blog-feeds mb-20">
                                    <div class="blog-feeds-thumb">
                                        <a href="{{ route('post', $recent_post->slug) }}"><img src="{{ asset('uploads/'.$recent_post->photo) }}" alt="" /></a>
                                    </div>
                                    <div class="blog-feeds-text">
                                        <h5><a href="{{ route('post', $recent_post->slug) }}">{{ $recent_post->title }}</a></h5>
                                        <span class="feeds-date">{{ $recent_post->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 d-lg-block">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-title">Photo Gallery</h3>
                        <div class="footer-instagram">
                            <ul>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins1.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins1.jpg') }}" alt=""
                                        /></a>
                                </li>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins2.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins2.jpg') }}" alt=""
                                        /></a>
                                </li>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins3.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins3.jpg') }}" alt=""
                                        /></a>
                                </li>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins4.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins4.jpg') }}" alt=""
                                        /></a>
                                </li>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins5.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins5.jpg') }}" alt=""
                                        /></a>
                                </li>
                                <li>
                                    <a href="{{ asset('dist-front/img/instagram/ins6.jpg') }}" data-fancybox="gallery"
                                    ><img src="{{ asset('dist-front/img/instagram/ins6.jpg') }}" alt=""
                                        /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area pt-25 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-copyright">
                        <p class="white-color">{{ $siteSetting->copyright_text ?? 'Copyright ©2026 Company Name. All Rights Reserved' }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-social text-start text-md-end">
                        @if($siteSetting && $siteSetting->facebook_link)
                            <a href="{{ $siteSetting->facebook_link }}" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($siteSetting && $siteSetting->twitter_link)
                            <a href="{{ $siteSetting->twitter_link }}" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($siteSetting && $siteSetting->linkedin_link)
                            <a href="{{ $siteSetting->linkedin_link }}" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a>
                        @endif
                        @if($siteSetting && $siteSetting->instagram_link)
                            <a href="{{ $siteSetting->instagram_link }}" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
