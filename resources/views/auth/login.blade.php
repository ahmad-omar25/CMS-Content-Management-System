@extends('website.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <div class="my__account__wrapper py-5">
                <h3 class="account__title">Login</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="account__form">
                        <div class="input__box">
                            <label>Email<span>*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
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

                        <div class="form__btn">
                            <button>Login</button>
                            <label class="label-for-checkbox">
                                <input id="rememberme" class="input-checkbox" name="rememberme" value="forever" type="checkbox"{{ old('remember') ? 'checked' : '' }}>
                                <span>Remember me</span>
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="forget_pass" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
