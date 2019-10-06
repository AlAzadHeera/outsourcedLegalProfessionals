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
                                <h2 class="heading-section">Reset Your Password</h2>
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
                <div class="col-md-6 animate-box" style="float: none; margin: 0 auto;">
                    <h3>Enter Your Registered Email Adress</h3>
                    <form action="{{ route('sendPasswordResetToken') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Email</label> -->
                                <input type="email" id="email" name="email" class="form-control" placeholder="Your email address">
                                <small style="font-size: 59%">Well Send A Password Change Link To Your Email</small>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
