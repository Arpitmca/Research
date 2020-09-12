@extends('layouts.blank')
@section('title')
Profile
@endsection
@section('subheading')
What we know about you, {{ Auth::user()->first_name }}
@endsection
@section("content")
<form action="{{ route("researcher.profile.edit.post") }}" method="post" autocomplete="off" enctype="multipart/form-data">
@csrf
<section class="team-two-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <h4>General information</h4>
                <div class="form-group">
                    <label class="pb-1">Name</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="Severous Snape"  name="name" value="{{ Auth::user()->name }}" required autocomplete autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Address</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="103, Howgarts"  name="address" value="{{ Auth::user()->address }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">City</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="New Delhi"  name="city" value="{{ Auth::user()->city }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">State/UT</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="New Delhi"  name="state" value="{{ Auth::user()->state }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Country</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="India"  name="country" value="{{ Auth::user()->country }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Pin Code</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="110001"  name="pin" value="{{ Auth::user()->pin }}" required  autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Contact Number</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="894561233"  name="contact" value="{{ Auth::user()->contact }}" required  autofocus>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6 col-lg-6">
                <h4>Specific Information</h4>
                <div class="form-group">
                    <label class="pb-1">About you</label>
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" placeholder="Experienced Owner with a demonstrated history of working in the Computer Software industry. Skilled in Mobile Application Development, PHP, Android, SPARQL, and Java. Strong business development professional with a Bachelor's degree focused in Mathematics from Aligarh Muslim University, Aligarh. " name="about" value="{{ Auth::user()->about }}" required>{{ Auth::user()->about }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Activities</label>
                    <div class="input-group input-group-merge">
                        <select class="select2tags form-control" required name="activities[]" multiple="multiple">
                            @if(Auth::user()->activities)
                            @foreach(Auth::user()->activities as $activity)
                                <option selected>{{$activity}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">4 Best Professional Skills</label>
                    <div class="input-group input-group-merge">
                        @for ($i = 0; $i < 4; $i++)
                            <div class="row">
                                <div class="col-md-8 col-lg-8 ">
                                    <input type="text" name="professional[{{$i}}][text]" placeholder="Skill Name" value="@if(Auth::user()->professional) {{ Auth::user()->professional[$i]->text}} @endif" required class="form-control">
                                </div>
                                <div class="col-md-4 col-lg-4 ">
                                    <input type="number" min='1' max="100" required name="professional[{{$i}}][value]" required class="form-control" placeholder="Score"value="@if(Auth::user()->professional) {{ Auth::user()->professional[$i]->value}} @endif">
                                    
                                </div>
                            </div>                        
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">LinkedIn Profile URL</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" name="linkedinurl" required value="{{Auth::user()->linkedinurl}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Profile Photo (500px x 500px) @if(Auth::user()->image) (Optional) @endif </label>
                    <div class="input-group input-group-merge">
                        <input type="file" class="form-control" @if(!Auth::user()->image) required @endif name="image" required >
                    </div>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-success btn-block " value="Save Changes">
        
    </div>
</section>
</form>
@endsection
