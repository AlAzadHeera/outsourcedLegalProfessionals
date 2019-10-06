@extends('layouts.home')

@section('title','Service')

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
                                    <h1>Services</h1>
                                    <h2>Your Legal Solution starts here!</h2>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <div id="colorlib-practice">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
                    <h2>Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
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
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Client Interviews</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Discovery Services</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <div class="services">
						<span class="icon">
							<i class="flaticon-libra"></i>
						</span>
                        <div class="desc">
                            <h3><a href="#">Medical/Military Record Retrieval</a></h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
