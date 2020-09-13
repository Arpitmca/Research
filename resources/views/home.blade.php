@extends('layouts.onlynav')
@section('title')
Get Your Research Funded
@endsection
@section('subheading')
A little about ourselves.
@endsection
@push("head")
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
@endpush
@push("scripts")
<script>
    var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['USA','India','China','Japan','S.Korea','Brazil','UK','Russia','France'],
        datasets: [{
            label: 'GDP % of country spend in research work',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [2.74, 0.85, 2.19, 3.15, 4.29, 1.26, 1.7, 1.18, 1.17]
        }]
    },

    // Configuration options go here
    options: {}
});
var ctx = document.getElementById('chart2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Amazon(USA)','Alphabet(USA)','Samsung(S.Korea)','Huawei(China)','Johnson & Johnson(USA)','Volkswagen(Germany)'],
        datasets: [{
            label: 'Top Company spend in research work (In Billion US$)',
            backgroundColor: 'rgb(127, 184, 253)',
            borderColor: 'rgb(127, 184, 253)',
            data: [22.62, 16.23, 15.31, 13.60, 10.55, 15.77,]
        }]
    },

    // Configuration options go here
    options: {}
});
  </script>
@endpush
@section("content")
<!--hero section start-->
    <section class="hero-equal-height pt-165 pb-100" style="background: url('img/bg-illustration.svg')no-repeat center center / cover">
        <div class="hero-bottom-shape-two" style="background: url('img/hero-bottom-shape.svg')no-repeat bottom center"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="hero-slider-content text-white z-index position-relative">
                        <h1 class="text-white">Fund Your Ideas Innovate India</h1>
                        <p class="lead">Various funding agencies are available which provide grants for research in a various field. This platfrom directly connects you to trusted investors.</p>

                        <div class="action-btns mt-3">
                            <a href="{{ route("register") }}" class="btn accent-solid-btn">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="hero-animation-img">
                        <img src="img/hero-animation-01.svg" alt="hero" class="img-fluid d-none d-lg-block animation-two" width="180">
                        <img src="img/hero-single-img-5.svg" alt="hero" class="animation-one img-fluid custom-width">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-block ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4 dot-bg-shape dot-bg-1">
                    <div class="promo-counter text-center white-bg p-5">
                        <div class="counter-number d-inline-flex align-items-center mb-4">
                            <h2 class="mb-0">100%</h2> <span class="color-5 color-5-bg ml-2 p-2 rounded-circle">
                            <i class="fas fa-arrow-up icon-25"></i>
                        </span>
                        </div>
                        <h5>Cost Effectiveness</h5>
                        <p>Zero investment project hosting. No hidden caveats.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 dot-bg-shape dot-bg-2">
                    <div class="promo-counter text-center white-bg p-5">
                        <div class="counter-number d-inline-flex align-items-center mb-4">
                            <h2 class="mb-0">100%</h2> <span class="color-5 color-5-bg ml-2 p-2 rounded-circle">
                            <i class="fas fa-arrow-up icon-25"></i>
                        </span>
                        </div>
                        <h5>Trustworthy</h5>
                        <p>Compellingly benchmark superior opportunities for the researchers and investors</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 dot-bg-shape dot-bg-3">
                    <div class="promo-counter text-center white-bg p-5">
                        <div class="counter-number d-inline-flex align-items-center mb-4">
                            <h2 class="mb-0">100%</h2> <span class="color-5 color-5-bg ml-2 p-2 rounded-circle">
                            <i class="fas fa-arrow-up icon-25"></i>
                        </span>
                        </div>
                        <h5>Data Visualization</h5>
                        <p>Synergistically aggregate installed base growth strategies through an expanded functionalities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->
       <section class="about-us-section pb-100">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="video-promo-content mb-md-4 mb-lg-0">
                        <h2>Graph: GDP % spend in research work by top countries</h2>
                        <p>As we can from graph india has the lowest in spending in research work as compare to top GDP Countries which leads to economic and development down. (Source: <a href="https://en.wikipedia.org/wiki/List_of_countries_by_research_and_development_spending">Wikipedia</a>)</p>
                        <ul class="list-unstyled tech-feature-list">
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>India's investment 0.8%</strong> in Researches</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span>Highest Investment By South Korea more than<strong> 4%</strong> of their GDP</li>
                            <!-- <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Security</strong> Accounting Fundamentals</li> -->
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>by N.R. Narayana Murthy</strong> (founder of Infosys.)<blockquote>&ldquo;We have to get to four-five per cent of the GDP in research, including government and the private sector. If we did that we would solve a lot of problems.&rdquo;</blockquote></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="image-wrap">
                        <canvas id="chart" height="350" width="400"></canvas>
                        <!-- <img src="img/hero-single-img-1.svg" alt="video" class="img-fluid"> -->
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                 <div class="col-md-12 col-lg-6">
                    <div class="image-wrap">
                        <canvas id="chart2" height="350" width="400"></canvas>
                        <!-- <img src="img/hero-single-img-1.svg" alt="video" class="img-fluid"> -->
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="video-promo-content mb-md-4 mb-lg-0">
                        <h2>Graph: Top company's investment in research works</h2>
                        <p>As we seen their is no company from india in top who investing in reseaches hence that means here development is seems to be slow. (Source: <a href="https://en.wikipedia.org/wiki/List_of_companies_by_research_and_development_spending">Wikipedia</a>)</p></p>
                        <ul class="list-unstyled tech-feature-list">
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Amazon (USA)</strong>Invested Most.</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span>Mostly Top Company's belong to <strong>technology & Medical</strong> Fields</li>
                           <!--  <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Security</strong> Accounting Fundamentals</li> -->
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>India underspends on R&D compared to what the U.S. and China did when it had income levels comparable to India’s now. </strong></li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Unless there is greater participation and cooperation at smaller levels among companies and government, central schemes may not be fruitful.</li>
                        </ul>
                    </div>
                </div>
               
            </div>
        </div>
    
    </section>
    <!--about us section start-->
    <section class="about-us-section pb-100">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12 col-lg-6">
                    <div class="video-promo-content mb-md-4 mb-lg-0">
                        <h2>More Research, Less Headache for funding</h2>
                        <p>With ResearchFund, our aim is to put researchers on their work rather than wandering for funds. With our wide audience and investors space, get your projects funded in a click.</p>
                        <ul class="list-unstyled tech-feature-list">
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span>Extensible <strong>easy</strong> project showcasing</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Fraud </strong> prevention system</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Governance </strong> and Audit compliant</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Security & Privacy</strong> Implemented</li>
                            <li class="py-1"><span class="fas fa-dot-circle mr-2 color-secondary"></span><strong>Customizable </strong> amount to fund.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="image-wrap">
                        <img src="img/hero-single-img-1.svg" alt="video" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <!--services section start-->
    <section class="services-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-heading text-center mb-5">
                        <h2>What we offer</h2>
                        <p class="lead">Let's have a look at our capability,commitment,trust-worthy features which can make your dream true.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/consult.svg" alt="consulting" width="80" class="mb-3">
                        <h5>Funding Ideas</h5>
                        <p class="mb-0">We help the researchers having great ideas of research in any field but unable to get fund to proceed</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/machine-learning.svg" alt="consulting" width="80" class="mb-3">
                        <h5>No More Rush For Fund</h5>
                        <p class="mb-0">Help you find person or organisation to fund for your research by sitting at your home.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/data-analytics.svg" alt="consulting" width="80" class="mb-3">
                        <h5>Trustworthy</h5>
                        <p class="mb-0">If Research will benefit humankind and Develop our country then just connect with us you will be funded.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/data-security.svg" alt="consulting" width="80" class="mb-3">
                        <h5>Hassle free movement</h5>
                        <p class="mb-0">yes that the way we work all paper work,agreement etc will be done by us so you should free of that headache for both party.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/internet-things.svg" alt="consulting" width="80" class="mb-3">
                        <h5>Easily Find Researchers</h5>
                        <p class="mb-0">we help investors to find the researches in a Field in which they are interested. We take your fund not goes to wrong hand.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-single animated-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded">
                        <img src="img/artificial-intelligence.svg" alt="consulting" width="80" class="mb-3">
                        <h5>100% Satistified</h5>
                        <p class="mb-0">Our first priority is user satisfaction,connect with us & lead to increased innovation, prestige and economic activity.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services section end-->

    <!--promo section start-->
    <section class="promo-section gradient-overlay ptb-100" style="background: url('img/slider-img-2.jpg')no-repeat center center / cover fixed">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="app-business-content text-center text-white">
                        <h2 class="text-white">Take us to your finger tips.</h2>
                        <p class="lead">Make use of our native apps for easy turning back up us with realtime notifications and more. </p>

                        <div class="action-btns mt-5">
                            <ul class="list-inline app-download-list">
                                <li class="list-inline-item">
                                    <a href="index.html#" class="d-flex align-items-center border rounded">
                                        <span class="fab fa-windows icon-sm mr-3"></span>
                                        <div class="download-text text-left">
                                            <span>Download from</span>
                                            <h5 class="mb-0">Windows Store</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="index.html#" class="d-flex align-items-center border rounded">
                                        <span class="fab fa-apple icon-sm mr-3"></span>
                                        <div class="download-text text-left">
                                            <span>Download from</span>
                                            <h5 class="mb-0">App Store</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="index.html#" class="d-flex align-items-center border rounded">
                                        <span class="fab fa-google-play icon-sm mr-3"></span>
                                        <div class="download-text text-left">
                                            <span>Download from</span>
                                            <h5 class="mb-0">Google Play</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--our work process section start-->
    <section class="work-process-new ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2>The Flow</h2>
                        <p class="lead">Series of sequential tasks that are carried out based on user-defined rules or conditions, to execute a quick fund initiate process. let's see how you got funds.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="work-process-wrap text-center">
                        <div class="single-work-process">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti-vector fas fa-cloud-upload-alt icon-md text-white"></i>
                                <span class="process-step white-bg color-primary shadow-sm">1</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Upload your Research</h5>
                                <p>Just Sign up and make your profile & tell us what's your research work.</p>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti-layout-list-thumb fab fa-searchengin icon-md text-white"></i>
                                <span class="process-step white-bg color-primary shadow-sm">2</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Analyzing & Search</h5>
                                <p>Analyzing your idea and we search a perfect investor for you.</p>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti-palette fas fa-exchange-alt exchange-alt icon-md text-white"></i>
                                <span class="process-step white-bg color-primary shadow-sm">3</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Direct Negotiation</h5>
                                <p>Fix a meeting with the investor. You can direct negotiate with them.</p>
                            </div>
                        </div>
                        <div class="single-work-process">
                            <div class="work-process-icon-wrap secondary-bg rounded">
                                <i class="ti-cup far fa-money-bill-alt icon-md text-white"></i>
                                <span class="process-step white-bg color-primary shadow-sm">4</span>
                            </div>
                            <span class="work-process-divider"></span>
                            <div class="work-process-content mt-4">
                                <h5>Successfully Funded</h5>
                                <p>We will take care of all paper work of both parties.You will be funded that's simple. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our work process section end-->

    <!--our work or portfolio section start-->
    
    <!--our work or portfolio section end-->

    <!--blog section start-->
  
    <!--blog section end-->

    <!--testimonial section start-->
    <section class="testimonial-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading mb-5 text-center">
                        <h2>Testimonials what clients say</h2>
                        <p class="lead">
                            Check out some of our users
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                        <blockquote>
                            This platfrom is really very helpful for the researchers who are unable to get enough fund for thier research. One can simply showcase his research idea and anybody who is interested can fund with some little negotiations
                        </blockquote>
                        <div class="client-ratting mt-2">
                            <ul class="list-inline client-ratting-list">
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                            </ul>
                            <h6 class="font-weight-bold">5.0 <small class="font-weight-lighter"></small></h6>
                        </div>
                    </div>
                    <div class="client-info-wrap d-flex align-items-center mt-5">
                        <div class="client-img mr-3">
                            <img src="/img/client-1.jpg" alt="client" width="60" class="img-fluid rounded-circle shadow-sm"/>
                        </div>
                        <div class="client-info">
                            <h5 class="mb-0">Radha Krishanan</h5>
                            <p class="mb-0">RadheLabs, Karnataka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                        <blockquote>
                            Wow! i was facing fund crunch in my recent research this platfrom helped me alot, Thank You Team ResearchFundices. Compellingly revolutionize worldwide users vis-a-vis enterprise best practices.
                        </blockquote>
                        <div class="client-ratting mt-2">
                            <ul class="list-inline client-ratting-list">
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                            </ul>
                            <h6 class="font-weight-bold">5.0 <small class="font-weight-lighter"></small></h6>
                        </div>
                    </div>
                    <div class="client-info-wrap d-flex align-items-center mt-5">
                        <div class="client-img mr-3">
                            <img src="/img/client-2.jpg" alt="client" width="60" class="img-fluid rounded-circle shadow-sm"/>
                        </div>
                        <div class="client-info">
                            <h5 class="mb-0">Preeti Karol</h5>
                            <p class="mb-0">CompurScience, Noida</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="testimonial-single shadow-sm gray-light-bg rounded p-4">
                        <blockquote>
                            Ummmm! Idea is quite interesting, no more rush for funds!! 
                            <br>
                            <br>
                            <br>
                            It will really improve the research work in our beloved country.
                        </blockquote>
                        <div class="client-ratting mt-2">
                            <ul class="list-inline client-ratting-list">
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                                <li class="list-inline-item"><span class="fas fa-star ratting-color"></span></li>
                            </ul>
                            <h6 class="font-weight-bold">5.0 <small class="font-weight-lighter"></small></h6>
                        </div>
                    </div>
                    <div class="client-info-wrap d-flex align-items-center mt-5">
                        <div class="client-img mr-3">
                            <img src="/img/client-3.jpg" alt="client" width="60" class="img-fluid rounded-circle shadow-sm"/>
                        </div>
                        <div class="client-info">
                            <h5 class="mb-0">Aminul Islam</h5>
                            <p class="mb-0">Hyderabad</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--testimonial section end-->


    <!--team two section start-->
    <section class="team-two-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2>Ferocious Team</h2>
                        <p class="lead">Connect with our team who made ResearchFund made possible.</p>
                    </div>
                </div>
            </div>
             <div class="row">

                <div class="col-md-4" >
                    <div class="staff-member">
                        <div class="card text-center border-0">
                            <img src="img/arpit.jpg" alt="team image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Arpit Kumar Gupta</h5>
                                <span>Team Leader ( UI/UX and PHP <br>developer)</span>
                                <ul class="list-inline pt-2 social">

                                    <li class="list-inline-item"><a href="https://www.linkedin.com/search/results/all/?keywords=arpit%20kumar%20gupta%20amu&origin=TYPEAHEAD_ESCAPE_HATCH" class="btn outline-white-btn" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Dramatically leverage existing fully researched platfroms vis-a-vis viral." </p><a
                                    href="index.html#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Arpit Kumar Gupta</h5></a>
                                <span class="teacher-field text-white">Team Leader (UI/UX and PHP developer)</span>
                                <ul class="list-inline py-4 social">
       
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/search/results/all/?keywords=arpit%20kumar%20gupta%20amu&origin=TYPEAHEAD_ESCAPE_HATCH" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a href="https://www.linkedin.com/search/results/all/?keywords=arpit%20kumar%20gupta%20amu&origin=TYPEAHEAD_ESCAPE_HATCH" class="btn outline-white-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="staff-member">
                        <div class="card text-center border-0">
                            <img src="/img/maaz.jpg" alt="team image" class="card-img-top">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Mohd. Maaz Azhar</h5>
                                <span>Team Member (Content Writer & PHP Developer)</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/mohd-maaz-azhar-57847716b/" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Credibly extend high-payoff web-readiness via top-line relationships." </p><a
                                    href="index.html#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Mohd. Maaz Azhar</h5></a><span class="teacher-field text-white">Team Member (Content Writer & PHP Developer)</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/mohd-maaz-azhar-57847716b/" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a href="https://www.linkedin.com/in/mohd-maaz-azhar-57847716b/" class="btn outline-white-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="staff-member">
                        <div class="card text-center border-0">
                            <img src="/img/adnan.jpg" alt="team image" class="img-fluid">
                            <div class="card-body">
                                <h5 class="teacher mb-0">Mohd. Adnan</h5>
                                <span>Team Member (PHP Framework & DBMS Developer)</span>
                                <ul class="list-inline pt-2 social">
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-dribbble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <div class="overlay-inner">
                                <p class="teacher-quote">"Authoritatively evolve stand-alone e-tailers whereas prospective partnerships." </p><a
                                    href="index.html#" class="teacher-name">
                                <h5 class="mb-0 teacher text-white">Mohd. Adnan</h5></a>
                                <span class="teacher-field text-white">Team Member (PHP Framework & DBMS Developer)</span>
                                <ul class="list-inline py-4 social">
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-facebook"></span></a></li>
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-linkedin"></span></a></li>
                                    <li class="list-inline-item"><a href="index.html" target="_blank"><span
                                            class="fa fa-dribbble"></span></a></li>
                                </ul>
                                <p class="teacher-see-profile">
                                    <a target="_blank" href="https://www.linkedin.com/in/adnanhussainturki/" class="btn outline-white-btn">View my profile</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--team two section end-->

    <!--call to action section start-->
    <section class="call-to-action py-5">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-7">
                    <div class="subscribe-content">
                        <h3 class="mb-1">Facing some issue?</h3>
                        <p>Get connected with us, right now with no contact froms. Just WhatsApp us.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="action-btn text-lg-right text-sm-left">
                        <a href="https://api.whatsapp.com/send?phone=+917599236836&text=Hi, I am come to your via ResearchFund website. I need some help." class="btn secondary-solid-btn"><i class="fa fa-whatsapp"></i> WhatsApp Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action section end-->
@endsection
