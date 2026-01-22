@extends('front.master')

@section('content')
<!-- Banner Section Three -->
<section class="banner-section-three">
    <div class="main-slider-carousel owl-carousel owl-theme">

        <div class="slide" style="background-image: url('{{url('/')}}/uploads/side_view_laptop_pc_with_color_light_dark_technology_gaming_concepts.jpg'); background-position: 68% 100% !important;">
            <div class="color-layer"></div>
            {{-- <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/main-slider/pattern-7.png')}}'); "></div> --}}
            <div class="auto-container">
                <!-- Content Column -->
                <div class="content-column clearfix">
                    <div class="inner-column">
                        <h1>Laptops for Hire.</h1>
                        {{-- <div class="text">We are Kenya's best Information Technology Company. Providing the highest quality in hardware & Network solutions. About more than 8 years of experience and 1000+ of innovative achievements.</div> --}}
						<div class="text">
							We are Kenya's best Information Tech Company. We offer the best deals where You can lease a laptop from Royaltech for as long or as little as you need.
							We lend out a variety of computers that may be needed for work, projects, seminars, and other purposes.

						</div>
                        <div class="button-box">
                            <a href="{{url('/')}}/laptops-for-hire" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-laptop"></span> Laptop Hire</span></a>
                            <a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a>
                            <a download="Company Profile"  href="{{url('/')}}/uploads/Laptops-Hire-Brochure.pdf" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-download"></span> Download Profile</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</section>

<!-- About Section -->
<section class="about-section leasing-services-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title">
            <div class="title">Laptop Leasing Services</div>
            <p class="section-subtitle">Premium Technology Solutions for Your Business Needs</p>
        </div>
        <div class="row clearfix">

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    {{--  --}}
                    <div class="content">
                        <div class="content-wrapper">
                            <p class="lead-text">If you're looking for a reliable and cost-effective solution for short-term computer needs, laptop hire is an excellent choice. Whether you're a small business, a conference organizer, or an individual, renting laptops can provide you with the technology you need, when you need it.</p>

                            <p>Laptop hire offers a range of benefits over purchasing laptops outright. For starters, it can save you money in the long run, as you won't have to pay for the cost of buying new laptops every time your needs change. Additionally, you can rent the latest models and technology, without having to worry about maintenance, repairs or upgrades.</p>

                            <p>At the same time, laptop hire is a flexible option, allowing you to rent the equipment for the specific duration you need, from just a few days to several months. You can choose the number of laptops required, the software and specifications that best suit your needs, and even have them delivered and collected from your location.</p>
                        </div>

                        <!-- Key Features -->
                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-check-circle"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Latest Technology</h5>
                                    <p>Access to newest models & specs</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-usd"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Cost Effective</h5>
                                    <p>Save money without long-term commitment</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Flexible Duration</h5>
                                    <p>Rent from days to months</p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-wrench"></span>
                                </div>
                                <div class="feature-content">
                                    <h5>Full Support</h5>
                                    <p>Maintenance & technical assistance included</p>
                                </div>
                            </div>
                        </div>

                        <div class="btn-box">
                            <a href="{{url('/')}}/laptops-for-hire#hire" class="theme-btn btn-style-three btn-primary-large">
                                <span class="txt">Get Started Now <span class="fa fa-arrow-right"></span></span>
                            </a>
                            <a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-three btn-secondary-large">
                                <span class="txt">View Our Products <span class="fa fa-shopping-cart"></span></span>
                            </a>
                            {{-- <a href="http://localhost:8000/macbook-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-desktop"></span> Rent Macbook Instead</span></a>
                            <a href="http://localhost:8000/e-commerce" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a> --}}
                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>

            <!-- Images Column -->
            <div class="images-column col-lg-6 col-md-12 col-sm-12">
                <div class="pattern-layer"></div>
                <div class="images-outer parallax-scene-1">
                    <div class="image-wrapper">
                        <div class="image" data-depth="0.10">
                            <img src="{{url('/')}}/uploads/portfolio/GT-2.jpeg" alt="Laptop Leasing Services" />
                        </div>
                        <div class="image-badge">
                            <span class="badge-text">10+ Years</span>
                            <span class="badge-subtext">Experience</span>
                        </div>
                    </div>
                    <div class="image-wrapper image-wrapper-second">
                        <div class="image" data-depth="0.10">
                            <img src="{{url('/')}}/uploads/portfolio/GT-1.jpeg" alt="Laptop Leasing Services" />
                        </div>
                    </div>
                </div>
                <!-- Stats Box -->
                <div class="stats-box">
                    <div class="stat-item">
                        <div class="stat-number">1000+</div>
                        <div class="stat-label">Laptops Available</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>
                {{-- <a href="{{url('/')}}/laptops-for-hire" class="learn"><span class="arrow flaticon-long-arrow-pointing-to-the-right"></span>Learn More About Our Story</a> --}}


            </div>

        </div>
    </div>
</section>
<!-- End About Section -->


<section class="gallery-section cases-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">Center of Excellence</div>
            <p class="excellence-subtitle">
                Laptop Hire/Rental is tailor made for corporates use in Training, seminars, online work and research or remote working
            </p>
        </div>
        {{-- <div class="sec-title centered">
            <div class="title">LATEST CASE STUDIES</div>
            <h2>Reads Now Our Recent <br> Projects Studies</h2>
        </div> --}}
        <!--MixitUp Galery-->
        <div class="mixitup-gallery">



            <div class="filter-list row clearfix">


                <div class="case-block mix all design technology ideas col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img class="portfolio-image" src="{{url('/')}}/uploads/portfolio/GT-1.jpeg" alt="Guaranty Trust Bank" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/GT-1.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">Guaranty Trust Bank</a></h4>
                                    <div class="category">RoyalTech Computers LTD</div>
                                    <div class="category">Custom High Performance Laptops</div>
                                </div>
                                <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                            </div>
                        </div>
                    </div>
                </div>


                 <!-- Case Block -->
                 <div class="case-block mix all design technology ideas col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img class="portfolio-image" src="{{url('/')}}/uploads/portfolio/g3.jpg" alt="Muthaiga Golf Club" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/g3.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">Muthaiga Golf Club</a></h4>
                                    <div class="category">RoyalTech Computers LTD</div>
                                    <div class="category">Custom High Performance Laptops</div>
                                </div>
                                <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Case Block -->
                <div class="case-block mix all design technology ideas col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img class="portfolio-image" src="{{url('/')}}/uploads/portfolio/index1.jpeg" alt="IEBC Tallying Center" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/index1.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">IEBC Tallying Center 2022 General Elections</a></h4>
                                    <div class="category">RoyalTech Computers LTD</div>
                                    <div class="category">Custom High Performance Laptops</div>
                                </div>
                                <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <center>
                <div class="btn-box ">
                    <a href="{{url('/')}}/laptops-for-hire#portfolio" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-laptop"></span> Learn More </span></a>
                    {{-- <a href="{{url('/')}}/the-company" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-lightbulb-o"></span> Learn More</span></a>
                    <a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a> --}}
                </div>
            </center>
        </div>
    </div>
</section>


	<!--End Sponsors Section-->
    @include('front.intro')

	<!-- Technology Section -->
	<section class="technology-section style-two" style="background-image: url('{{asset('uploads/portfolio/g2.jpg')}}');">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title mission-title">Mission . Vision . Strategy</div>
				<h2 class="mission-heading">Driving Client Results Utilizing New <br> Innovation </h2>
			</div>
			<div class="row clearfix">

				<!-- Process Block -->
				<div class="process-block col-lg-4 col-md-6 col-sm-12 text-center">
					<div class="inner-box wow fadeInLeft process-block-block mission-vision-card" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="icon-wrapper">
							<div class="icon-box mission-icon">
								<span class="fa fa-bullseye"></span>
							</div>
						</div>
						<h4><a href="#">Mission</a></h4>
						<p class="text">To Bring In technology closer to Communities &amp; Businesses so that they transform the World.</p>
						<div class="decorative-line"></div>
					</div>
				</div>

				<!-- Process Block -->
				<div class="process-block col-lg-4 col-md-6 col-sm-12 text-center">
					<div class="inner-box wow fadeInUp process-block-block mission-vision-card" data-wow-delay="200ms" data-wow-duration="1500ms">
						<div class="icon-wrapper">
							<div class="icon-box vision-icon">
								<span class="fa fa-eye"></span>
							</div>
						</div>
						<h4><a href="#">Vision</a></h4>
						<p class="text">To Be a global Technology Retailing Power house with world Class Products and Services.</p>
						<div class="decorative-line"></div>
					</div>
				</div>

				<!-- Process Block -->
				<div class="process-block col-lg-4 col-md-6 col-sm-12 text-center">
					<div class="inner-box wow fadeInRight process-block-block mission-vision-card" data-wow-delay="400ms" data-wow-duration="1500ms">
						<div class="icon-wrapper">
							<div class="icon-box strategy-icon">
								<span class="fa fa-cogs"></span>
							</div>
						</div>
						<h4><a href="#">Strategy</a></h4>
						<p class="text">We are a locally registered private limited company which deals in delivery of technology Solutions.</p>
						<div class="decorative-line"></div>
					</div>
				</div>

			</div>
            {{-- <div class="btn-box text-center">
                <a href="#" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-lightbulb-o"></span> Learn More</span></a>
                <a href="#" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a>
            </div> --}}
		</div>
	</section>
	<!-- End Technology Section -->

    @include('front.news')

    @include('front.clients')

    @include('front.brand')

    <section class="sponsors-section style-two">
        <img class="banner-image" alt="Royaltech Computers Limited" src="{{url('/')}}/uploads/banner.jpeg">
     </section>
     @include('front.benefits')
@endsection
