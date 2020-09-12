@extends('layouts.blank')
@section("title", "Session Expired.")
@section("content")
<!--hero section start-->

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center ">
                        <div class="notfound-404"><h1>419!</h1></div>
                        <p class="lead">It seems that you took too long to respond. Please try again.</p><a class="btn btn-secondary" href="{{ route("home") }}">Go to Homepage</a></div>
                            <br><br>
                </div>
            </div>
        </div>

@endsection