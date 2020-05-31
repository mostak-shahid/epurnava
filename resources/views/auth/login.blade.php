@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="bg-white auth-wrapper">
                    <h2 class="auth-title font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Login') }}</h2>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group position-relative pt20">
                            <input id="email" type="text" class="form-control theme-input @if(old('email')) not-null @endif @if($errors->has('phone') OR $errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" class="smooth animated-label font-lato">Email/Phone Number</label>
                            <span class="invalid-feedback font-lato">Please enter a valid email address</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="password" type="password" class="form-control theme-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password" class="smooth animated-label">Password</label>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="row mb30">
                            <div class="col-6 text-left">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label caption" for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                @if (Route::has('password.request'))
                                    <a class="text-blue caption" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-theme btn-theme-primary btn-font">Log in</button>
                    </form>
                    <div class="text-seperator my30">
                        OR
                    </div>
                    <div class="text-center">
                        <div class="caption text-black-80 mb20">Login With</div>
                        <ul class="list-inline social-list">
                            <li class="list-inline-item social-item"><a href="#"><img src="{{asset('images/login-facebook.png')}}" alt="Facebook" width="36" height="35"></a></li>
                            <li class="list-inline-item social-item"><a href="#"><img src="{{asset('images/login-twitter.png')}}" alt="Twitter" width="36" height="35"></a></li>
                            <li class="list-inline-item social-item"><a href="{{ url('/auth/redirect/google') }}"><img src="{{asset('images/login-google.png')}}" alt="Twitter" width="36" height="35"></a></li>
                        </ul>
                        <div class="caption text-black-80">New to Purnava?
                            @if (Route::has('register'))
                                <u><a href="{{ route('register') }}" class="text-blue">Create a New Account</a></u>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
