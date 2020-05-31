@extends('layouts.dashboard')
@include('includes.functions')
@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row">
            @include('dashboard.menu')
            <div class="col-md-6">
                <div class="bg-white dashboard-wrapper">
                    <h2 class="text-center auth-title small-border font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Change Password') }}</h2>
                    <form method="POST" action="{{route('dashboard.password.update')}}" class="needs-validation px60 px-xs-0" novalidate enctype="multipart/form-data">
                        @csrf
                        @if(Auth::user()->password)
                            <div class="form-group position-relative pt20">
                                <input id="current_password" type="password" class="form-control theme-input" name="current_password" value="" required autofocus>
                                <label for="current_password" class="smooth animated-label font-lato">{{ __('Current Password') }}</label>
                                <span class="invalid-feedback font-lato">Please enter a valid password</span>
                            </div>
                            @else
                            <input type="hidden" name="current_password" value="">
                        @endif
                        <div class="form-group position-relative pt20">
                            <input id="password" type="password" class="form-control theme-input" name="password" value="" required>
                            <label for="password" class="smooth animated-label font-lato">{{ __('New Password') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid password</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="password_confirmation" type="password" class="form-control theme-input" name="password_confirmation" value="" required>
                            <label for="password_confirmation" class="smooth animated-label font-lato">{{ __('Retype New Password') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid password</span>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-theme btn-theme-primary btn-font">{{ __('Save') }}</button>
                            </div>
                            <div class="col-md-6">
                                <button type="reset" class="btn btn-theme btn-theme-light btn-font">{{ __('Cancel') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
