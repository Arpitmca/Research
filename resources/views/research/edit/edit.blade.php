@extends('layouts.blank')
@section('title')
Edit Research
@endsection
@section('subheading')
{{ $research->title }}
@endsection
@section("content")
<form action="{{ route("research.edit.post", ['research' => $research]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
@csrf
<section class="team-two-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="pb-1">Title</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="Covid-19 Molecular Propogation"  name="title" value="{{ $research->title }}" required autocomplete autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Short Description</label>
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" row="9" placeholder="Tell us about your research." name="description" value="" required>{{ $research->description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Content</label>
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" row="9" placeholder="Tell us about your research in an elaborative way." name="content" value="" required>{{ $research->content }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="pb-1">Profile Photo (1200px x 800px)  (Optional)</label>
                    <div class="input-group input-group-merge">
                        <input type="file" class="form-control"    name="image"  >
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-6 col-lg-6">

                <div class="form-group">
                    <label class="pb-1">Goal amount (in INR)</label>
                    <div class="input-group input-group-merge">
                        <input type="number" class="form-control" placeholder="Rs. 30000"  name="amount" required autocomplete autofocus value="{{ $research->goal_amount }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Bank IFSC</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="SBIN0012345"  name="bank_ifsc" required autocomplete autofocus value="{{ $research->bank_account_ifsc }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Bank Account Number</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="202319220215"  name="bank_account_no" required autocomplete autofocus value="{{ $research->bank_account_number }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Subject</label>
                    <div class="input-group input-group-merge">
                        <select name="subject" id="subject" class="form-control" required="required">
                            <option >Select</option>
                            <option @if($research->subject == "Medical") selected="selected" @endif >Medical</option>
                            <option @if($research->subject == "Chemistry") selected="selected" @endif >Chemistry</option>
                            <option  @if($research->subject == "Botany") selected="selected" @endif >Botany</option>
                            <option  @if($research->subject == "Mathematics") selected="selected" @endif >Mathematics</option>
                            <option  @if($research->subject == "Physics") selected="selected" @endif >Physics</option>
                            <option  @if($research->subject == "Geography") selected="selected" @endif >Geography</option>
                            <option  @if($research->subject == "Geology") selected="selected" @endif >Geology</option>
                            <option  @if($research->subject == "Astrophysics") selected="selected" @endif >Astrophysics</option>
                            <option  @if($research->subject == "Big Data") selected="selected" @endif >Big Data</option>
                            <option  @if($research->subject == "Computer Science") selected="selected" @endif >Computer Science</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Tags</label>
                    <div class="input-group input-group-merge">
                        <select class="select2tags form-control" required name="tags[]" multiple="multiple">
                            @foreach(json_decode($research->tags) as $tag)
                                <option selected="selected">{{$tag}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
        <input type="submit" class="btn btn-success btn-block " value="Edit {{$research->title}}">
        
    </div>
</section>
</form>
@endsection

