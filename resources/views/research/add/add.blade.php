@extends('layouts.blank')
@section('title')
Add Research
@endsection
@section('subheading')
Showcase your research to the world
@endsection
@section("content")
<form action="{{ route("research.add.post") }}" method="post" autocomplete="off" enctype="multipart/form-data">
@csrf
<section class="team-two-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <div class="form-group">
                    <label class="pb-1">Title</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="Covid-19 Molecular Propogation"  name="title" value="{{ old("title") }}" required autocomplete autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Short Description</label>
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" row="9" placeholder="Tell us about your research." name="description" value="" required>{{ old("description") }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Content</label>
                    <div class="input-group input-group-merge">
                        <textarea class="form-control" row="9" placeholder="Tell us about your research in an elaborative way." name="content" value="" required>{{ old("content") }}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="pb-1">Profile Photo (1200px x 800px)  </label>
                    <div class="input-group input-group-merge">
                        <input type="file" class="form-control"  required  name="image" required >
                    </div>
                </div>
                
                
            </div>
            <div class="col-md-6 col-lg-6">

                <div class="form-group">
                    <label class="pb-1">Goal amount (in INR)</label>
                    <div class="input-group input-group-merge">
                        <input type="number" class="form-control" placeholder="Rs. 30000"  name="amount" required autocomplete autofocus value="{{ old("amount") }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Bank IFSC</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="SBIN0012345"  name="bank_ifsc" required autocomplete autofocus value="{{ old("bank_ifsc") }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Bank Account Number</label>
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="202319220215"  name="bank_account_no" required autocomplete autofocus value="{{ old("bank_account_no") }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Subject</label>
                    <div class="input-group input-group-merge">
                        <select name="subject" id="subject" class="form-control" required="required">
                            <option >Select</option>
                            <option >Medical</option>
                            <option >Chemistry</option>
                            <option >Botany</option>
                            <option >Mathematics</option>
                            <option >Physics</option>
                            <option >Geography</option>
                            <option >Geology</option>
                            <option >Astrophysics</option>
                            <option >Big Data</option>
                            <option >Computer Science</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pb-1">Tags</label>
                    <div class="input-group input-group-merge">
                        <select class="select2tags form-control" required name="tags[]" multiple="multiple">
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
        <input type="submit" class="btn btn-success btn-block " value="Add Research">
        
    </div>
</section>
</form>
@endsection

