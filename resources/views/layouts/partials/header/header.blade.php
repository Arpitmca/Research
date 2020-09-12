<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ route("home") }}">
                <img src="/img/logo-white.png" alt="logo" class="img-fluid"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu fa fa-rocket"></span>
            </button>
            <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">
                    <li><a  href="{{ route("home") }}">Home</a></li>
                    
                    <li><a  href="{{ route("researches") }}">Active Researches</a></li>
                    {{-- <li><a  href="{{ route("about") }}">Investors</a></li> --}}
                    {{-- <li><a  href="services.html">Services</a></li> --}}
                    <li><a  href="{{ route("about") }}">About Us</a></li>
                    @guest
                    <li><a  href="{{ route("login") }}">Sign In</a></li>
                    <li><a  href="{{ route("register") }}">Sign Up</a></li>
                    @else
                        <li><a href="#" class="dropdown-toggle"> {{ Auth::user()->name }}</a>
                            <ul class="sub-menu">
                                @if(Auth::user()->type == "R")
                                    <li><a href="{{route("research.mine")}}">My Researches</a></li>
                                @elseif((Auth::user()->type == "I"))
                                    <li><a href="{{ route("investor.mine") }}">My Investments</a></li>
                                @endif
                                @if(Auth::user()->type == "R")
                                    <li><a href="{{ route("researcher.profile") }}">My Profile</a></li>
                                @elseif((Auth::user()->type == "I"))
                                    <li><a href="{{ route("investor.profile") }}">My Profile</a></li>
                                @endif
                                <li><a href="{{ route("logout") }}">Sign out</a></li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>