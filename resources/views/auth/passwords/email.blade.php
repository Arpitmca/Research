@extends('layouts.onlynav')
@section('title')
Reset Password
@endsection
@section('content')
<section class="hero-section full-screen gray-light-bg">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">

                <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

                    <!-- Image -->
                    <div class="bg-cover vh-100 ml-n3 gradient-overlay" style="background-image: url(img/slider-img-2.jpg);">
                        <div class="position-absolute login-signup-content">
                            <div class="position-relative text-white col-md-12 col-lg-7">
                                <h2 class="text-white">Don't Worry You Can Reset Your Password<br/> </h2>
                                <p>There are risks and costs to action. But they are far less than the long range risks of comfortable inaction.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6">
                    <div class="login-signup-wrap px-4 px-lg-5 my-5">
                        <!-- Heading -->
                        <h1 class="text-center mb-1">
                            Password Reset
                        </h1>

                        <!-- Subheading -->
                        <p class="text-muted text-center mb-5">
                            Enter your email to get a password reset link.
                        </p>

                        <!-- Form -->
                        <form class="login-signup-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email fa fa-envelope color-primary"></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="name@address.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <!-- Submit -->
                            <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3">
                                Reset Password
                            </button>

                            <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    Remember your password? <a href="{{ route("login") }}">Log in</a>.
                                </small>
                            </div>

                        </form>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div>
    </section>
@endsection
