<div class="sidebar__widget mb-50 wow fadeInUp" data-wow-delay=".2s">
    <div class="sidebar__widget-content">
        <div class="search">
            <form action="{{ route('blog.search') }}" method="get">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search...">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
<div class="sidebar__widget sidebar__widget-padding mb-75 wow fadeInUp grey-bg" data-wow-delay=".4s">
    <div class="sidebar__widget-title mb-25">
        <h4>Recent News</h4>
    </div>
    <div class="sidebar__widget-content">
        <div class="rc-post">
            <ul>
                @foreach($recent_posts as $recent_post)
                    <li class="d-flex align-items-center mb-20">
                        <div class="rc-thumb mr-15">
                            <a href="{{ route('post', $recent_post->slug) }}"><img src="{{ asset('uploads/'.$recent_post->photo) }}" alt="rc-post"></a>
                        </div>
                        <div class="rc-text">
                            <h6><a href="{{ route('post', $recent_post->slug) }}">{{ $recent_post->title }}</a></h6>
                            <span class="rc-meta"><i class="fal fa-clock"></i> {{ $recent_post->created_at->format('d M') }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="sidebar__widget sidebar__widget-padding mb-75 wow fadeInUp grey-bg" data-wow-delay=".6s">
    <div class="sidebar__widget-title mb-25">
        <h4>Categories</h4>
    </div>
    <div class="sidebar__widget-content">
        <div class="cat-link">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }} ({{ $category->posts->count() }})</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<div class="sidebar__widget sidebar__widget-padding mb-50 wow fadeInUp grey-bg" data-wow-delay="1s">
    <div class="sidebar__widget-title mb-15">
        <h4>Popular Tags</h4>
    </div>
    <div class="sidebar__widget-content">
        <div class="tags">
            @foreach($all_tags as $singleTag)
                <a href="{{ route('blog.tag', $singleTag) }}">{{ $singleTag }}@if(!$loop->last),@endif</a>
            @endforeach
        </div>
    </div>
</div>
