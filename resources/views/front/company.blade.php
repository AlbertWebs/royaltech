@extends('front.master-other')

@section('content')
<style>
/* Fix breadcrumb overlap with header */
.page-title {
    padding-top: 160px !important;
    margin-top: 0 !important;
    position: relative;
    z-index: 1;
}

@media (max-width: 991px) {
    .page-title {
        padding-top: 140px !important;
    }
}

@media (max-width: 575px) {
    .page-title {
        padding-top: 120px !important;
    }
}

/* Modern Company Page Enhancements */
.about-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.about-section .content-column .inner-column {
    background: #fff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    margin-bottom: 30px;
}

.about-section .text {
    font-size: 17px;
    line-height: 1.8;
    color: #555;
    margin-bottom: 35px;
}

.blocks-outer {
    margin-top: 30px;
}

.feature-block {
    margin-bottom: 25px;
    transition: transform 0.3s ease;
}

.feature-block:hover {
    transform: translateY(-5px);
}

.feature-block .inner-box {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    padding: 30px;
    border-radius: 12px;
    border: 1px solid #e8e8e8;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    height: 100%;
}

.feature-block:hover .inner-box {
    box-shadow: 0 6px 20px rgba(28, 44, 82, 0.15);
    border-color: #1c2c52;
}

.feature-block .icon {
    font-size: 48px;
    color: #1c2c52;
    margin-bottom: 20px;
    display: inline-block;
    transition: transform 0.3s ease;
}

.feature-block:hover .icon {
    transform: scale(1.1) rotate(5deg);
}

.feature-block h6 {
    font-size: 18px;
    font-weight: 700;
    color: #1c2c52;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.feature-block .feature-text {
    font-size: 15px;
    line-height: 1.7;
    color: #666;
}

.theme-btn {
    margin-right: 15px;
    margin-top: 20px;
    transition: all 0.3s ease;
}

.theme-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(28, 44, 82, 0.3);
}

.images-column {
    position: relative;
}

.images-column .image {
    border-radius: 12px !important;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    transition: transform 0.3s ease;
    margin-bottom: 25px;
}

.images-column .image:last-child {
    margin-bottom: 0;
}

.images-column .image:hover {
    transform: scale(1.02);
}

.images-column .image img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 12px !important;
}

/* Stats Box Styles */
.about-section .stats-box {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    margin-top: 30px;
    padding: 30px;
    background: linear-gradient(135deg, #1c2c52 0%, #2a3f6f 100%);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(28, 44, 82, 0.3);
    position: relative;
    z-index: 1;
}

.about-section .stat-item {
    text-align: center;
    padding: 15px;
    border-right: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
}

.about-section .stat-item:hover {
    transform: translateY(-5px);
}

.about-section .stat-item:last-child {
    border-right: none;
}

.about-section .stat-number {
    font-size: 32px;
    font-weight: 800;
    color: #4a90e2;
    font-family: 'Montserrat', sans-serif;
    margin-bottom: 8px;
    line-height: 1.2;
    display: block;
}

.about-section .stat-label {
    font-size: 13px;
    color: rgba(255, 255, 255, 0.85);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: block;
}

/* Image Wrapper Styles */
.images-column .image-wrapper {
    margin-bottom: 25px;
}

.images-column .image-wrapper:last-child {
    margin-bottom: 0;
}

.images-column .image-wrapper-second {
    margin-top: 0;
}

/* Technology Section Enhancement */
.technology-section {
    padding: 80px 0;
    position: relative;
}

.technology-section .sec-title.light {
    margin-bottom: 40px;
}

.technology-section p {
    font-size: 16px !important;
    line-height: 1.9 !important;
    padding: 30px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.technology-section p a {
    text-decoration: underline;
    transition: all 0.3s ease;
}

.technology-section p a:hover {
    color: #4a90e2 !important;
    text-decoration: none;
}

/* Team Section Enhancement - Elegant & Eye-Catching */
.team-section-two {
    padding: 100px 0;
    position: relative;
    overflow: hidden;
}

.team-section-two::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.team-section-two .auto-container {
    position: relative;
    z-index: 2;
}

.team-section-two .sec-title {
    margin-bottom: 60px;
}

.team-section-two .sec-title .title {
    font-size: 18px;
    letter-spacing: 3px;
    color: #fff;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

.team-section-two .sec-title h2 {
    color: #fff;
    font-size: 42px;
    font-weight: 800;
    margin-top: 15px;
    text-shadow: 0 2px 15px rgba(0,0,0,0.3);
    line-height: 1.2;
}

.team-section-two .sec-title .text {
    color: rgba(255, 255, 255, 0.95);
    font-size: 17px;
    line-height: 1.8;
    text-shadow: 0 1px 5px rgba(0,0,0,0.2);
}

.team-section-two .row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
}

.team-block-two {
    flex: 0 0 auto;
    max-width: 320px;
    width: 100%;
}

.team-block-two .inner-box {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.team-block-two .inner-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #1c2c52, #4a90e2, #1c2c52);
    z-index: 1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-block-two .inner-box:hover::before {
    opacity: 1;
}

.team-block-two .inner-box:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}

.team-block-two .image {
    position: relative;
    overflow: hidden;
    height: 350px;
    background: linear-gradient(135deg, #1c2c52 0%, #2c3e6b 100%);
}

.team-block-two .image::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(180deg, transparent 0%, rgba(28, 44, 82, 0.3) 100%);
    z-index: 1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-block-two .inner-box:hover .image::after {
    opacity: 1;
}

.team-block-two .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    filter: grayscale(20%);
}

.team-block-two .inner-box:hover .image img {
    transform: scale(1.15) rotate(2deg);
    filter: grayscale(0%);
}

.team-block-two .lower-box {
    padding: 30px;
    background: #fff;
    flex: 1;
    display: flex;
    flex-direction: column;
    position: relative;
}

.team-block-two .lower-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 30px;
    right: 30px;
    height: 1px;
    background: linear-gradient(90deg, transparent, #e8e8e8, transparent);
}

.team-block-two .social-box {
    display: flex;
    justify-content: center;
    gap: 12px;
    margin-bottom: 20px;
    padding-top: 20px;
    list-style: none;
    padding-left: 0;
}

.team-block-two .social-box li {
    margin: 0;
}

.team-block-two .social-box li a {
    width: 42px;
    height: 42px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    color: #1c2c52;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.team-block-two .social-box li a::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: linear-gradient(135deg, #1c2c52 0%, #4a90e2 100%);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: width 0.3s ease, height 0.3s ease;
    z-index: 0;
}

.team-block-two .social-box li a:hover::before {
    width: 100%;
    height: 100%;
}

.team-block-two .social-box li a:hover {
    color: #fff;
    border-color: #1c2c52;
    transform: translateY(-5px) rotate(5deg);
    box-shadow: 0 5px 15px rgba(28, 44, 82, 0.3);
}

.team-block-two .social-box li a i,
.team-block-two .social-box li a span {
    position: relative;
    z-index: 1;
}

.team-block-two .content {
    text-align: center;
}

.team-block-two .content h5 {
    font-size: 22px;
    font-weight: 700;
    color: #1c2c52;
    margin-bottom: 8px;
    transition: color 0.3s ease;
}

.team-block-two .inner-box:hover .content h5 {
    color: #4a90e2;
}

.team-block-two .content h5 a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.team-block-two .content h5 a:hover {
    color: #4a90e2;
}

.team-block-two .designation {
    color: #666;
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    display: inline-block;
    padding-bottom: 8px;
}

.team-block-two .designation::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, #1c2c52, #4a90e2);
    transition: width 0.3s ease;
}

.team-block-two .inner-box:hover .designation::after {
    width: 60%;
}

/* Responsive */
@media (max-width: 991px) {
    .about-section {
        padding: 60px 0;
    }
    
    .about-section .content-column .inner-column {
        padding: 30px 20px;
        margin-bottom: 30px;
    }
    
    .about-section .stats-box {
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        padding: 25px 15px;
        margin-top: 25px;
    }
    
    .about-section .stat-item {
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 5px;
    }
    
    .about-section .stat-item:last-child {
        border-right: none;
    }
    
    .about-section .stat-number {
        font-size: 24px;
        margin-bottom: 5px;
    }
    
    .about-section .stat-label {
        font-size: 11px;
        line-height: 1.3;
    }
    
    .theme-btn {
        display: block;
        width: 100%;
        margin-right: 0;
        margin-bottom: 15px;
        text-align: center;
    }
    
    .technology-section {
        padding: 60px 0;
    }
    
    .team-section-two {
        padding: 60px 0;
    }
}

@media (max-width: 575px) {
    .about-section {
        padding: 40px 0;
    }
    
    .about-section .content-column .inner-column {
        padding: 25px 15px;
    }
    
    .about-section .stats-box {
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
        padding: 20px 10px;
        margin-top: 20px;
    }
    
    .about-section .stat-item {
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 8px 3px;
    }
    
    .about-section .stat-item:last-child {
        border-right: none;
    }
    
    .about-section .stat-number {
        font-size: 20px;
        margin-bottom: 4px;
        line-height: 1.1;
    }
    
    .about-section .stat-label {
        font-size: 10px;
        line-height: 1.2;
        letter-spacing: 0.3px;
    }
    
    .feature-block .inner-box {
        padding: 20px;
    }
    
    .technology-section p {
        font-size: 14px !important;
        padding: 20px;
    }
    
    .team-section-two {
        padding: 60px 0;
    }
    
    .team-section-two .sec-title h2 {
        font-size: 28px;
    }
    
    .team-section-two .sec-title .text {
        font-size: 15px;
    }
    
    .team-block-two {
        max-width: 100%;
    }
    
    .team-block-two .image {
        height: 300px;
    }
    
    .team-block-two .lower-box {
        padding: 25px 20px;
    }
}
</style>

	
    <!--Page Title-->
    <section class="page-title">
		<div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
    	<div class="auto-container">
		<br><br><br>
			<h2>RoyalTech Computers Limited</h2>
			<ul class="page-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a href="{{url('/')}}" itemprop="item">
						<span itemprop="name">Home</span>
					</a>
					<meta itemprop="position" content="1" />
				</li>
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<span itemprop="name">The Company</span>
					<meta itemprop="position" content="2" />
				</li>
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<span itemprop="name">RoyalTech Computers Limited</span>
					<meta itemprop="position" content="3" />
				</li>
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
                        RoyalTech Computers Limited is the trusted technology partner for many of the world’s leading brands, including HP, Toshiba, Lenovo, Acer, and other globally recognized manufacturers. We work closely with individual clients, small and medium enterprises (SMEs), and corporate organizations to deliver reliable and high-performance computing solutions.
                        <br><br>
                        Through custom hardware options, laptop sales and rentals, product sourcing and delivery, quality assurance (QA), and expert IT consultancy services, RoyalTech helps businesses and individuals enhance productivity, streamline operations, and achieve long-term value from their technology investments.
                    
                    </div>
                    <div class="blocks-outer">

                        <!-- Feature Block -->
                        <div class="feature-block">
                            <div class="inner-box">
                                <!-- <div class="icon fa fa-binoculars"></div><br><br> -->
                                <h6>OUR VISION</h6>
                                <div class="feature-text">To Be A Global Center For Technology Machines And Computer Retailing Power House With
                                    World Class Excellence In Providing Technological And Connectivity Services.</div>
                            </div>
                        </div>

                        <div class="feature-block">
                            <div class="inner-box">
                                <!-- <div class="icon flaticon-award-1"></div><br><br> -->
                                <h6>OUR MISSION</h6>
                                <div class="feature-text">Our Mission Is To Put Everything Into Play And Bring The World Into Attention Of Technology.
                                    We Do This By Bringing In Technology And Computers Closer To Communities, Businesses And
                                    Individuals, So That They Transform The World.</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block">
                            <div class="inner-box">
                                <!-- <div class="icon flaticon-technical-support"></div><br><br> -->
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
                <div class="pattern-layer"></div>
                <div class="images-outer parallax-scene-1">
                    <div class="image-wrapper">
                        <div class="image" data-depth="0.10">
                            <img src="{{url('/')}}/uploads/portfolio/GT-2.jpeg" alt="Laptop Leasing Services" />
                        </div>
                        
                    </div>
                    
                </div>
                <br>
               
                <!-- Stats Box -->
                <div class="image-wrapper image-wrapper-second">
                    <div class="image" data-depth="0.10">
                        <img src="{{url('/')}}/uploads/portfolio/GT-1.jpeg" alt="Laptop Leasing Services" />
                    </div>
                </div>

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
                    top notch Tech services and solutions.<br><br> The Company has highly qualified and experienced
                    personnel dedicated to providing quality IT goods and services to the clients.<br><br>
                    The Business was founded by KENNEDY KIGEN who ensures smooth running of the
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
			<div class="sec-title centered">
				<div class="title">OUR DEDICATED TEAM</div>
				<h2>Meet The Experts Behind <br> Our Success</h2>
				<div class="text" style="max-width: 700px; margin: 25px auto 0;">
					Our team of experienced professionals is committed to delivering exceptional technology solutions and unparalleled customer service. We combine expertise with passion to help your business thrive.
				</div>
			</div>
			
			<div class="row clearfix">
				<!-- Team Block -->
				<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<img src="{{url('/')}}/uploads/kenkigen.jpeg" alt="Kennedy Kigen" />
						</div>
						<div class="lower-box">
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="#" class="fa fa-facebook-f" aria-label="Facebook"></a></li>
								<li><a href="#" class="fa fa-instagram" aria-label="Instagram"></a></li>
								<li><a href="#" class="fa fa-linkedin" aria-label="LinkedIn"></a></li>
							</ul>
							<div class="content">
								<h5><a href="#">Kennedy Kigen</a></h5>
								<div class="designation">Chief Consultant & Founder</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Team Section Two -->
@endsection
