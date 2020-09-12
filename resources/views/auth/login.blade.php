@extends('layouts.onlynav')
@section('title')
Login
@endsection
@section('content')
<section class="hero-section hero-bg-2 ptb-100 full-screen">
        <div class="container">
            <div class="row align-items-center justify-content-between pt-5 pt-sm-5 pt-md-5 pt-lg-0">
                <div class="col-md-7 col-lg-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white">Welcome Back !</h1>
                        <p class="lead">
                            Keep your face always toward the sunshine - and shadows will fall behind you.
                        </p>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h5 class="h3">Login</h5>
                                <p class="text-muted mb-0">Sign in to your account to continue.</p>
                            </div>

                            <!--login form-->
                            <form class="login-signup-form" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="pb-1">Email Address</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon ">
                                            <span class="ti-email fa fa-envelope color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="name@yourdomain.com"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Password</label>
                                        </div>
                                        <div class="col-auto">
                                            <a href="{{ route('password.request') }}" class="form-text small text-muted">
                                                Forgot password?
                                            </a>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="ti-lock fa fa-key color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Enter your password"  name="password" required autocomplete="current-password">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-3">
                                    Sign in
                                </button>

                            </form>
                        </div>
                        <div class="card-footer bg-transparent border-top px-md-5"><small>Not registered?</small>
                            <a href="{{ route("register") }}" class="small"> Create account</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
