@extends('layouts.blank')
@section('title')
{{ $heading}}
@endsection
@section('subheading')
{{ $subheading}}
@endsection
@section("content")
<section class="our-blog-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="section-heading mb-5">
                        <h2>{{ $heading}}</h2>
                        <p class="lead">
                           {{ $subheading}}
                        </p>
                    </div>
                </div>
            </div>
            @if(count($researches))
            <div class="row">
                @foreach($researches as $research)
                <div class="col-md-4 col-lg-4">
                    @include("research.multiple.partials.grid")
                </div>
                @endforeach
            </div>

            <!--pagination start-->
            <div style="text-align: center;">
                {{$researches->links()}}
            </div>
            <!--pagination end-->
            @else
                
                    <div style="text-align: center;">
                        <h4>There is no research down here.</h4>
                        @if($shownewresearchbutton === true)
                        <a href="{{ route("research.add") }}" class="btn btn-secondary">Create Research</a>
                        @endif
                    </div>
            @endif

        </div>
    </section>
@endsection
