@extends('layouts.dashboard')
@include('includes.functions')
@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row">
            @include('dashboard.menu')
            <div class="col-md-6">
                <div class="bg-white dashboard-wrapper">
                    <h2 class="text-center auth-title small-border font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Account Information') }}</h2>
                    <form method="POST" action="{{route('dashboard.account.update')}}" class="needs-validation px60 px-xs-0" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="d-table mb20" style="width:230px">
                            <div class="d-table-cell image-cell align-middle" style="width: 80px;height: 80px;">
                                <!--https://picsum.photos/80/80-->
                                <img class="img-fluid img-avatar rounded-circle" src="@if(is_url($user->avatar)) {{$user->avatar}} @else {{asset($user->avatar)}} @endif" alt="Person Name">
                            </div>
                            <div class="d-table-cell text-cell align-middle">
                                <label class="body-2 text-black-60 mb-0 cup pl20" for="avatar">{{ __('Change your Picture') }}</label>
                                <input type="file" class="d-none" id="avatar" name="avatar">
                            </div>
                        </div>
                        <div class="form-group position-relative pt20">
                            @php($first_name = get_user_meta($profile, 'first_name'))
                            <input id="first_name" type="text" class="form-control theme-input @if(old('first_name') || $first_name) not-null @endif @error('first_name') is-invalid @enderror" name="first_name" value="{{ (old('first_name'))? old('first_name') : $first_name}}" required autofocus>
                            <label for="first_name" class="smooth animated-label font-lato">{{ __('First Name') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid first name</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            @php($last_name = get_user_meta($profile, 'last_name'))
                            <input id="last_name" type="text" class="form-control theme-input @if(old('last_name') || $last_name) not-null @endif @error('last_name') is-invalid @enderror" name="last_name" value="{{ (old('last_name'))? old('last_name') : $last_name}}">
                            <label for="last_name" class="smooth animated-label font-lato">{{ __('Last Name') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid last name</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            @php($email = $user->email)
                            <input id="email" type="text" class="form-control theme-input @if(old('email') || $email) not-null @endif @error('email') is-invalid @enderror" name="email" value="{{ (old('email')) ? old('email') : $email}}">
                            <label for="email" class="smooth animated-label font-lato">{{ __('Email Address ( Optional )') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid email address</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            @php($phone = $user->phone)
                            <input id="phone" type="text" class="form-control theme-input @if(old('phone') || $phone) not-null @endif @error('phone') is-invalid @enderror" name="phone" value="{{ (old('phone')) ? old('phone') : $phone}}" required>
                            <label for="phone" class="smooth animated-label font-lato">{{ __('Phone Number') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid phone number</span>
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
