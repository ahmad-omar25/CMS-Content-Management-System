@extends('website.layout.app')
@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <h2 class="mb-1">Create Post</h2>
            <hr class="mb-4" style="width: 74%">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="my__account__wrapper">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="account__form m-0">
                                <div class="input__box">
                                    @php $input = "title" @endphp
                                    <label>Title<span>*</span></label>
                                    <input id="{{$input}}" type="text"
                                           class="form-control @error($input) is-invalid @enderror" name="{{$input}}"
                                           value="{{ old($input) }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "description" @endphp
                                    <label>Description<span>*</span></label>
                                    <textarea name="{{$input}}" id="" class="form-control @error($input) is-invalid @enderror" cols="30" rows="10"></textarea>

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
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
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
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
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
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
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
                                            <label for="exampleFormControlFile1">Post Images<span>*</span></label>
                                            <input type="file" id="post-images" name="{{$input}}" multiple class="form-control-file" id="exampleFormControlFile1">
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
    <link href="{{url('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css')}}" rel="stylesheet">
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
                overwriteInitial: false
            });
        });
    </script>
@stop
