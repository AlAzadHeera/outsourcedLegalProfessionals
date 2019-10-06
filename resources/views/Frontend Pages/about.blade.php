@extends('layouts.home')

@section('title','About')

@push('css')

@endpush

@section('content')
    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{asset('frontend/images/img_bg_1.jpg')}});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                            <div class="slider-text-inner desc">
                                <h2 class="heading-section">About Us</h2>
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
                <div class="col-md-12 col-md-push-1 animate-box">

                    <div class="colorlib-contact-info">
                        <h1>About Us</h1>
                        <div class="about-us-text">
                            <h3 style="text-transform: capitalize !important;line-height: 2;">We are a non-lawyer legal admin firm handling outsourced legal work along the Gulf Coast. We PROVIDING HIGH QUALITY AFFORDABLE SERVICES AROUND THE GULF COAST</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')

@endpush
