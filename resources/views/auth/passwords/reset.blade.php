@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="bg-white auth-wrapper">
                    <h2 class="auth-title font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Reset Password') }}</h2>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group position-relative pt20">
                            <input id="email" type="text" class="form-control theme-input @if(old('email')) not-null @endif @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" class="smooth animated-label font-lato">{{ __('Email Address') }}</label>
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
                        <button type="submit" class="btn btn-theme btn-theme-primary btn-font">{{ __('Reset Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
