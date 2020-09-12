@extends('layouts.onlynav')
@section("title", "Not Allowed")
@section("content")
<!--hero section start-->

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center ">
                        <div class="notfound-404"><h1>401</h1></div>
                        <h2 class="">You may have took a wrong turn.</h2>
                        <p class="lead">It seems that you are trying to access unauthorized section.</p><a class="btn btn-secondary" href="{{ route("home") }}">Go to Homepage</a></div>
                            <br><br>
                </div>
            </div>
        </div>

@endsection