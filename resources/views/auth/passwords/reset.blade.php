@extends('website.layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="my__account__wrapper py-5">
                    <h3 class="account__title">Reset Password</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="account__form">
                            <div class="input__box">
                                <label>E-Mail Address<span>*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
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
                                <button>Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
