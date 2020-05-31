<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/hc-offcanvas-nav/hc-offcanvas-nav.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/plugins/toastr/toastr.min.css')}}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('style')

    <link rel="shortcut icon" href="{{ asset('images/ico/apple-touch-icon-32-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/ico/apple-touch-icon-57-precomposed.png') }}">
</head>
<body>
    <div id="app">
        <header id="main-header">
            <div class="content-wrap">
                <div class="top-header bg-deepblue-primary text-white py10">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-6 col-lg-3 text-left logo-wrapper">
                                <a class="logo-link" href="#"><img class="img-fluid img-header-logo" src="{{ asset('images/header-logo.png') }}" alt="Purnava Limited - Logo" width="150" height="30"></a>
                            </div>
                            <div class="col-6 col-lg-3 order-lg-last text-right icon-wrapper">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><a class="header-wishlist" href="#"><img src="{{asset('images/wishlist-header.png')}}" alt="Wishlist" width="30" height="30"></a></li>
                                    <li class="list-inline-item"><a class="header-cart" href="#"><img src="{{asset('images/cart-header.png')}}" alt="Cart" width="30" height="30"></a></li>
                                    <li class="list-inline-item"><a class="header-user" href="#"><img src="{{asset('images/user-header.png')}}" alt="User" width="30" height="30"></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 text-center search-wrapper">
                                <form id="header-search-form" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control header-search rounded-0" placeholder="Search for products" aria-label="Search for products" aria-describedby="button-search">
                                        <div class="input-group-append">
                                            <button class="btn bg-white rounded-0" type="submit" id="button-search"><img src="{{asset('images/search.png')}}" alt="Wishlist" width="18" height="18"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="auth-dropdown-menu">
                                @guest
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                @else
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-area bg-deepblue-alt text-center">
                    <nav id="nav" class="h-nav-area">
                        <ul>
                            <li class="menu-item current-menu-item current_page_item"><a href="#">Healthy Foods</a></li>
                            <li class="menu-item menu-item-has-children current-menu-ancestor"><a href="#">Men’s Health</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Men’s Health</a>
                                        <ul class="sub-menu">
                                            <li class="menu-item"><a href="#">Child’s Health</a></li>
                                            <li class="menu-item"><a href="#">Men’s Health</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item"><a href="#">Women’s Health</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="#">Diabetes and Heart Disease</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <main class="main-content">
            @include('includes.errors')
            @yield('content')
        </main>
    </div>
    <footer id="footer" class="bg-black text-white">
        <div class="container">
            <div class="content-wrap">
                <div class="row">
                    <div class="col-md-3">
                        <a class="logo-link" href="#"><img class="img-fluid img-footer-logo" src="{{ asset('images/footer-logo.png') }}" alt="Purnava Limited - Logo" width="250" height="65"></a>
                        <div class="footer-address font-14 line-height-26">
                            Purnava Limited<br/>
                            Plot No-1, Milk Vita Road, Section-7,<br/>
                            Mirpur, Dhaka-1216.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-title btn-font small-clickable">Useful Links</h4>
                        <div class="menu-links-container">
                            <ul id="menu-useful-links" class="menu list-unstyled">
                                <li class="menu-item"><a href="#">FAQs</a></li>
                                <li class="menu-item"><a href="#">Help</a></li>
                                <li class="menu-item"><a href="#">My account</a></li>
                                <li class="menu-item"><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-title btn-font small-clickable">Categories</h4>
                        <div class="menu-links-container">
                            <ul id="menu-useful-links" class="menu list-unstyled">
                                <li class="menu-item"><a href="#">FAQs</a></li>
                                <li class="menu-item"><a href="#">Help</a></li>
                                <li class="menu-item"><a href="#">My account</a></li>
                                <li class="menu-item"><a href="#">Terms &amp; Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <h4 class="footer-title btn-font">Follow Us</h4>
                                <ul class="list-inline social-list">
                                    <li class="list-inline-item social-item"><a href="#" target="_blank"><img src="{{asset('images/footer-facebook.png')}}" alt="Facebook" width="40" height="40"></a></li>
                                    <li class="list-inline-item social-item"><a href="#" target="_blank"><img src="{{asset('images/footer-twitter.png')}}" alt="Twitter" width="40" height="40"></a></li>
                                    <li class="list-inline-item social-item"><a href="#" target="_blank"><img src="{{asset('images/footer-instagram.png')}}" alt="Instagram" width="40" height="40"></a></li>
                                </ul>

                            </div>
                            <div class="col-6 col-md-12">
                                <div class="footer-hotline line-height-40 mb-10">Hotline</div>
                                <a href="tel:01844-054599" class="lead-text-1 text-white">01844-054599</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="copyright text-center font-12 line-height-16 py20">&copy; 2020 Purnava Limited. All rights reserved.</div>
        </div>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/hc-offcanvas-nav/hc-offcanvas-nav.js') }}" defer></script>
    <script src="{{asset('asset/plugins/toastr/toastr.min.js')}}"></script>
    <script>toastr.success('Have fun storming the castle!', 'Miracle Max Says')</script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    @yield('script')
</body>
</html>
