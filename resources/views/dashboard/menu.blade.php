<?php
/**
 * Created by PhpStorm.
 * User: Md. Mostak Shahid
 * Date: 5/11/2020
 * Time: 3:43 PM
 */
?>
<div class="col-md-3 offset-md-1">
    @php($name = Route::currentRouteName())
    <ul class="list-unstyled mb-0 body-2 dashboard-menu">
        <li class="menu-item @if($name == 'dashboard') current-menu-item current_page_item @endif"><a href="{{route('dashboard')}}">{{ __('Account Information') }}</a></li>
        <li class="menu-item @if($name == 'dashboard.address') current-menu-item current_page_item @endif"><a href="{{route('dashboard.address')}}">{{ __('Address Book') }}</a></li>
        <li class="menu-item"><a href="#">{{ __('My Orders') }}</a></li>
        <li class="menu-item"><a href="#">{{ __('Payment History') }}</a></li>
        <li class="menu-item @if($name == 'dashboard.password.edit') current-menu-item current_page_item @endif""><a href="{{route('dashboard.password.edit')}}">{{ __('Change Password') }}</a></li>
        <li class="menu-item">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('dashboard-logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="dashboard-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <div class="dropdown">
        <button class="btn btn-block btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
</div>