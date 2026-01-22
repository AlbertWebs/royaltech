<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <!-- Basic page needs
         ============================================ -->

      <meta charset="utf-8">
      {!! SEOMeta::generate() !!}
      {!! OpenGraph::generate() !!}
      <meta property="og:site_name" content="Royaltech Computers Limited">
      <meta property="og:locale" content="en_US">
      {!! Twitter::generate() !!}
      {!! JsonLd::generate() !!}

      @if(Session::has('tags'))
            <?php
                $Session = Session::get('tags');
                $Category = DB::table('categories')->where('slung',$Session)->get();
            ?>
            @foreach ($Category as $Cat)
                <meta property="og:image" content="{{url('/')}}/uploads/categories/{{$Cat->image}}" />
                <meta property="fb:app_id" content="350937289315471" />
            @endforeach

      @else
      <meta property="og:image" content="{{url('/')}}/uploads/products/1_062eeb89-ffbf-474a-8443-1285ea8a9b41.jpg" />
      @endif

      <!-- Mobile specific metas
         ============================================ -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Favicon
         ============================================ -->
      @include('favicon')
      @include('tawkto')
      <!-- Google web fonts
         ============================================ -->
      <link href='{{asset('commerce/fonts.googleapis.com/css2d0f.css?family=Open+Sans:400,700,300')}}' rel='stylesheet' type='text/css'>
      <!-- Libs CSS
         ============================================ -->
      <link rel="stylesheet" href="{{asset('commerce/css/bootstrap/css/bootstrap.min.css')}}">
      <link href="{{asset('commerce/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/js/datetimepicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/js/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/themecss/lib.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/js/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet">
      <!-- Theme CSS
         ============================================ -->
      <link href="{{asset('commerce/css/themecss/so_megamenu.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/themecss/so-categories.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/footer1.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/header1.css')}}" rel="stylesheet">
      <link id="color_scheme" href="{{asset('commerce/css/theme.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/responsive.css')}}" rel="stylesheet">
      <!-- E-Commerce Optimized CSS -->
      <link href="{{asset('commerce/css/e-commerce-optimized.css')}}" rel="stylesheet">
   </head>
   <body class="res layout-subpage">
      <div id="wrapper" class="wrapper-full ">
         <!-- Header Container  -->
         @include('shop.header')
         <!-- //Header Container  -->
          @yield('content')
         <!-- Footer Container -->
        @include('shop.footer')
         <!-- //end Footer Container -->


	<!-- //end Footer Container -->
         {{--  --}}
      </div>
      <!-- Include Libs & Plugins
         ============================================ -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script type="text/javascript" src="{{asset('commerce/js/jquery-2.2.4.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/owl-carousel/owl.carousel.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/themejs/libs.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/unveil/jquery.unveil.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/countdown/jquery.countdown.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/datetimepicker/moment.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/datetimepicker/bootstrap-datetimepicker.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/jquery-ui/jquery-ui.min.js')}}"></script>
      {{-- <script type="text/javascript" src="{{asset('commerce/js/lightslider/lightslider.js')}}"></script> --}}


      <!-- Theme files
         ============================================ -->
      <script type="text/javascript" src="{{asset('commerce/js/themejs/so_megamenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/themejs/addtocart.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/themejs/application.js')}}"></script>
      <script type="text/javascript"><!--
         // Check if Cookie exists
         	if($.cookie('display')){
         		view = $.cookie('display');
         	}else{
         		view = 'grid';
         	}
         	if(view) display(view);
         //-->
      </script>

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
        
        // Special handling for e-commerce pages - mark shop button as active
        if (itemPage === 'shop' && currentPath.includes('/e-commerce')) {
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
