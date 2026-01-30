@extends('front.master-hire')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>Hire a Laptop</h2>
            <ul class="page-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="{{url('/')}}" itemprop="item">
                        <span itemprop="name">Home</span>
                    </a>
                    <meta itemprop="position" content="1" />
                </li>
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <span itemprop="name">Hire a Laptop</span>
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
                                    <p>If you're looking for a reliable and cost-effective solution for short-term computer needs, laptop hire is an excellent choice. Whether you're a small business, a conference organizer, or an individual, renting laptops can provide you with the technology you need, when you need it.</p>

                                    <p>Laptop hire offers a range of benefits over purchasing laptops outright. For starters, it can save you money in the long run, as you won't have to pay for the cost of buying new laptops every time your needs change. Additionally, you can rent the latest models and technology, without having to worry about maintenance, repairs or upgrades.</p>

                                    <p>At the same time, laptop hire is a flexible option, allowing you to rent the equipment for the specific duration you need, from just a few days to several months. You can choose the number of laptops required, the software and specifications that best suit your needs, and even have them delivered and collected from your location.</p>

                                    <p>With laptop hire, you can enjoy a hassle-free, fast and efficient service, with dedicated technical support available to ensure your rental runs smoothly. It is an ideal solution for businesses, students, freelancers, and anyone who needs a temporary solution to their computing needs.</p>

                                    <p>Overall, if you're looking for an affordable, flexible and convenient way to access the latest technology, laptop hire is the perfect option for you.</p>
                                </div>
								<br><br>
                                <div class="btn-box text-center">
                                    {{-- <a download href="{{url('/')}}/uploads/Laptops-Hire-Brochure.pdf" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-download"></span> Download Profile</span></a> --}}
                                    <a href="{{url('/')}}/macbook-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-desktop"></span> Rent Macbook Instead</span></a>
                                    <a href="{{url('/')}}/projectors-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-video-camera"></span> Rent Projectors</span></a>

                                    <a href="{{url('/')}}/tablets-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-tablet"></span> Rent Tablet</span></a>
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



@include('front.clients')



    <!-- Gallery Section -->


    <p id="hire"><br><br></p>
    	<!-- Contact Map Section -->
	<section class="contact-map-section" id="hire">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h2>Request a Laptop Here</h2>
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
							<label>Number of Laptops</label>
							<input type="number" name="number" placeholder="e.g. 1, 2, 5" min="1" required>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-sm-12">
							<label>Desired Specs/Model</label>
							<textarea name="message" placeholder="e.g. HP Folio 1080s, 8GB RAM, 512GB SSD, 2GB Graphics Card" rows="5" required></textarea>
						</div>

						<!-- Honeypot fields - hidden from users but visible to bots -->
						<div style="position: absolute; left: -9999px; opacity: 0; visibility: hidden; height: 0; overflow: hidden;">
							<label for="website">Website (leave blank)</label>
							<input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
							
							<label for="company_name">Company Name (leave blank)</label>
							<input type="text" name="company_name" id="company_name" tabindex="-1" autocomplete="off">
							
							<label for="phone_alt">Alternative Phone (leave blank)</label>
							<input type="tel" name="phone_alt" id="phone_alt" tabindex="-1" autocomplete="off">
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
            // Hide loading icon initially
            $(".loading").hide();
            
            // Form submission
            $('#laptop-for-hire').submit(function(e){
                e.preventDefault();
                
                // Show loading state
                var $submitBtn = $(this).find('button[type="submit"]');
                var $loading = $submitBtn.find('.loading');
                var $txt = $submitBtn.find('.txt span:first');
                
                $loading.show();
                $submitBtn.prop('disabled', true);
                $txt.text('Submitting...');
                
                // Hide previous messages
                $('#form-message').hide();
                
                $.ajax({
                    url: "{{url('laptops-for-hire')}}",
                    type: "POST",
                    data: $('#laptop-for-hire').serialize(),
                    success: function(response) {
                        // Show success message
                        $('#form-message')
                            .removeClass('error')
                            .addClass('success')
                            .html('<strong>Success!</strong> Your request has been submitted successfully. We will get back to you soon.')
                            .fadeIn();
                        
                        // Reset form
                        document.getElementById("laptop-for-hire").reset();
                        
                        // Scroll to message
                        $('html, body').animate({
                            scrollTop: $('#form-message').offset().top - 100
                        }, 500);
                    },
                    error: function(xhr) {
                        // Show error message
                        var errorMsg = 'An error occurred. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        
                        $('#form-message')
                            .removeClass('success')
                            .addClass('error')
                            .html('<strong>Error!</strong> ' + errorMsg)
                            .fadeIn();
                        
                        // Scroll to message
                        $('html, body').animate({
                            scrollTop: $('#form-message').offset().top - 100
                        }, 500);
                    },
                    complete: function() {
                        // Reset button state
                        $loading.hide();
                        $submitBtn.prop('disabled', false);
                        $txt.text('Submit Request');
                    }
                });
            });
        });
    </script>

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

                 <!-- Case Block -->
                 <div class="case-block mix all design technology ideas col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <img src="{{url('/')}}/uploads/portfolio/mwalimu-1.jpg" alt="" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/mwalimu-1.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                    <div class="category">Custom High Performance Laptops</div>
                                    <div class="category">Mwalimu Sacco</div>
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
                            <img src="{{url('/')}}/uploads/portfolio/mwalimu-2.jpg" alt="" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/mwalimu-2.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                    <div class="category">Custom High Performance Laptops</div>
                                    <div class="category">Mwalimu Sacco</div>
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
                            <img src="{{url('/')}}/uploads/portfolio/mwalimu-3.jpg" alt="" />
                            <div class="overlay-box">
                                <a href="{{url('/')}}/uploads/portfolio/mwalimu-3.jpg" data-fancybox="gallery" data-caption="" class="search-icon"><span class="icon flaticon-search"></span></a>
                                <div class="content">
                                    <h4><a href="#">RoyalTech Computers LTD</a></h4>
                                    <div class="category">Custom High Performance Laptops</div>
                                    <div class="category">Mwalimu Sacco</div>
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

@endsection
