@extends('website.layout.app')
@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            @if(isset($posts) && $posts->count() > 0)
            <h3 class="mb-1">My Posts</h3>
            <hr class="mb-4" style="width: 74%">
            @endif
            <div class="row">
                <div class="col-lg-9 col-md-4 col-sm-6 col-12">
                    <div class="row">
                        @forelse($posts as $post)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product product__style--3">
                                    <div class="product__thumb">
                                        <a class="first__img" href="single-product.html"><img src="{{asset('website/images/books/1.jpg')}}" alt="product image"></a>
                                        <a class="second__img animation1" href="single-product.html"><img src="{{asset('website/images/books/2.jpg')}}" alt="product image"></a>
                                        <div class="hot__box">
                                            <span class="hot-label">BEST SALER</span>
                                        </div>
                                    </div>
                                    <div class="product__content content--center content--center">
                                        <h4><a href="">{{ $post->title }}</a></h4>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="{{route('posts.edit', $post->slug)}}"><i class="bi bi-shopping-bag4"></i></a></li>
                                                    <form action="{{route('posts.destroy', $post->slug)}}" style="display: inline-block" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li>
                                                            <button class="wishlist" style="border: 0 none;margin-right: 8px;border-radius: 100%;display: inline-block;font-size: 16px;font-weight: normal;height: 36px;line-height: 40px;padding: 0;position: relative;background: #f5f5f5;color: #333;text-align: center;width: 36px;transition: all 300ms ease-in 0s;    box-shadow: none;outline: none;">
                                                                <i class="bi bi-responsive-device"></i>
                                                            </button>
                                                        </li>
                                                    </form>

                                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <h2 class="text-center">No posts found</h2>
                            </tr>
                        @endforelse
                    </div>
                    {!! $posts->links() !!}
                </div>

                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('website.users.include.sidebar')
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
