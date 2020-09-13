@extends('layouts.blank')
@section('title')
Fund {{ $research->title}}
@endsection
@section('subheading')
Research added by {{ $research->user->name }}
@endsection
@push("scripts")
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '188237198626570',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v8.0'
    });
  };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    FB.CustomerChat.show();
</script>
@endpush
@section("content")
    <div class="fb-customerchat"
     page_id="104778741373546"
     minimized="true">
    </div>
    <!--project details section start-->
    <section class="project-details-section ptb-100">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-12 col-lg-8">
                    <div class="img-wrap mb-md-4 mb-lg-0">
                        <img src="{{ asset("storage/profile/" . $research->image )}}" alt="{{ $research->title}}" class="img-fluid rounded shadow-sm"/>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="project-details-sidebar">
                        <ul class="project-info-list">
                            <li class="d-flex align-items-center mb-3 p-4 rounded">
                                <span class="ti-user fa fa-user icon-sm color-secondary d-block mr-3"></span>
                                <div class="d-block">
                                    <h5 class="mb-0">Researcher</h5>
                                    <p><a href="{{ route("researcher.profile.public", ['researcher' => $research->user]) }}">{{ $research->user->name }}, {{ $research->user->country }}</a></p>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3 p-4 rounded">
                                <span class="ti-user fa fa-book icon-sm color-secondary d-block mr-3"></span>
                                <div class="d-block">
                                    <h5 class="mb-0">Subject</h5>
                                    <p>{{ $research->subject }}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3 p-4 rounded">
                                <span class="ti-time fa fa-money-bill-alt icon-sm color-secondary d-block mr-3"></span>
                                <div class="d-block">
                                    <h5 class="mb-0">Fund Goal</h5>
                                    <p>Rs.{{ number_format($research->goal_amount, 2)}}</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3 p-4 rounded">
                                <span class="ti-time fa fa-money-bill-alt icon-sm color-secondary d-block mr-3"></span>
                                <div class="d-block">
                                    <h5 class="mb-0">Goal Remaining</h5>
                                    @if($research->getRemainingFundValue() > 0)
                                    <p>Rs.{{ number_format($research->getRemainingFundValue() , 2)}}</p>
                                    @else
                                    <p>Goal Reached</p>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--project details row start-->
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="project-details-content">
                        <h5>Project Description</h5>
                        <p>{{ nl2br($research->content) }}</p>
                        <h5>Contact Researcher(s)</h5>
                        <ul>
                            <li>Email: {{$research->user->getConcealedEmail()}}</li>
                            <li>Phone: {{$research->user->getConcealedPhone()}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <br><hr><br>
            <div style="text-align: center;">
                <h4>Top Investors</h4>
                <!--project details row end-->
                <div style="display: inline-flex;">
                    <ul class="project-info-list" style="display: inline-flex;">
                        @foreach($research->transactions()->where("status", "SUCCESS")->orderBy("amount", "desc")->simplePaginate(5) as $txn)
                        <li class="d-flex align-items-center mb-3 p-4 rounded " style="margin: 20px;">
                            <span class="ti-user fa fa-money-check icon-sm color-secondary d-block mr-3"></span>
                            <div class="d-block">
                                <h5 class="mb-0"><a href="{{ route("investor.profile.public", ['investor' => $txn->investor]) }}">{{$txn->investor->name}}</a></h5>
                                <p>Rs.{{number_format($txn->amount, 2)}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--project details section end-->

    <!--call to action section start-->
    <section class="call-to-action py-5 gray-light-bg">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-7">
                    <div class="subscribe-content">
                        <h3 class="mb-1">Fund {{ $research->title}}</h3>
                        <p>Support this research by contributing directly to the researcher(s).</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-btn text-lg-right text-sm-left">
                        <a href="{{ route("research.fund", ['research' => $research]) }}" class="btn secondary-solid-btn" >Fund Now with PayTM</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action section end-->
@endsection
