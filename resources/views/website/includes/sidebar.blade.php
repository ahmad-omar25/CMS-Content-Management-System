<div class="wn__sidebar">
    <!-- Start Single Widget -->
    <aside class="widget search_widget">
        <h3 class="widget-title">Search</h3>
        <form action="{{route('search')}}" method="get">
            <div class="form-input">
                <input type="text" value="{{old('keyword', request()->keyword)}}" name="keyword" placeholder="Search Post name ...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </form>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget recent_widget">
        <h3 class="widget-title">Recent Posts</h3>
        <div class="recent-posts">
            <ul>
                @foreach($recent_posts as $recent_post)
                    <li>
                        <div class="post-wrapper d-flex">
                            <div class="thumb">
                                <a href="{{route('post.show', $recent_post->slug)}}"><img src="{{asset('website/images/blog/sm-img/1.jpg')}}" alt="blog images"></a>
                            </div>
                            <div class="content">
                                <h4><a href="{{route('post.show', $recent_post->slug)}}">{{\Illuminate\Support\Str::limit($recent_post->title, 15, '...')}}</a></h4>
                                <p>{{$recent_post->created_at->format('M d, Y')}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget comment_widget">
        <h3 class="widget-title">Comments</h3>
        <ul>
            @foreach($recent_comments as $recent_comment)
            <li>
                <div class="post-wrapper">
                    <div class="thumb">
                        <img src="{{asset('website/images/blog/comment/1.jpeg')}}" alt="Comment images">
                    </div>
                    <div class="content">
                        <p>{{$recent_comment->name}}</p>
                        <a href="#">{!! \Illuminate\Support\Str::limit($recent_comment->comment, 25, '...') !!}</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget category_widget">
        <h3 class="widget-title">Categories</h3>
        <ul>
            @foreach($global_categories as $global_category)
                <li><a href="#">{{$global_category->name}}</a></li>
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
    <!-- Start Single Widget -->
    <aside class="widget archives_widget">
        <h3 class="widget-title">Archives</h3>
        <ul>
            @foreach($global_archives as $key=>$val)
            <li><a href="#">{{date("F", mktime(0, 0, 0, $key, 1)) . ' ' . $val}}</a></li>
            @endforeach
        </ul>
    </aside>
    <!-- End Single Widget -->
</div>
