@extends('website.layout.app')
@section('content')
    <div class="page-blog-details section-padding--lg bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <article class="blog-post-details">
                            <div class="post-thumbnail">
                                @if ($post->media->count() > 0)
                                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach($post->media as $media)
                                                <li data-target="#carouselIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach($post->media as $media)
                                                <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                                                    <img class="d-block w-100" src="{{asset('assets/posts' . $media->file_name)}}" alt="{{$post->title}}">
                                                </div>
                                            @endforeach
                                        </div>
                                        @if ($post->media->count() > 1)
                                            <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        @endif
                                    </div>
                                @else
                                    <img src="{{asset('website/images/blog/big-img/1.jpg')}}" alt="blog images">
                                @endif
                            </div>
                            <div class="post_wrapper">
                                <div class="post_header">
                                    <h2>{{$post->title}}</h2>
                                    <div class="blog-date-categori">
                                        <ul>
                                            <li>{{$post->created_at->format('M d, Y')}}</li>
                                            <li><a href="{{route('author', $post->user->name)}}" title="Posts by {{$post->user->name}}" rel="author">{{$post->user->name}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post_content">
                                    <p>{!! $post->description !!}</p>
                                </div>
                                <ul class="blog_meta">
                                    <li><a> {{$post->approved_comments->count() > 1 ? 'Comments' : 'Comment'}} </a></li>
                                    <li> / </li>
                                    <li>Category: <span> {{$post->category->name}}</span></li>
                                </ul>
                            </div>
                        </article>
                        <div class="comments_area">
                            <h3 class="comment__title">{{$post->approved_comments->count()}} {{$post->approved_comments->count() > 1 ? 'Comments' : 'Comment'}}</h3>
                            <ul class="comment__list">
                                @forelse($post->approved_comments as $comment)
                                    <li>
                                        <div class="wn__comment">
                                            <div class="thumb">
                                                <img src="{{ get_gravatar($comment->email, 46) }}" alt="comment images">
                                            </div>
                                            <div class="content">
                                                <div class="comnt__author d-block d-sm-flex">
                                                    <span><a href="{{$comment->url ? $comment->url : '#'}}">{{$comment->user->name}}</a></span>
                                                    <span>{{$comment->created_at->format('M d, Y , h:i a')}}</span>
                                                </div>
                                                <p>{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li>
                                        <div class="wn__comment">
                                            <div class="content">
                                                <p>No Comments Found</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                        @if (auth()->check())
                            <div class="comment_respond">
                                <h3 class="reply_title">Leave a Reply</h3>
                                {!! Form::open(['route' => ['post.add_comment', $post->slug], 'method' => 'post', 'class' => 'comment__form']) !!}
                                <div class="input__box">
                                    {!! Form::textarea('comment', old('comment'), ['placeholder' => 'Your comment here']) !!}
                                </div>
                                <div class="submite__btn">
                                    {!! Form::submit('Post Comment', ['class' => 'btn btn-primary']) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('website.includes.sidebar')
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
