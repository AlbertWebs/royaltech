<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <!-- Basic page needs
         ============================================ -->

      <meta charset="utf-8">
      @foreach ($Products as $key => $value)
            <meta name="subject" content="{{$value->name}}">
            <meta name="rating" content="General">
            <meta name="referrer" content="no-referrer">
            <meta name="theme-color" content="#1c2c52">

            {!! SEOMeta::generate() !!}
            {!! OpenGraph::generate() !!}
            <meta property="og:site_name" content="{{$value->name}} - Royaltech Computers Limited">
            <meta property="og:locale" content="en_US">
            <meta property="og:image" content="{{url('/')}}/uploads/products/{{$value->image_one}}" />
            <meta property="fb:app_id" content="350937289315471" />
            <meta property=”og:id” content="{{$value->id}}" />
            {!! Twitter::generate() !!}
            <meta name="twitter:card" content="summary">
            <meta name="twitter:site" content="@RoyaltechC">
            <meta name="twitter:url" content="{{url('/')}}">
            <meta name="twitter:description" content="Rent Laptops, Lease Laptops, Laptops for Hire,  Laptops in Kenya, Laptop Rentals in Kenya, Laptops Leasing in Kenya">
            <meta name="twitter:image" content="{{url('/')}}/uploads/products/{{$value->image_one}}">
            {!! JsonLd::generate() !!}
      @endforeach
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
      <link href="{{asset('commerce/js/lightslider/lightslider.css')}}" rel="stylesheet">
      <!-- Theme CSS
         ============================================ -->
      <link href="{{asset('commerce/css/themecss/so_megamenu.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/themecss/so-categories.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/themecss/so-listing-tabs.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/footer1.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/header1.css')}}" rel="stylesheet">
      <link id="color_scheme" href="{{asset('commerce/css/theme.css')}}" rel="stylesheet">
      <link href="{{asset('commerce/css/responsive.css')}}" rel="stylesheet">


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
      <script type="text/javascript" src="{{asset('commerce/js/lightslider/lightslider.js')}}"></script>


      <!-- Theme files
         ============================================ -->
      <script type="text/javascript" src="{{asset('commerce/js/themejs/so_megamenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/themejs/addtocart.js')}}"></script>
      <script type="text/javascript" src="{{asset('commerce/js/themejs/application.js')}}"></script>

      {{--  --}}
      <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10800260283"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10800260283');
</script>
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


   </body>
</html>
