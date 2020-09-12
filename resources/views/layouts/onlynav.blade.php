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