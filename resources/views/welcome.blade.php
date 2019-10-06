@extends('layouts.home')

@section('title','Home')

@push('css')
@endpush

@section('content')
    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{asset('frontend/images/img_bg_1.jpg')}});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h1>Providing high quality affordable services around the Gulf Coast</h1>
                                    <p><a class="btn btn-primary btn-lg" href="#colorlib-consult">Make An Appointment</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{asset('frontend/images/img_bg_2.jpg')}});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h1>Your ultimate law &amp; legal Sulution</h1>
                                    <p><a class="btn btn-primary btn-lg btn-learn" href="#colorlib-consult">Make An Appointment</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{asset('frontend/images/img_bg_3.jpg')}});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h1>Defend Your Constitutional Right with Legal Help</h1>
                                    <p><a class="btn btn-primary btn-lg btn-learn" href="#colorlib-consult">Make An Appointment</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <div id="intro-bg">
        <div class="container">
            <div id="colorlib-intro">
                <div class="third-col">
                    <span class="icon"><i class="icon-cog"></i></span>
                    <h2>Need Legal Services?</h2>
                    <p>We are a non-lawyer legal admin firm handling outsourced legal work along the Gulf Coast</p>
                </div>
                <div class="third-col third-col-color">
                    <span class="icon"><i class="icon-old-phone"></i></span>
                    <h2>Call now 267-973-9585</h2>
                    <h4>Email us @ <a href="#">juliana.marinucci@outsourcedlegalprofessionals.com</a></h4>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-practice">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
                    <h2>Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-courthouse"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Legal Research</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-padlock"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Document Drafting</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-folder"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Pleadings Drafting</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Correspondence Drafting</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-handcuffs"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Document Filing in Harrison & Jackson County</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Process Serving & Notary Services</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-lg btn-learn" href="{{ route('Service') }}">View More <i class="icon-arrow-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-started" style="background-image:url({{asset('frontend/images/img_bg_2.jpg')}});" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center colorlib-heading colorlib-heading2">
                    <h2>Providing high quality affordable services around the Gulf Coast</h2>
                    <p>We are a non-lawyer legal admin firm handling outsourced legal work along the Gulf Coast</p>
                    <p><a href="#colorlib-consult" class="btn btn-primary btn-lg">Consultation</a></p>
                </div>
            </div>
        </div>
    </div>

    <div id="colorlib-consult">
        <div class="video colorlib-video" style="background-image: url({{asset('frontend/images/video.jpg')}});">
        </div>
        <div class="choose choose-form animate-box">
            <div class="colorlib-heading">
                <h2>Free Legal Consultation</h2>
            </div>
            <form action="{{ route('message.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-6">
                        <!-- <label for="fname">First Name</label> -->
                        <input type="text" id="fName" name="fName" class="form-control" placeholder="Your firstname">
                    </div>
                    <div class="col-md-6">
                        <!-- <label for="lname">Last Name</label> -->
                        <input type="text" id="lName" name="lName" class="form-control" placeholder="Your lastname">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="email">Email</label> -->
                        <input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="subject">Subject</label> -->
                        <input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <!-- <label for="message">Message</label> -->
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Send Message" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
