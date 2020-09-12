<div class="single-blog-card card border-0 shadow-sm">
    <span class="category position-absolute badge badge-pill badge-primary">{{ $research->subject }}</span>
    <img src="{{ asset("storage/profile/" . $research->image )}}" class="card-img-top position-relative" alt="blog">
    <div class="card-body">
        <h3 class="h5 mb-2 card-title"><a href="{{ route("research.view", ['research' => $research]) }}">{{ $research->title}}</a></h3>
        <div class="post-meta mb-2">
            <ul class="list-inline meta-list">
                <li class="list-inline-item">{{ $research->created_at->calendar()}}</li> 
                <li class="list-inline-item"><span class="badge badge-success">{{ $research->status }}</span> </li>
                {{-- <li class="list-inline-item"><span>10</span> Share</li> --}}
                @auth
                @if($research->user_id == Auth::user()->id)
                    <br><br>
                    <span style="display: inline-flex;">
                        <a style="color: white;" href="{{ route("research.edit", ['research' => $research ]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a> | 
                        <div class="dropdown">
                          <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Change Status
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="opacity: 100%;">
                            <a class="dropdown-item" href="{{ route("research.change.status", ['research' => $research, "status" => "LIVE"]) }}">LIVE</a>
                            <a class="dropdown-item" href="{{ route("research.change.status", ['research' => $research, "status" => "UNPUBLISH"]) }}">UNPUBLISH</a>
                          </div>
                        </div>
                    </span>
                @endif
                @endauth
            </ul>
        </div>
        <p class="card-text">{{ $research->description}}</p>
        <a href="{{ route("research.view", ['research' => $research]) }}" class="detail-link">Read more <span class="ti-arrow-right fa fa-arrow-right"></span></a>
    </div>
</div>