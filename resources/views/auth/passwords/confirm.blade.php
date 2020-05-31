@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="bg-white auth-wrapper">
                <h2 class="auth-title font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Confirm Password') }}</h2>
                <div class="body-2 text-black-60 mb30 mb-xs-20">{{ __('Please confirm your password before continuing.') }}</div>
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group position-relative pt20">
                        <input id="password" type="text" class="form-control theme-input @error('password') is-invalid @enderror" name="first-name" value="" required autocomplete="current-password">
                        <label for="password" class="smooth animated-label font-lato">{{ __('Password') }}</label>
                        <span class="invalid-feedback font-lato">Please enter a valid password</span>
                    </div>
                    <button type="submit" class="btn btn-theme btn-theme-primary btn-font">Confirm Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
