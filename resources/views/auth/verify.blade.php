@extends('layouts.blank')
@section('title')
Verify your email
@endsection
@section('subheading')
For security reasons, we need you email to be verified.
@endsection
@section('content')
<br><br>
<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center text-Investor">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <p class="lead">{{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</div>
                </div>
            </div>
        </div>
<br><br>
@endsection
