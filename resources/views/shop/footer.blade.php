<footer class="main-footer footer-container type_footer1 style-two" style="background-image: url('{{asset('corporate/images/background/pattern-7.png')}}');  background-repeat: repeat;">
    {{-- <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-7.png')}}')"></div>
    <div class="pattern-layer-two" style="background-image: url('{{asset('corporate/images/background/pattern-8.png')}}')"></div> --}}
    <!-- Footer Top Container -->
    <section class="footer-top">
       <div class="container content">
          <div class="row">
            <div class="col-sm-6 col-md-3 box-information">
                <div class="module clearfix">
                    <h3 class="modtitle">About</h3>
                    <div class="modcontent">
                        <p style="color:#ffffff">We are Kenya's best Information Technology Company. Providing the highest quality in hardware & Network solutions. About more than 10 years of experience and 1000+ of innovative achievements.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 box-service">
                <div class="module clearfix">
                    <h3 class="modtitle">Customer Service</h3>
                    <div class="modcontent">
                        <ul class="menu">
                            <li><a href="{{url('/')}}/">Home</a></li>
                            <li><a href="{{url('/')}}/contact-us">Contact Us</a></li>
                            <li><a href="{{url('/')}}/the-company">About Us</a></li>
                            <li><a href="{{url('/')}}//e-commerce">Shop Online</a></li>
                            <li><a href="{{url('/')}}/dashboard">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 box-account">
                <div class="module clearfix">
                    <h3 class="modtitle">We Excell In</h3>
                    <div class="modcontent">
                        <ul class="menu">
                            <?php $Services = DB::table('services')->inRandomOrder()->limit('5')->get(); ?>
                            @foreach ($Services as $Ser)
                            <li><a target="new" href="{{url('/')}}/center-of-excellence/{{$Ser->slung}}">{{$Ser->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 collapsed-block ">
                <div class="module clearfix">
                    <h3 class="modtitle">Contact Us	</h3>
                    <div class="modcontent">
                        <ul class="contact-address">
                            <li><span class="fa fa-map-marker"></span> <a style="color:#ffffff;" href="https://g.page/royaltech-computers-ltd?share">Biashara Street, Revlon Profesional Plaza, 2nd Floor, Suite 1</a></li>
                            <li><span class="fa fa-envelope-o"></span> <a style="color:#ffffff;" href="mailto:info@royaltech.co.ke"> Email:  info@royaltech.co.ke</a></li>
                            <li><span class="fa fa-phone">&nbsp;</span> <a style="color:#ffffff;" href="tel:0724404935"> Phone 1: 0724 404935 <br>Phone 2: 0724404935</a></li>
                        </ul>
                    </div>
                </div>
            </div>

             <div class="col-sm-12 collapsed-block footer-links">
                <div class="module clearfix">
                   <div class="modcontent">
                      <hr class="footer-lines">
                      <div class="footer-directory-title">
                         <h4 class="label-link">Top Stores : Brand Directory | Store Directory</h4>
                         <ul class="footer-directory">

                            <li>
                               <h4>MOST SEARCHED KEYWORDS MARKET:</h4>
                               <a href="#">Xiaomi Mi3</a> | <a href="#">HP Envy 360</a> | <a href="{{url('/')}}/laptops-for-hire">Laptops For Hire</a> | <a href="#">View all</a>
                            </li>
                            <?php
                               $Categories = DB::table('categories')->get();
                            ?>
                            @foreach ($Categories as $Cat)
                            <?php
                                $Product = DB::table('products')->where('category',$Cat->id)->limit('5')->get();
                            ?>
                            @if($Product->isEmpty())

                            @else
                            <li>
                                <h4>{{$Cat->title}}:</h4>
                                @foreach($Product as $Pro)
                                <a href="#">{{$Pro->name}}</a> |
                                @endforeach
                                <a href="{{url('/')}}/e-commerce/product/tags/{{$Cat->slung}}">View all {{$Cat->title}}</a>
                             </li>
                            @endif

                            @endforeach

                            {{--  --}}


                            <?php
                                $Product = DB::table('brands')->limit('10')->get();
                            ?>
                            @if($Product->isEmpty())

                            @else
                            <li>
                                <h4>Brands:</h4>
                                @foreach($Product as $Pro)
                                <a href="{{url('/')}}/e-commerce/product/brand/{{$Pro->title}}">{{$Pro->title}}</a> |
                                @endforeach

                            </li>
                            @endif

                            <?php
                                $Product = DB::table('categories')->limit('10')->get();
                            ?>
                            @if($Product->isEmpty())

                            @else
                            <li>
                                <h4>Categories:</h4>
                                @foreach($Product as $Pro)
                                <a href="{{url('/')}}/e-commerce/product/tags/{{$Pro->slung}}">{{$Pro->title}}</a> |
                                @endforeach

                            </li>
                            @endif


                            {{--  --}}
                            <li>
                               <h4>MOBILES:</h4>
                               <a href="#">Moto E</a> | <a href="#">Samsung Mobile</a> | <a href="#">Micromax Mobile</a> | <a href="#">Nokia Mobile</a> | <a href="#">HTC Mobile</a> | <a href="#">Sony Mobile</a> | <a href="#">Apple Mobile</a> | <a href="#">LG Mobile</a> | <a href="#">Karbonn Mobile</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>CAMERA:</h4>
                               <a href="#">Nikon Camera</a> | <a href="#">Canon Camera</a> | <a href="#">Sony Camera</a> | <a href="#">Samsung Camera</a> | <a href="#">Point shoot camera</a> | <a href="#">Camera Lens</a> | <a href="#">Camera Tripod</a> | <a href="#">Camera Bag</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>LAPTOPS:</h4>
                               <a href="#">Apple Laptop</a> | <a href="#">Acer Laptop</a> | <a href="#">Sony Laptop</a> | <a href="#">Dell Laptop</a> | <a href="#">Asus Laptop</a> | <a href="#">Toshiba Laptop</a> | <a href="#">LG Laptop</a> | <a href="#">HP Laptop</a> | <a href="#">Notebook</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>TVS:</h4>
                               <a href="#">Sony TV</a> | <a href="#">Samsung TV</a> | <a href="#">LG TV</a> | <a href="#">Panasonic TV</a> | <a href="#">Onida TV</a> | <a href="#">Toshiba TV</a> | <a href="#">Philips TV</a> | <a href="#">Micromax TV</a> | <a href="#">LED TV</a> | <a href="#">LCD TV</a> | <a href="#">Plasma TV</a> | <a href="#">3D TV</a> | <a href="#">Smart TV</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>TABLETS:</h4>
                               <a href="#">Micromax Tablets</a> | <a href="#">HCL Tablets</a> | <a href="#">Samsung Tablets</a> | <a href="#">Lenovo Tablets</a> | <a href="#">Karbonn Tablets</a> | <a href="#">Asus Tablets</a> | <a href="#">Apple Tablets</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>WATCHES:</h4>
                               <a href="#">FCUK Watches</a> | <a href="#">Titan Watches</a> | <a href="#">Casio Watches</a> | <a href="#">Fastrack Watches</a> | <a href="#">Timex Watches</a> | <a href="#">Fossil Watches</a> | <a href="#">Diesel Watches</a> | <a href="#">Luxury Watches</a> | <a href="#">View all</a>
                            </li>
                            {{-- <li>
                               <h4>CLOTHING:</h4>
                               <a href="#">Shirts</a> | <a href="#">Jeans</a> | <a href="#">T shirts</a> | <a href="#">Kurtis</a> | <a href="#">Sarees</a> | <a href="#">Levis Jeans</a> | <a href="#">Killer Jeans</a> | <a href="#">Pepe Jeans</a> | <a href="#">Arrow Shirts</a> | <a href="#">Ethnic Wear</a> | <a href="#">Formal Shirts</a> | <a href="#">Peter England Shirts</a> | <a href="#">View all</a>
                            </li>
                            <li>
                               <h4>FOOTWEAR:</h4>
                               <a href="#">Shoes</a> | <a href="#">Casual Shoes</a> | <a href="#">Adidas Shoes</a> | <a href="#">Gas Shoes</a> | <a href="#">Puma Shoes</a> | <a href="#">Reebok Shoes</a> | <a href="#">Woodland Shoes</a> | <a href="#">Red tape Shoes</a> | <a href="#">Nike Shoes</a> | <a href="#">View all</a>
                            </li> --}}
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
                 <!-- Footer Bottom -->
                <div class="footer-bottom">
                    <div class="auto-container">
                        <div class="row clearfix">
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="copyright">Copyright &copy; {{date('Y')}} by RoyalTech Computers Limited | All Rights Reserved.</div>
                            </div>
                            <!-- Column -->
                            <div class="column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <ul class="footer-nav">

                                    <li><a href="{{url('/')}}/privacy-policy">Privacy Policy</a></li>
                                    <li><a href="{{url('/')}}/terms-and-conditions">Terms and Conditions</a></li>
                                    <li><a href="{{url('/')}}/copyright">Copyright Statement</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Footer Bottom Container -->
       </div>
    </section>
    <!-- /Footer Top Container -->
    <!-- Footer Bottom Container -->

 </footer>
