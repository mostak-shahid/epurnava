@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="bg-white auth-wrapper">
                    <h2 class="text-center auth-title font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Sign Up') }}</h2>
                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group position-relative pt20">
                            <input id="first_name" type="text" class="form-control theme-input @if(old('first_name')) not-null @endif @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            <label for="first_name" class="smooth animated-label font-lato">{{ __('First Name') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid first name</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="last_name" type="text" class="form-control theme-input @if(old('last_name')) not-null @endif @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}">
                            <label for="last_name" class="smooth animated-label font-lato">{{ __('Last Name') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid last name</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="phone" type="text" class="form-control theme-input @if(old('phone')) not-null @endif @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>
                            <label for="phone" class="smooth animated-label font-lato">{{ __('Phone Number') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid phone number</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="email" type="text" class="form-control theme-input @if(old('email')) not-null @endif @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            <label for="email" class="smooth animated-label font-lato">{{ __('Email Address ( Optional )') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid email address</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="password" type="password" class="form-control theme-input" name="password" required autocomplete="new-password">
                            <label for="password" class="smooth animated-label font-lato">{{ __('Password') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid password</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="password-confirm" type="password" class="form-control theme-input" name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm" class="smooth animated-label font-lato">{{ __('Confirm Password') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid password</span>
                        </div>
                        <button type="submit" class="btn btn-theme btn-theme-primary btn-font">{{ __('Continue') }}</button>

                        <div class="custom-control custom-checkbox mt30">
                            <input type="checkbox" class="custom-control-input" id="agree" name="agree" {{ old('agree') ? 'checked' : '' }} required>
                            <label class="custom-control-label font-12 line-height-22 text-gray-1" for="agree">{{ __('By Signing Up, you\'re confirming that you\'ve read our') }}</label>
                            <a class="font-12 line-height-22 text-blue" href="#">Terms & Conditions and Privacy Policy</a>
                        </div>
                    </form>
                    <div class="text-seperator my30">
                        OR
                    </div>
                    <div class="text-center">
                        <div class="caption text-black-80 mb20">Sign Up With</div>
                        <ul class="list-inline social-list">
                            <li class="list-inline-item social-item"><a href="#"><img src="{{asset('images/login-facebook.png')}}" alt="Facebook" width="36" height="35"></a></li>
                            <li class="list-inline-item social-item"><a href="#"><img src="{{asset('images/login-twitter.png')}}" alt="Twitter" width="36" height="35"></a></li>
                            <li class="list-inline-item social-item"><a href="{{ url('/auth/redirect/google') }}"><img src="{{asset('images/login-google.png')}}" alt="Twitter" width="36" height="35"></a></li>
                        </ul>
                        <div class="caption text-black-80">Already Have An Account Purnava? <u><a href="{{ route('login') }}" class="text-blue">Login Now</a></u>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
