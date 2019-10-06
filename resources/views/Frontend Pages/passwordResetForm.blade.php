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
                    <h3>Change Your Password</h3>
                    <form action="{{ route('resetPassword',$tokenData->token) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Password</label> -->
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter A New Password">
                                <small style="font-size: 59%;">At least one Uppercase letter,one Lower case letter, one numeric value,one special character, more than 8 characters</small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Confirm Password</label> -->
                                <input type="password" id="password" name="confirmPassword" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Change Password" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
@endpush
