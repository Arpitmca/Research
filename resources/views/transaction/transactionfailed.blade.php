@extends("layouts.blank")
@section("title", "Payment failed")
@section("subheading", $transaction->error_message)
@section("content")
<br><br>
<div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="error-content text-center text-Investor">
                       
                        <p class="lead">The payment of Rs.{{ $transaction->amount}} doesn't came through. If the payment is deducted from your account it should be refunded to you in 2-7 days. If you want to retry, use the following button.</div>
                            <br>
                        <div style="text-align: center;">
                            <a href="{{ route("transaction.retry", ['transaction' => $transaction]) }}" class="btn btn-success"><i class="fa fa-refresh"></i> Retry Payment</a>
                            <a href="{{ route("research.view", ['research' => $transaction->research]) }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to {{$transaction->research->title}}</a>
                        </div>

                </div>
            </div>
        </div>
<br><br>
@endsection