@extends('front.master-hire')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>Hire a Laptop?</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Hire a Laptop?</li>
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
		<div class="auto-container" style="border:6px solid #1c2c52; border-radius:10px;">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">&nbsp;</div>
						<h2>Request a Laptop Here</h2>
					</div>
					<div class="pull-right">
						<div class="text">Fill up this form with your required details <br> We will get back to you as soon as we can</div>
					</div>
				</div>
			</div>


			<!-- Contact Form -->
			<div class="contact-form">

				<!-- Contact Form -->
				<form method="post" action="{{url('/')}}/laptops-for-hire" id="laptop-for-hire" >
                    @csrf
					<div class="row clearfix">

						<div class="form-group col-lg-12 col-md-6 col-sm-12">
							<label>Your name *</label>
							<input type="text" name="name" placeholder="" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Email address *</label>
							<input type="email" name="email" placeholder="" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Phone number *</label>
							<input type="text" name="phone" placeholder="" required>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Pick-Up/Delivery Date</label>
							<input type="date" name="date" placeholder="" required>
						</div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
							<label>Number of Laptops *</label>
							<input type="number" name="number" placeholder="" required>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-sm-12">
							<label>Desired Specs/Model *</label>
							<textarea name="message" placeholder="HP Folio 1080s 8Gb Ram, 512 GB SSD, 2GB Graphics" required></textarea>
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
                            <input required class="form-control" value="{{$answer}}" type="hidden" id="verify_contact" name="verify_contact">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Are you human? {{$num1}} + {{$num2}} =</label>
                                        <input required class="form-control" value="" type="text" id="verify_contact" name="verify_contact_input">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>

						<div class="form-group text-center col-lg-12 col-md-12 col-sm-12">
							<button class="theme-btn btn-style-three" type="submit" name="submit-form"><span class="txt">Submit Request <img class="loading" width="30" src="{{url('/')}}/uploads/icon/loading.gif" alt="royaltech loading"/></span></button>
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
            $(".loading", this).css("visibility","hidden");
        });
        $('#laptop-for-hire').submit(function(e){

            // Stop the form submitting
            e.preventDefault();
            $(".loading", this).css("visibility","visible");
            $.ajax({
                url: "{{url('laptops-for-hire')}}",
                type: "POST",
                data: $('#laptop-for-hire').serialize(),
                success: function( response ) {
                    $(".loading", this).css("visibility","hidden");
                    alert('Your Request has been submitted successfully');

                    document.getElementById("laptop-for-hire").reset();
                }
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
