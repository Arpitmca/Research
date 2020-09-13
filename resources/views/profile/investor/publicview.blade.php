@extends('layouts.blank')
@section('title')
{{$user->first_name}}'s Profile
@endsection
@section('subheading')
What we know about {{ $user->first_name }}
@if($user->transactions->where("status", "SUCCESS")->count())
   <br><a href="{{ route("investor.investments.public", ['investor' => $user]) }}" class="btn btn-secondary btn-sm ">{{ $user->first_name }}'s Investments</a>
@endif
@endsection
@section("content")
@if(!$user->isProfileCompleted())
<section class="team-two-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8">
                <div class="section-heading text-center mb-4">
                    <p class="lead">We do not have enough information regarding {{ $user->name }}</p>
                </div>
            </div>
        </div>
        
    </div>
</section>
@else 

<section class="team-single-section ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-sm-12 col-lg-5">
                    <div class="team-single-img">
                        <img src="{{ asset("storage/profile/" . $user->image) }}" alt="member" class="img-fluid rounded shadow-sm"/>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-6">
                    <div class="team-single-text">
                        <div class="team-name mb-4">
                            <h4 class="mb-1">{{ $user->name }}</h4>
                            <span>Joined {{$user->created_at->ago()}}</span>
                        </div>
                        <ul class="team-single-info">
                            <li><strong>Phone:</strong><span> {{ $user->contact}}</span></li>
                            <li><strong>Email:</strong><span> {{$user->email }} @if($user->email_verified_at) <span class="badge badge-success">Verified</span> @endif</span></li>
                        </ul>
                        <div class="text-content mt-20">
                            {{ $user->about }}
                        </div>
                        <ul class="team-social-list list-inline mt-4">
                            <li class="list-inline-item"><a href="{{ $user->linkedinurl}}" target="_blank" class="color-primary"><span class="fa fa-linkedin ti-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 col-sm-6 col-12">
                    <div class="section-heading">
                        <h5>Activities And Skills</h5>
                        <div class="section-heading-line-left"></div>
                    </div>
                    <ul class="list-unstyled tech-feature-list">
                        @if($user->activities)
                        @foreach($user->activities as $activity)
                         <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span>
                            {{ $activity}}
                         </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-12">
                    {{-- <div class="section-heading mt-40">
                        <h5>Professional Skills</h5>
                        <div class="section-heading-line-left"></div>
                    </div>
                    <div class="skill-content-wrap">
                        @foreach($user->professional as $pro)
                        <div class="progress-item">
                            <div class="progress-title">
                                <h6>{{$pro->text}}<span class="float-right"><span class="progress-number">{{$pro->value}}</span>%</span>
                                </h6>
                            </div>
                            <div class="progress">
                                <span style="width:{{$pro->value}}%;"><span class="progress-line"></span></span>
                            </div>
                        </div>
                        @endforeach
                     
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endif
@endsection
