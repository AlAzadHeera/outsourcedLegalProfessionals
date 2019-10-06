<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="shortcut icon" href="{{ asset('frontend/images/fevicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/images/fevicon.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('frontend/css/icomoon.css')}}">
    <!-- Font Awesome -->
    <link href="{{ asset('frontend/css/all.css') }}" rel="stylesheet">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('frontend/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

    {{--TostR Js CSS--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    {{--Custom CSS--}}
    @stack('css')

    <!-- Modernizr JS -->
    <script src="{{asset('frontend/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->

</head>
<body>

<div class="colorlib-loader"></div>

<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div id="colorlib-logo"><a href="{{ route('Home') }}"><img style="width: 150px;height: 60px;" src="{{ asset('frontend/images/logo.png') }}" alt=""></a></div>
                    </div>
                    <div class="col-md-10 text-right menu-1">
                        <ul>
                            <li class="{{ Request::is('/') ? ' active' : '' }}"><a href="{{ route('Home') }}">Home</a></li>
                            <li class="{{ Request::is('about') ? ' active' : '' }}"><a href="{{ route('About') }}">About</a></li>
                            <li class="{{ Request::is('service') ? ' active' : '' }}"><a href="{{ route('Service') }}">Services</a></li>
                            <li class="{{ Request::is('contact') ? ' active' : '' }}"><a href="{{ route('Contact') }}">Contact Us</a></li>
                            @if(session()->get('name'))
                                <li class="has-dropdown">
                                    <a href="#"><i class="fas fa-user"></i> {{session()->get('name') }}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('inbox') }}">Send File</a></li>
                                        <li><a href="{{ route('logOut') }}">Log Out</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="#"><i class="fas fa-bell"></i> {{App\GeneralUser::find(session()->get('userID'))->unreadNotifications()->count() }}</a>
                                    <ul class="dropdown">
                                        @if(App\GeneralUser::find(session()->get('userID'))->unreadNotifications()->count() > 0)
                                            <li><a href="{{ route('markAsReadUser',session()->get('userID')) }}">Mark All As Read</a></li>
                                            <li><a href="#">{{ App\GeneralUser::find(session()->get('userID'))->unreadNotifications()->count() }} New File(s)</a></li>
                                        @else
                                            <li><a href="#">No New File(s)</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @else
                                <li class="btn-cta"><a href="{{ route('loginPage') }}"><span>Sign Up</span></a></li>
                                <li class="btn-cta"><a href="{{ route('loginPage') }}"><span>Login</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>

@yield('content')

    <footer id="colorlib-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>Outsourced Legal Professionals</h4>
                    <p>We are a non-lawyer legal admin firm handling outsourced legal work along the Gulf Coast</p>
                </div>
                <div class="col-md-3 col-md-push-1">
                    <h4>Navigation</h4>
                    <ul class="colorlib-footer-links">
                        <li><a href="{{ route('Home') }}">Home</a></li>
                        <li><a href="{{ route('Service') }}">Services</a></li>
                        <li><a href="{{ route('Contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('About') }}">About us</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-md-push-1">
                    <h4>Contact Information</h4>
                    <ul class="colorlib-footer-links">
                        <li><h3 style="color: #fff;">Gulfport Mississippi</h3></li>
                        <li><a href="tel://1234567920">267-973-9585</a></li>
                        <li><small>juliana.marinucci@outsourcedlegalprofessionals.com</small></li>
                    </ul>
                </div>

            </div>

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p style="visibility: hidden">
                        <small class="block">&copy; 2018 LawFirm. All Rights Reserved. Created by <a href="https://colorlib.com/" target="_blank">Colorlib</a></small>
                        <small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="colorlib-social-icons"
                        <li><a href="https://www.facebook.com/outsourcedlegalpros" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/outsourcedlegalpros/" target="_blank"><i class="icon-instagram"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
<!-- Carousel -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('frontend/js/jquery.flexslider-min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('frontend/js/jquery.countTo.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/magnific-popup-options.js')}}"></script>
{{--ToastR Js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('frontend/js/all.js') }}"></script>
<!-- Main -->
<script src="{{asset('frontend/js/main.js')}}"></script>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif
@if(Session::has('message'))
    <script>
        toastr.error("{{ Session::get('message') }}");
    </script>
@endif
@if(Session::has('successMessage'))
    <script>
        toastr.success("{{ Session::get('successMessage') }}");
    </script>
@endif
@stack('scripts')
{!! Toastr::message() !!}

</body>
</html>


