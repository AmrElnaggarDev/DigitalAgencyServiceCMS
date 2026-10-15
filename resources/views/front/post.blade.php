@extends('front.layouts.master')

@section('content')
    <!-- page title area start -->
    <section class="page__title p-relative d-flex align-items-center grey-bg-2" data-overlay="dark" data-opacity="7">
        <div class="page__title-bg" data-background="{{ (isset($global_setting) && $global_setting?->page_banner) ? asset('uploads/'.$global_setting->page_banner) : asset('dist-front/img/page-title/page-title-1.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content mt-100 text-center">
                        <h2>{{ $post->title }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $post->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area end -->
    <!-- blog area start -->
    <section class="blog__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="blog__wrapper pr-50">
                        <div class="blog-wrap blog-item mb-50">
                            <div class="blog-thumb">
                                <img src="{{ asset('uploads/'.$post->photo) }}" alt="blog">
                            </div>
                            <div class="blog-details blog-details-2">
                                <ul class="blog-meta">
                                    <li><span><i class="fal fa-clock"></i> {{ $post->created_at->format('d M Y') }}</span></li>
                                    <li>
                                        @if($post->category)
                                            <a href="{{ route('blog.category', $post->category->slug) }}"><i class="fal fa-folder"></i> {{ $post->category->name }}</a>
                                        @endif
                                    </li>
                                </ul>
                                <div class="blog-text">
                                    {!! $post->description !!}
                                </div>
                                <div class="blog-info d-sm-flex align-items-center justify-content-between mb-40 mt-40">
                                    <div class="blog-tag">
                                        @if($post->tags)
                                            <span>Tags: </span>
                                            @foreach(explode(',', $post->tags) as $tag)
                                                <a href="{{ route('blog.tag', trim($tag)) }}">{{ trim($tag) }}@if(!$loop->last),@endif</a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="blog-category">
                                        <span>Category: </span>
                                        @if($post->category)
                                            <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post-comments mb-95 wow fadeInUp" data-wow-delay=".6s">
                            <div class="post-comment-title mb-40">
                                <h3>Comments ({{ $comments->count() }})</h3>
                            </div>
                            <div class="latest-comments">
                                @if($comments->count())
                                    <ul>
                                        @foreach($comments as $comment)
                                            @php
                                                $commentHash = md5(strtolower(trim($comment->email ?? '')));
                                            @endphp
                                            <li>
                                                <div class="comments-box">
                                                    <div class="comments-avatar">
                                                        <img src="https://www.gravatar.com/avatar/{{ $commentHash }}?s=80&d=mp" alt="">
                                                    </div>
                                                    <div class="comments-text">
                                                        <div class="avatar-name">
                                                            <h5>{{ $comment->name }}</h5>
                                                            <span class="post-meta">{{ $comment->created_at->format('F d, Y') }}</span>
                                                        </div>
                                                        <p>{{ $comment->comment }}</p>

                                                       <a href="#replyForm{{ $comment->id }}" class="comment-reply" data-bs-toggle="collapse">Reply</a>
                                                       <div class="collapse mt-20" id="replyForm{{ $comment->id }}">
                                                           <form action="{{ route('comment.reply.submit', $comment->id) }}" method="post">
                                                               @csrf
                                                               <div class="row">
                                                                   <div class="col-xl-6 col-md-6">
                                                                       <div class="post-input">
                                                                           <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-xl-6 col-md-6">
                                                                       <div class="post-input">
                                                                           <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}">
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-xl-12">
                                                                       <div class="post-input">
                                                                           <textarea name="reply" placeholder="Your reply..." required>{{ old('reply') }}</textarea>
                                                                       </div>
                                                                   </div>
                                                                   <div class="col-xl-12">
                                                                       <button type="submit" class="tp-btn">Submit Reply</button>
                                                                   </div>
                                                               </div>
                                                           </form>
                                                       </div>
                                                   </div>
                                               </div>
                                           </li>
                                           @if($comment->replies->count())
                                               @foreach($comment->replies as $reply)
                                                   @php
                                                       $replyHash = md5(strtolower(trim($reply->email ?? '')));
                                                   @endphp
                                                   <li class="children">
                                                       <div class="comments-box {{ $reply->person_type == 'Admin' ? 'admin-reply' : '' }}">
                                                           <div class="comments-avatar">
                                                               <img src="https://www.gravatar.com/avatar/{{ $replyHash }}?s=80&d=mp" alt="">
                                                           </div>
                                                           <div class="comments-text">
                                                               <div class="avatar-name">
                                                                   <h5>
                                                                       {{ $reply->name }}
                                                                       @if($reply->person_type == 'Admin')
                                                                           <span class="badge bg-warning text-dark">Admin</span>
                                                                       @endif
                                                                   </h5>
                                                                   <span class="post-meta">{{ $reply->created_at->format('F d, Y') }}</span>
                                                               </div>
                                                               <p>{{ $reply->reply }}</p>
                                                           </div>
                                                       </div>
                                                   </li>
                                               @endforeach
                                           @endif
                                       @endforeach
                                   </ul>
                               @else
                                   <p>No approved comments yet.</p>
                               @endif
                           </div>
                        </div>
                        <div class="post-comment-form wow fadeInUp" data-wow-delay=".2s">
                           <h4>Leave a Comment</h4>
                           <span>Your email address will not be published.</span>
                           <form action="{{ route('post.comment.submit', $post->id) }}" method="post">
                               @csrf
                               <div class="row">
                                   <div class="col-xl-6 col-md-6">
                                       <div class="post-input">
                                           <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
                                       </div>
                                   </div>
                                   <div class="col-xl-6 col-md-6">
                                       <div class="post-input">
                                           <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                       </div>
                                   </div>
                                   <div class="col-xl-12">
                                       <div class="post-input">
                                           <textarea name="comment" placeholder="Your message..." required>{{ old('comment') }}</textarea>
                                       </div>
                                   </div>
                               </div>
                               <button type="submit" class="tp-btn">Send Message</button>
                           </form>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog__sidebar">
                        @include('front.layouts.blog_sidebar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog area end -->
@endsection
