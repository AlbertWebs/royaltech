@extends('front.master-tablet-hire')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>Tablets for Hire?</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Tablets for Hire</li>
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
                                    Welcome to Royaltech Computers Limited, your trusted partner for all your short-term tech rental needs. In today's fast-paced world, staying connected and equipped with the latest technology is crucial. If you're in need of high-quality tablets for a conference, event, training session, or any other temporary project, you've come to the right place. Our Tablet Hire services are designed to provide you with a seamless and cost-effective solution.
                                    <br><br>
                                    Why Choose Royaltech Computers Limited for Tablet Hire:<br>
                                    1. <strong>Cutting-Edge Technology:</strong> At Royaltech Computers Limited, we understand the importance of having up-to-date technology at your fingertips. That's why we offer a wide range of top-of-the-line tablets from leading brands like Apple, Samsung, and Microsoft. Our tablets are equipped with the latest features, ensuring optimal performance and user satisfaction.<br>
                                    2. <strong>Extensive Tablet Selection:</strong> We offer a diverse selection of tablets to suit your specific requirements. Whether you need iPads for an interactive trade show booth, Android tablets for training sessions, or Windows tablets for business presentations, we have you covered. Our inventory includes a variety of models and sizes to match your preferences.<br>
                                    3. <strong>Flexible Rental Options:</strong> At Royaltech Computers Limited, we understand that every project has its unique demands. That's why we provide flexible rental options, including daily, weekly, and monthly packages. This allows you to rent tablets for the duration that suits your needs, without any unnecessary commitments.<br>
                                    4. <strong>Impeccable Service:</strong> Our commitment to customer satisfaction is unwavering. We ensure that all our tablets are well-maintained, cleaned, and updated, so you receive a product in pristine condition. Our dedicated support team is available to assist you throughout your rental period, making your experience hassle-free.<br>
                                    5. <strong>Cost-Effective Solution:</strong> Choosing our Tablet Hire services is not only convenient but also cost-effective. Renting tablets instead of making a substantial investment in purchasing them saves you money and ensures you have access to the latest technology without the long-term commitment.<br>
                                    Who Can Benefit from Our Tablet Hire Services:<br>
                                    • <strong>Businesses:</strong> Enhance your presentations, seminars, and training sessions with our tablets. They're perfect for showcasing your products and services, providing interactive content, and collecting valuable data.<br>
                                    • <strong>Event Planners:</strong> Make your events memorable and engaging with our tablets. They can be used for check-ins, surveys, interactive maps, and more.<br>
                                    • <strong>Educational Institutions:</strong> Facilitate effective learning with our tablets. Whether you're conducting a short-term workshop or an extended training program, our tablets are a valuable educational tool.<br>
                                    • <strong>Trade Show Exhibitors:</strong> Stand out at trade shows and expos by incorporating tablets into your booth. Engage with visitors, showcase your digital content, and collect leads effortlessly.<br>


                                    {{--  --}}
                                </div>
								<br><br>
                                <div class="btn-box text-center">
                                    <a href="{{url('/')}}/laptops-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-computer"></span> Rent PC instead?</span></a>
                                    <a href="{{url('/')}}/macbook-for-hire" class="theme-btn btn-style-three"><span class="txt"><span class="fa fa-desktop"></span> Rent Macbook Instead</span></a>
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
		<div class="auto-container" style="border:6px solid #1c2c52; border-radius:10px;">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="clearfix">
					<div class="pull-left">
						<div class="title">&nbsp;</div>
						<h2>Request a Tablet Here</h2>
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
							<textarea name="message" placeholder="MacBook Pro M2 8gb Ram" required></textarea>
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
@endsection
