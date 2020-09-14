@extends('website.layout.app')
@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <h3 class="mb-1">Edit Post {{$post->title}}</h3>
            <hr class="mb-4" style="width: 74%">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="my__account__wrapper">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="account__form m-0">
                                <div class="input__box">
                                    @php $input = "title" @endphp
                                    <label>Title<span>*</span></label>
                                    <input id="{{$input}}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                           value="{{ $post->title }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "description" @endphp
                                    <label>Description<span>*</span></label>
                                    <textarea name="{{$input}}" id="summernote"
                                              class="form-control @error($input) is-invalid @enderror" cols="30"
                                              rows="10">{{$post->description}}</textarea>
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input__box">
                                            @php $input = "category_id" @endphp
                                            <label>Categories<span>*</span></label>
                                            <select name="{{$input}}"
                                                    class="form-control @error($input) is-invalid @enderror">
                                                <option disabled selected>Select Category</option>
                                                @forelse($categories as $category)
                                                    <option
                                                        value="{{$category->id}}" {{$post->category->id  == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @empty
                                                    No Category
                                                @endforelse
                                            </select>
                                            @error($input)
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__box">
                                            @php $input = "status" @endphp
                                            <label>Status<span>*</span></label>
                                            <select name="{{$input}}"
                                                    class="form-control @error($input) is-invalid @enderror">
                                                <option disabled selected>Select Status</option>
                                                <option value="1" {{$post->{$input} == 1 ? 'selected' : ''}}>Active
                                                </option>
                                                <option value="0" {{$post->{$input} == 0 ? 'selected' : ''}}>Inactive
                                                </option>
                                            </select>
                                            @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__box">
                                            @php $input = "comment_able" @endphp
                                            <label>Comment_able<span>*</span></label>
                                            <select name="{{$input}}"
                                                    class="form-control @error($input) is-invalid @enderror">
                                                <option disabled selected>Select Comment</option>
                                                <option value="1" {{$post->{$input} == 1 ? 'selected' : ''}}>Yes
                                                </option>
                                                <option value="0" {{$post->{$input} == 0 ? 'selected' : ''}}>No</option>
                                            </select>
                                            @error($input)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input__box">
                                            @php $input = "images[]" @endphp
                                            <label for="post-images">Post Images<span>*</span></label>
                                            <input type="file" id="post-images" name="{{$input}}" multiple
                                                   class="form-control-file">
                                        </div>
                                    </div>
                                </div>

                                <div class="form__btn">
                                    <button>Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('website.users.include.sidebar')
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@section('script')
    <link href="{{url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css')}}"
          rel="stylesheet">
    <script src="{{url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js')}}"></script>
    <script>
        $(function () {
            $('#summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#post-images').fileinput({
                theme: "fa",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                        "{{ asset('assets/posts/' . $media->file_name) }}",
                    @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($post->media->count() > 0)
                        @foreach($post->media as $media)
                        {
                            caption: "{{ $media->file_name }}",
                            size: {{ $media->file_size }},
                            width: "120px",
                            url: "{{ route('post.media.destroy', [$media->id, '_token' => csrf_token()]) }}",
                            key: "{{ $media->id }}"
                        },
                    @endforeach
                    @endif
                ],
            })
        });
    </script>
@endsection
