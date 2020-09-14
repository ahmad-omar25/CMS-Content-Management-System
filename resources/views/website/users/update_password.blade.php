@extends('website.layout.app')
@section('content')
    <div class="page-blog bg--white section-padding--lg blog-sidebar right-sidebar">
        <div class="container">
            <h3 class="mb-1">Update Your Password</h3>
            <hr class="mb-4" style="width: 74%">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="my__account__wrapper">
                        <form method="POST" action="{{ route('update.password', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$user->id}}" name="id">
                            <div class="account__form mt-0">

                                <div class="input__box">
                                    <label>Password<span>*</span></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="input__box">
                                    <label>Confirm Password<span>*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="form__btn">
                                    <button>Update</button>
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
