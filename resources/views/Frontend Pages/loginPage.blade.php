@extends('layouts.home')

@push('css')
@endpush

@section('content')

    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{ asset('frontend/images/img_bg_1.jpg') }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                            <div class="slider-text-inner desc">
                                <h2 class="heading-section">Login Or Registration</h2>
                                <p class="colorlib-lead">Please Login Or Register To Send & Recieve Messages And Files</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 animate-box">
                    <h3>Log In</h3>
                    <form action="{{ route('authenticate') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email Address">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="password">Password</label> -->
                                <input type="password" name="password" id="subject" class="form-control" placeholder="Your Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary">
                            <small><a href="{{route('emailSubmitPage')}}">Forgot Password?</a></small>
                        </div>

                    </form>
                </div>
                <div class="col-md-6 animate-box" style="float: right;">
                    <h3>Registration</h3>
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row form-group">
                            <div class="col-md-6">
                                <!-- <label for="fname">First Name</label> -->
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname">
                            </div>
                            <div class="col-md-6">
                                <!-- <label for="lname">Last Name</label> -->
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="password">Password</label> -->
                                <input type="password" id="Password" name="password" class="form-control" placeholder="Your Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
