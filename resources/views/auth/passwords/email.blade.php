@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="bg-white auth-wrapper">
                    <h2 class="auth-title font-xs-24 line-height-xs-30 mb20 mb-xs-10">{{ __('Forgot Your Password?') }}</h2>
                    <div class="body-2 text-black-60 mb30 mb-xs-20">{{ __('Please enter your registered  phone number or  email address below to reset password.') }}</div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group position-relative pt20">
                            <input id="email" type="text" class="form-control theme-input @if(old('email')) not-null @endif @if($errors->has('phone') OR $errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" class="smooth animated-label font-lato">Email / Phone Number</label>
                            <span class="invalid-feedback font-lato">Please enter a valid email address</span>
                        </div>
                        <button type="submit" class="btn btn-theme btn-theme-primary btn-font">Continue</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
