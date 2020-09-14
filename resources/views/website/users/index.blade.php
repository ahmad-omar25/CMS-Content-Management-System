@extends('website.layout.app')
@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <h3 class="mb-1">Update Information</h3>
            <hr class="mb-4" style="width: 74%">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="my__account__wrapper">
                        <form method="POST" action="{{ route('profile.update', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <div class="account__form mt-0">
                                <div class="input__box">
                                    @php $input = "name" @endphp
                                    <label>Name<span>*</span></label>
                                    <input id="name" type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{ $user->name }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "email" @endphp
                                    <label>Email<span>*</span></label>
                                    <input id="email" type="email" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{ $user->email }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "mobile" @endphp
                                    <label>Mobile<span>*</span></label>
                                    <input id="mobile" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{ $user->mobile }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "bio" @endphp
                                    <label>BIO<span>*</span></label>
                                    <input id="mobile" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{ $user->bio }}">
                                    @error($input)
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    @php $input = "user_image" @endphp
                                    <label for="{{$input}}">User Image<span>*</span></label>
                                    <input type="file" style="padding: 9px;" id="{{$input}}" name="{{$input}}" multiple class="form-control-file">
                                </div>
                                <div class="form__btn">
                                    <button type="submit">Update</button>
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
