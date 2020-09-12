@extends('layouts.blank')
@section("title", "It's not on you. It's on us.")
@section("content")
<!--hero section start-->

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center ">
                        <div class="notfound-404"><h1>Server Error.</h1></div>
                        <h2 class="">It's not on you. It's on us.</h2>
                        <p class="lead">Our technical teams are nofitified with this issue. We will working on this. If you still getting this error, feel free to contact us.</p><a class="btn btn-secondary" href="{{ route("home") }}">Go to Homepage</a></div>
                            <br><br>
                </div>
            </div>
        </div>

@endsection