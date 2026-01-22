<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Laptops For Hire | Royal Tech Template | IT Solutions in Nairobi</title>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!-- Stylesheets -->
<link href="{{asset('corporate/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('corporate/css/style.css')}}" rel="stylesheet">
<link href="{{asset('corporate/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('corporate/css/corporate-elegant.css')}}" rel="stylesheet">

<link href="{{asset('fonts.googleapis.com/css26778.css?family=Montserrat:wght@300;400;500;600;700;800;900&amp;family=Nunito+Sans:wght@300;600;700;800;900&amp;display=swap')}}" rel="stylesheet">

@include('favicon')
@include('tawkto')
@include('pixels')

@include('whatsApp')

<!-- Color Themes -->
<link id="theme-color-file" href="{{asset('corporate/css/color-themes/default-theme.css')}}" rel="stylesheet">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="{{asset('corporate/js/respond.js')}}"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

 	<!-- Main Header-->
    <header class="main-header header-style-two">

		<!-- Header Top Two -->
        <div class="header-top-two">
            <div class="outer-container">
                <div class="clearfix">

					<!-- Top Left -->
					<div class="top-left clearfix">
						<!-- Info List -->
						<ul class="info-list">
							<li>We are creative, ambitious and ready for challenges!</li>
							<li><a href="https://g.page/royaltech-computers-ltd?share"><span class="icon fa fa-location-arrow"></span> Biashara Street, Revlon Profesional Plaza, 2nd Floor, Suite 1</a></li>
						</ul>
					</div>

					<!-- Top Right -->
                    <div class="top-right pull-right clearfix">
						<!-- Info List -->
						<ul class="info-list">
							<li><a href="mailto:info@webmail.com"><span class="icon flaticon-email"></span> info@royaltech.co.ke</a></li>
							<li><a href="tel:786-875-864-75"><span class="icon flaticon-telephone"></span> 0724 404935</a></li>
						</ul>
						<!-- Social Box -->
						<ul class="social-box">
							<li><a href="https://www.facebook.com/royaltechcomps" class="fa fa-facebook-f"></a></li>
							<li><a href="https://twitter.com/RoyaltechC" class="fa fa-twitter"></a></li>
							<li><a href="https://www.instagram.com/royaltechcomps/" class="fa fa-instagram"></a></li>
							<li><a href="https://api.whatsapp.com/send?phone=254724404935&text=Hello there, i am texing from Royal Tech Website" class="fa fa-whatsapp"></a></li>
						</ul>
                    </div>

                </div>
            </div>
        </div>



		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{url('/')}}/uploads/Royaltech-Original-1.png" alt="Royal Tech Computers Limited" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

	<!-- Sidebar Cart Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						X
					</a>
				</div>
				<div class="sidebar-textwidget">

					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<a href="{{url('/')}}"><img src="{{url('/')}}/uploads/RoyalTechComputersLogow-05.png" alt="Royal Tech Computers Logo" /></a>
							</div>
							<div class="content-box">
								<h2>About Us</h2>
								<p class="text">
                                    We are Kenya's best Information Technology Company. Providing the highest quality in hardware & Network solutions. About more than 10 years of experience and 1000+ of innovative achievements.
                                </p>
								<a href="#" class="theme-btn btn-style-three"><span class="txt">Consultation</span></a>
							</div>
							<div class="contact-info">
								<h2>Contact Info</h2>
								<ul class="list-style-one">
									<li><span class="icon fa fa-location-arrow"></span>Biashara Street, Revlon Profesional Plaza, 2nd Floor, Suite 1,</li>
									<li><span class="icon fa fa-phone"></span>(254) 0724 404935</li>
									<li><span class="icon fa fa-envelope"></span>support@royaltech.co.ke</li>
									<li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
								</ul>
							</div>
							<!-- Social Box -->
							<ul class="social-box">
								<li class="facebook"><a href="#" class="fa fa-facebook-f"></a></li>
								<li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
								<li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
								<li class="instagram"><a href="#" class="fa fa-instagram"></a></li>
                                <li class="whatsapp"><a href="https://api.whatsapp.com/send?phone=254724404935&text=Hello there, i am texing from Royal Tech Website" class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->

    @yield('content')

    @include('front.footer')


</div>
<!--End pagewrapper-->


<!-- Search Popup -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-multiply"></span></button>
	<button class="close-search"><span class="flaticon-up-arrow-1"></span></button>
	<form method="post" action="#">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="{{asset('corporate/js/jquery.js')}}"></script>
<script src="{{asset('corporate/js/popper.min.js')}}"></script>
<script src="{{asset('corporate/js/bootstrap.min.js')}}"></script>
<script src="{{asset('corporate/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('corporate/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('corporate/js/appear.js')}}"></script>
<script src="{{asset('corporate/js/parallax.min.js')}}"></script>
<script src="{{asset('corporate/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('corporate/js/jquery.paroller.min.js')}}"></script>
<script src="{{asset('corporate/js/owl.js')}}"></script>
<script src="{{asset('corporate/js/wow.js')}}"></script>
<script src="{{asset('corporate/js/nav-tool.js')}}"></script>
<script src="{{asset('corporate/js/jquery-ui.js')}}"></script>
<script src="{{asset('corporate/js/script.js')}}"></script>
<script src="{{asset('corporate/js/color-settings.js')}}"></script>

<!-- Mobile Bottom Navigation Menu -->
<nav class="mobile-bottom-nav">
    <a href="{{url('/')}}" class="nav-item" data-page="home">
        <span class="nav-icon fa fa-home"></span>
        <span class="nav-label">Home</span>
    </a>
    <a href="{{url('/')}}/laptops-for-hire" class="nav-item" data-page="hire">
        <span class="nav-icon fa fa-laptop"></span>
        <span class="nav-label">Hire</span>
    </a>
    <a href="{{url('/')}}/e-commerce" class="nav-item" data-page="shop">
        <span class="nav-icon fa fa-shopping-cart"></span>
        <span class="nav-label">Shop</span>
    </a>
    <a href="https://api.whatsapp.com/send?phone=254724404935&text=Hello there, i am texing from Royal Tech Website" class="nav-item" data-page="contact" target="_blank">
        <span class="nav-icon fa fa-whatsapp"></span>
        <span class="nav-label">Contact</span>
    </a>
    <a href="{{url('/')}}/the-company" class="nav-item" data-page="about">
        <span class="nav-icon fa fa-info"></span>
        <span class="nav-label">About</span>
    </a>
</nav>
<!-- End Mobile Bottom Navigation Menu -->

<script>
// Set active state for mobile bottom nav based on current page
(function() {
    var currentPath = window.location.pathname;
    var currentUrl = window.location.href;
    var navItems = document.querySelectorAll('.mobile-bottom-nav .nav-item');
    
    navItems.forEach(function(item) {
        var itemHref = item.getAttribute('href');
        var itemPage = item.getAttribute('data-page');
        
        // Remove active class first
        item.classList.remove('active');
        
        // Skip WhatsApp links (external links)
        if (itemHref && itemHref.startsWith('http') && !itemHref.includes(window.location.hostname)) {
            return;
        }
        
        var itemPath = new URL(itemHref, window.location.origin).pathname;
        
        // Check if current path matches
        if (currentPath === itemPath || currentPath === itemPath + '/') {
            item.classList.add('active');
        } else if (itemPath !== '/' && currentPath.startsWith(itemPath)) {
            item.classList.add('active');
        }
        
        // Special handling for contact page - mark WhatsApp button as active
        if (itemPage === 'contact' && (currentPath.includes('/contact') || currentPath.includes('/contact-us'))) {
            item.classList.add('active');
        }
    });
    
    // Special case for home page
    if (currentPath === '/' || currentPath === '') {
        var homeItem = document.querySelector('.mobile-bottom-nav .nav-item[data-page="home"]');
        if (homeItem) {
            homeItem.classList.add('active');
        }
    }
})();
</script>

</body>

</html>
