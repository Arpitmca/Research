@extends("layouts.blank")
@section("title", "Thank You!")
@section("subheading")
The payment of Rs.{{ number_format( $transaction->amount,2)}} is successful.
@endsection
@section("content")
<br><br>
<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center text-Investor">
                       
                        <p class="lead">Dear {{$transaction->investor->name}}, <br>We on the behalf of researchers of <b>{{$transaction->research->title}}</b>, thanks you for you generous contribution.</p>
                    </div>
                        <br>
                        <div style="text-align: center;">
                            <a href="{{ route("research.view", ['research' => $transaction->research]) }}" class="btn btn-success">{{$transaction->research->title}}</a>
                        </div>

                </div>
            </div>
        </div>
<br><br>
@endsection