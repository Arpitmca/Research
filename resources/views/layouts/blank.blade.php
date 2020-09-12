<!doctype html>
<html lang="en">
@include("layouts.partials.head.head")
<body>
@include("layouts.partials.preloader.preloader")
<!--header section start-->
@include("layouts.partials.header.header")

<!--header section end-->

<!--body content wrap start-->
<div class="main">

    <!--header section start-->
    <section class="hero-section ptb-100 gradient-overlay"
             style="background: url('/img/header-bg-5.jpg')no-repeat center center / cover">
        <div class="hero-bottom-shape-two" style="background: url('/img/hero-bottom-shape.svg')no-repeat bottom center"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                        <h1 class="text-white mb-0">@yield("title")</h1>
                        <div class="custom-breadcrumb">
                            <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                @yield("subheading")
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--header section end-->
    @yield('content')

</div>
<!--body content wrap end-->
<!--footer section start-->
@include("layouts.partials.footer.footer")
<!--footer section end-->
<!--bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up fa fa-arrow-circle-up"></span>
</button>
<!--bottom to top button end-->

@include("layouts.partials.scripts.afterscript")

</body>
</html>