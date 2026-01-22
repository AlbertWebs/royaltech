@extends('front.master-macbook-hire')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>MacBooks for Hire</h2>
            <ul class="page-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="{{url('/')}}" itemprop="item">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">MacBooks for Hire</span>
                    <meta itemprop="position" content="2" />
                </li>
            </ul>
        </div>
    </section>


   <br><br>
   	<!-- Experiance Section -->
	<section class="experiance-section" style="background-image: url('{{asset('corporate/images/background/pattern-9.png')}}')">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Have it when you need it, how you need it!</div>
				{{-- <h2>What We Actually Do</h2> --}}
			</div>


			<!-- Experiance Info Tabs -->
			<div class="experiance-info-tabs">
				<!-- Experiance Tabs -->
				<div class="experiance-tabs tabs-box">

					<!--Tabs Container-->
					<div class="tabs-content">

						<!--Tab / Active Tab-->
						<div class="tab" id="prod-html">
							<div class="content">
								{{-- <h4>Royaltech Computers Limited</h4> --}}
								<div class="text" style='max-width:600px; margin:0px auto;'>
                                    Royaltech Computers introduces a new way to access Technology requirements within your budget and
convenicence. Hire/Rent Laptops and accessories with us Today and access the latest Technology without
breaking your savings account.
                                </div>
								<br><br>
                                <div class="btn-box text-center">
									<a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-lightbulb-o"></span> Learn More</span></a>
                                    <a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a>
								</div>
							</div>
						</div>



						<!-- Tab -->
						<div class="tab active-tab" id="prod-css">
							<div class="content">
								{{-- <h4>Royaltech Computers Limited</h4> --}}
								{{-- <div class="text" style='max-width:600px; margin:0px auto;'>Royal Tech is the partner of choice for many of the world’s leading Brands, Such as HP, Toshiba, Lenovo, Acer among others. We help Individuals, SMEs and Corporates elevate their value through custom hardware options, product delivery, QA and consultancy services.</div> --}}
                                <div style='max-width:800px; margin:0px auto; color:#000000'>
                                    {{--  --}}
                                    <ul>
                                        <li>Royaltech Computers Limited is a reputable company that offers a wide range of technology solutions, including the option to rent the latest MacBook Pro M2. With the MacBook Pro M2 being one of the most sought-after laptops on the market, renting it from a trusted company like Royaltech Computers Limited can provide numerous benefits and convenience.<p><strong>Key Features and Benefits:</strong></p>
                                            <ol>
                                                <li>
                                                    <p><strong>Access to Latest Technology:</strong> The MacBook Pro M2 is equipped with cutting-edge features, including the latest M2 chip that delivers exceptional performance and energy efficiency. Renting from Royaltech Computers Limited allows you to have access to this advanced technology without the need for a long-term commitment.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Cost-Effective Solution:</strong> Renting a MacBook Pro M2 can be a cost-effective option, especially for short-term projects or temporary needs. It eliminates the upfront cost of purchasing the laptop, making it a budget-friendly choice for individuals and businesses.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Flexibility:</strong> Renting provides you with the flexibility to choose the rental duration that suits your needs. Whether you require the MacBook Pro M2 for a few days, weeks, or months, Royaltech Computers Limited can tailor their rental plans to accommodate your specific timeframe.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Maintenance and Support:</strong> Reputable rental companies like Royaltech Computers Limited typically offer maintenance and technical support for the duration of the rental period. This ensures that you have a smooth experience and that any technical issues are promptly addressed.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Try Before You Buy:</strong> If you&apos;re considering purchasing a MacBook Pro M2 but want to test it out first, renting from Royaltech Computers Limited allows you to try the laptop before making a final decision. This hands-on experience can help you determine if the laptop meets your requirements.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Business Solutions:</strong> For businesses, renting MacBook Pro M2 laptops can be a practical solution for training sessions, workshops, conferences, or temporary staff. It ensures that employees have access to reliable and consistent technology during important events.</p>
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <p><strong>Renting Process:</strong></p>
                                            <ol>
                                                <li>
                                                    <p><strong>Inquiry:</strong> Contact Royaltech Computers Limited through their website, phone, or in-person to inquire about the availability of MacBook Pro M2 rentals.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Customization:</strong> Discuss your rental requirements with their team. This includes the number of laptops needed, rental duration, and any additional services you may require.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Agreement:</strong> Once the details are confirmed, you&apos;ll receive a rental agreement outlining the terms and conditions of the rental. Make sure to review this document carefully.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Pickup/Delivery:</strong> You can choose to pick up the laptops from their location or opt for delivery to your preferred address.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Usage and Support:</strong> Use the MacBook Pro M2 laptops during the rental period. If you encounter any issues, reach out to Royaltech Computers Limited&apos;s support team for assistance.</p>
                                                </li>
                                                <li>
                                                    <p><strong>Return:</strong> At the end of the rental period, return the laptops as per the agreed-upon terms.</p>
                                                </li>
                                            </ol>
                                        </li>
                                        <li>
                                            <p>Renting a MacBook Pro M2 from Royaltech Computers Limited can be an excellent solution for individuals, students, professionals, and businesses looking for temporary access to high-quality technology. It combines the benefits of the latest MacBook Air model with the convenience of a flexible and cost-effective rental arrangement.</p>
                                            <p><br></p>
                                        </li>
                                    </ul>
                                    {{--  --}}
                                </div>
								<br><br>
                                <div class="btn-box text-center">
                                    <a href="{{url('/')}}/laptops-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-computer"></span> Rent PC instead?</span></a>

                                    <a href="{{url('/')}}/e-commerce" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-shopping-cart"></span> Shop Online</span></a>
								</div>
							</div>
						</div>



					</div>
				</div>



			</div>
		</div>
	</section>
	<!-- End Experiance Section -->

    <hr>







    <!-- Gallery Section -->


    <br>

    <section class="gallery-section cases-section" id="portfolio">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Center of Excellence</div>
                <p style="color:#000000; max-width:300px; margin:0 auto; font-weight:800">
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
                                <img src="{{url('/')}}/uploads/portfolio/GT-1.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/GT-1.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Guaranty Trust Bank</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/GT-2.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/GT-2.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Guaranty Trust Bank</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/GT-3.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/GT-3.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Guaranty Trust Bank</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/g3.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/g3.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Muthaiga Golf Club</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/g1.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/g1.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Muthaiga Golf Club</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/g2.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/g2.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">Muthaiga Golf Club</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/index1.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/index1.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">IEBC Tallying Center 2022 General Elections</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/index2.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/index2.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">IEBC Tallying Center 2022 General Elections</div>
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
                                <img src="{{url('/')}}/uploads/portfolio/index.jpeg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/index.jpeg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                        <div class="category">IEBC Tallying Center 2022 General Elections</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Case Block -->
                    <div class="case-block mix all ideas technology development col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p1.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p1.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all development ideas col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p2.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p2.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all ideas design col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p3.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p3.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all ideas development col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p4.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p4.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all technology design ideas col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p5.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p5.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all design development col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p6.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p6.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Case Block -->
                    <div class="case-block mix all design technology development col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{url('/')}}/uploads/portfolio/p7.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p7.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
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
                                <img src="{{url('/')}}/uploads/portfolio/p8.jpg" alt="" />
                                <div class="overlay-box">
                                    <a href="{{url('/')}}/uploads/portfolio/p8.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                    <div class="content">
                                        <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                        <div class="category">Custom High Performance Laptops</div>
                                    </div>
                                    <a href="#" class="arrow flaticon-long-arrow-pointing-to-the-right"></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                </div>

            </div>
        </div>
    </section>


<br>
    	<!-- Contact Map Section -->
	<section class="contact-map-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h2>Request a MacBook Here</h2>
				<div class="text">Fill up this form with your required details. We will get back to you as soon as we can.</div>
			</div>

			<!-- Form Message (Success/Error) -->
			<div id="form-message" class="form-message" style="display: none;"></div>

			<!-- Contact Form -->
			<div class="contact-form">
				<form method="post" action="{{url('/')}}/laptops-for-hire" id="laptop-for-hire">
                    @csrf
					<div class="row clearfix">

						<div class="form-group col-lg-12 col-md-6 col-sm-12">
							<label>Your Full Name</label>
							<input type="text" name="name" placeholder="Enter your full name" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Email Address</label>
							<input type="email" name="email" placeholder="your.email@example.com" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Phone Number</label>
							<input type="tel" name="phone" placeholder="0724 404935" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Pick-Up/Delivery Date</label>
							<input type="date" name="date" required>
						</div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Number of MacBooks</label>
							<input type="number" name="number" placeholder="e.g. 1, 2, 5" min="1" required>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-sm-12">
							<label>Desired Specs/Model</label>
							<textarea name="message" placeholder="e.g. MacBook Pro M2, 8GB RAM, 256GB SSD" rows="5" required></textarea>
						</div>

                        <?php
						$ops = array('-', '+');
						$answer = -1;
						$num1 = rand(0, 50);
						$num2 = rand(0, 15);
						$answer = $num1 + $num2;
						?>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                            <input type="hidden" name="correct_answer" id="correct_answer" value="{{$answer}}">
                            <input type="hidden" name="verify_contact" value="{{$answer}}">
                            <label>Security Verification</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0;">
                                        <label style="text-transform: none; padding-left: 0; font-size: 16px;">Are you human? {{$num1}} + {{$num2}} = ?</label>
                                        <input type="text" name="verify_contact_input" placeholder="Enter the answer" required style="font-size: 18px; font-weight: 700; text-align: center; letter-spacing: 2px;">
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="form-group text-center col-lg-12 col-md-12 col-sm-12">
							<button class="theme-btn btn-style-three" type="submit" name="submit-form">
								<span class="txt">
									<span>Submit Request</span>
									<img class="loading" width="20" src="{{url('/')}}/uploads/icon/loading.gif" alt="Loading..." style="display: none; margin-left: 10px;"/>
								</span>
							</button>
						</div>

					</div>
				</form>
			</div>
			<!-- End Contact Form -->

		</div>
	</section>
	<!-- End Contact Map Section -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".loading").hide();
            
            $('#laptop-for-hire').submit(function(e){
                e.preventDefault();
                
                var $submitBtn = $(this).find('button[type="submit"]');
                var $loading = $submitBtn.find('.loading');
                var $txt = $submitBtn.find('.txt span:first');
                
                $loading.show();
                $submitBtn.prop('disabled', true);
                $txt.text('Submitting...');
                
                $('#form-message').hide();
                
                $.ajax({
                    url: "{{url('laptops-for-hire')}}",
                    type: "POST",
                    data: $('#laptop-for-hire').serialize(),
                    success: function(response) {
                        $('#form-message')
                            .removeClass('error')
                            .addClass('success')
                            .html('<strong>Success!</strong> Your request has been submitted successfully. We will get back to you soon.')
                            .fadeIn();
                        
                        document.getElementById("laptop-for-hire").reset();
                        
                        $('html, body').animate({
                            scrollTop: $('#form-message').offset().top - 100
                        }, 500);
                    },
                    error: function(xhr) {
                        var errorMsg = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        
                        $('#form-message')
                            .removeClass('success')
                            .addClass('error')
                            .html('<strong>Error!</strong> ' + errorMsg)
                            .fadeIn();
                        
                        $('html, body').animate({
                            scrollTop: $('#form-message').offset().top - 100
                        }, 500);
                    },
                    complete: function() {
                        $loading.hide();
                        $submitBtn.prop('disabled', false);
                        $txt.text('Submit Request');
                    }
                });
            });
        });
    </script>
@endsection
