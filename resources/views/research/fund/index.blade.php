@extends('layouts.blank')
@section('title')
Fund {{ $research->title }}
@endsection
@section("content")
<form action="{{ route("research.fund.post", ['research' => $research]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
@csrf
<section class="team-two-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <h4>Fund {{ $research->title }}</h4>
                <p>{{ $research->description }} </p>
                <div class="form-group">
                    <label class="pb-1">Amount to contribute</label>
                    <div class="input-group input-group-merge">
                        <input type="number" class="form-control" placeholder="Severous Snape"  name="amount" value="1000" required autocomplete autofocus>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block " value="Contribute">
            </div>
        </div>
        
    </div>
</section>
</form>
@endsection
