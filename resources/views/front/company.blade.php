@extends('front.master-other')

@section('content')
	<!--Page Title-->
    <section class="page-title">
		<div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
    	<div class="auto-container">
			<h2>RoyalTech Computers Limited</h2>
			<ul class="page-breadcrumb">
				<li><a href="{{url('/')}}">home</a></li>
				<li>About Us</li>
                {{-- <li>Excellence Title</li> --}}
			</ul>
        </div>
    </section>
    <!--End Page Title-->


<!-- About Section -->
<section class="about-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="title">ABOUT COMPANY</div>
            {{-- <h2>You Can never go wrong with <br> Computers.</h2> --}}
        </div>
        <div class="row clearfix">

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="text">
                        RoyalTech is the partner of choice for many of the world’s leading Brands, Such as HP, Toshiba, Lenovo, Acer among others. We help Individuals, SMEs and Corporates elevate their value through custom hardware options, product delivery, QA and consultancy services.

                     </div>
                    <div class="blocks-outer">

                        <!-- Feature Block -->
                        <div class="feature-block">
                            <div class="inner-box">
                                <div class="icon fa fa-binoculars"></div>
                                <h6>OUR VISION</h6>
                                <div class="feature-text">To Be A Global Center For Technology Machines And Computer Retailing Power House With
                                    World Class Excellence In Providing Technological And Connectivity Services.</div>
                            </div>
                        </div>

                        <div class="feature-block">
                            <div class="inner-box">
                                <div class="icon flaticon-award-1"></div>
                                <h6>OUR MISSION</h6>
                                <div class="feature-text">Our Mission Is To Put Everything Into Play And Bring The World Into Attention Of Technology.
                                    We Do This By Bringing In Technology And Computers Closer To Communities, Businesses And
                                    Individuals, So That They Transform The World.</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block">
                            <div class="inner-box">
                                <div class="icon flaticon-technical-support"></div>
                                <h6>OUR PURPOSE</h6>
                                <div class="feature-text">Our Purpose Is To Unite The World With One Big Global Language Of Technology And
                                    Connectivity</div>
                            </div>
                        </div>

                    </div>

                    <a href="https://www.youtube.com/watch?v=lQ4y_POCT20" class="lightbox-image theme-btn btn-style-one"><span class="txt"><i class="play-icon"><img src="{{asset('corporate/images/icons/play-icon.png')}}" alt="" /></i>&ensp; Virtual Tour </span></a>
                    <a target="new" href="{{url('/')}}/e-commerce" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a>
                </div>
            </div>

            <!-- Images Column -->
            <div class="images-column col-lg-6 col-md-12 col-sm-12">
                {{-- <div class="inner-column" style="background-image: url('{{asset('corporate/images/icons/globe.png')}}')"> --}}
                    <div class="pattern-layer" style="background-image: url('{{asset('corporate/images/background/pattern-1.png')}}')"></div>
                    <div class="images-outer parallax-scene-1">
                        <div style="border-radius:10%" class="image" data-depth="0.10">
                            <img style="border-radius:10%" src="{{url('/')}}/uploads/portfolio/GT-2.jpeg" alt="" />
                        </div>

                    </div>
                </div>
                {{-- <a href="{{url('/')}}/laptops-for-hire" class="learn"><span class="arrow flaticon-long-arrow-pointing-to-the-right"></span>Learn More About Our Story</a> --}}


            </div>

        </div>
    </div>
</section>
<!-- End About Section -->

	<!-- Technology Section -->
	<section id="story" class="technology-section style-two" style="background-image: url('{{asset('corporate/images/background/bg.jpg')}}')">
		<div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-5.png')}}')"></div>
		<div class="pattern-layer-two" style="background-image: url('{{asset('corporate/images/background/pattern-6.png')}}')"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<div class="title">Our Story</div>
				{{-- <h2>Tech Solutions Tailored <br> Just for You</h2> --}}
			</div>
			<div class="row clearfix">

                <p style="max-width:800px; color:#ffffff; margin:0 auto; font-size:15px">
                    Royaltech computers was first registered as a business on 6th Aug, 2019 operating in Nairobi
                    CBD Tembo House Building. It was then incorporated into a limited liability company on 16th
                    June 2021 and has since moved its location to Old Nation House where it continues to offer
                    top notch Tech services and solutions.<br> The Company has highly qualified and experienced
                    personnel dedicated to providing quality IT goods and services to the clients.<br>
                    The Business was founded by KENNEDY KIGEN who is the ensures smooth running of the
                    day to day business. Various technical departments are headed by qualified personnel. Our
                    personnel or rather work force is well experienced in sourcing, procuring and delivering of
                    required items within or less than the stipulated time.
                    Quality is our top priority in meeting our clients changing needs and emerging modern
                    trends. Our staff is our greatest asset comprising permanent employees and several
                    associates always available at short notice.... Well, We are still writing our story <span class="fa fa-smile-o"></span>
                    Be part of <a style="font-weight: 800; color:#ffffff;" href="{{url('/')}}/contact-us">the story</a>
                </p>

			</div>
		</div>
	</section>
	<!-- End Technology Section -->
    @include('front.news')

    	<!-- Team Section Two -->
	<section class="team-section-two" style="background-image: url('{{asset('corporate/images/background/2.jpg')}}')">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">OUR DEDICATED TEAM</div>
						<h2>We have a good team <br> of Expert </h2>
					</div>
					<div class="pull-right">
						<div class="text">Our goal is to help our companies maintain or achieve best- in-class <br> positions in their respective industries and our team works.</div>
					</div>
				</div>
			</div>
			<div class="row clearfix">

				<!-- Team Block -->
				<div class="team-block-two col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="#"><img src="{{url('/')}}/uploads/kenkigen.jpeg" alt="Ken Kigen" /></a>
						</div>
						<div class="lower-box">
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f"></a></li>
								<li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
							</ul>
							<div class="content">
								<h5><a href="#">Kennedy Kigen</a></h5>
								<div class="designation">Chief Consultant</div>
							</div>
						</div>
					</div>
				</div>




			</div>
		</div>
	</section>
	<!-- End Team Section Two -->
@endsection

