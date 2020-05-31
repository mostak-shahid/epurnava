@extends('layouts.app')

@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="bg-white auth-wrapper">
                    <h2 class="auth-title font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Verify Your Email Address') }}</h2>
                    <div class="body-2 text-black-60 mb30 mb-xs-20">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </div>
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-theme btn-theme-primary btn-font">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
