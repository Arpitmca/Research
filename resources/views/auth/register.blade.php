@extends('layouts.onlynav')
@section('title')
Register
@endsection
@section('content')


    <!--hero background image with content slider start-->
    <section class="hero-section hero-bg-2 ptb-100 full-screen">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5 pt-sm-5 pt-md-5 pt-lg-0">
                <div class="col-md-7 col-lg-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white">Create Your Account</h1>
                        <p class="lead">
                            It always seems impossible until it's done.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h6 class="h3">Create account</h6>
                                <p class="text-muted mb-0">Made with love. Just for you.</p>
                            </div>
                            <form class="login-signup-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="pb-1">
                                        Your Name
                                    </label>
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-user fa fa-user color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter your name" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="pb-1">
                                        Email Address
                                    </label>
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-email fa fa-envelope color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="name@address.com" required name="email" value="{{ old('email') }}">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="pb-1">
                                        Password
                                    </label>
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock fa fa-key color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control"
                                               placeholder="Enter your password" name="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="pb-1">
                                        Who exacty are you?
                                    </label>
                                    <!-- Input group -->
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock fa fa-rocket color-primary"></span>
                                        </div>
                                        <select name="type" id="type" required class="form-control">
                                            <option value="">Select</option>
                                            <option value="R">Researcher</option>
                                            <option value="I">Investor</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="my-4">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="check-terms" required="required">
                                        <label class="custom-control-label" for="check-terms">I agree to the <a href="basic-sign-up.html#">terms and conditions</a></label>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3">
                                    Sign up
                                </button>
                            </form>

                        </div>
                        <div class="card-footer px-md-5 bg-transparent border-top"><small>Already have an account?</small>
                            <a href="{{ route("login")}}" class="small">Sign in</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero background image with content slider end-->
@endsection
