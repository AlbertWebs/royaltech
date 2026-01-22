<header id="header" class=" variantleft type_1" style="background-image: url('{{asset('corporate/images/background/pattern-8.png')}}');  background-repeat: repeat;">
    <!-- Header Top -->
    <div class="header-top">
       <div class="container">
          <div class="row">
             <div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">


                <div class="form-group currencies-block">
                    <span>&nbsp; <a href="tel:254724404935"><span class="fa fa-phone"> +254724404935</a></span>

                    <span> | <a href="mailto:info@royaltech.co.ke"><span class="fa fa-envelope"> info@royaltech.co.ke</a></span>

                    <span class="hide-desktop"> | <a href="https://g.page/royaltech-computers-ltd?share"><span class="fa fa-map-marker"> Find Us Now</a></span>

                    <span class="hide-mobile"> | <a target="new" href="https://g.page/royaltech-computers-ltd?share"><span class="fa fa-map-marker"> Biashara Street, Revlon Profesional Plaza</a></span>

                </div>
             </div>
             <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
                <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                <div class="tabBlock" id="TabBlock-1">
                   <ul class="top-link list-inline">
                      <li class="account" id="my_account">
                        @if(Auth::User())
                        <a href="{{url('/')}}/dashboard" title="My Account" class="btn btn-xs dropdown-toggle"> <span>{{Auth::User()->name}}</span> </a>
                        @else
                        <a href="#" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span >My Account</span> <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu ">
                           <li><a href="{{route('register')}}"><i class="fa fa-user"></i> Register</a></li>
                           <li><a href="{{route('login')}}"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                        </ul>
                        @endif
                      </li>
                      @if(Auth::User())
                       <li title="Logout" onclick="location='{{url('/')}}/logout'"><span href="{{url('/')}}/logout"><span class="fa fa-power-off"></span></span></li>
                      @endif
                      <li class="checkout"><a href="{{url('/')}}/e-commerce/shopping-cart/checkout" class="top-link-checkout" title="Checkout"><span >Checkout</span></a></li>
                      <li class="login"><a href="{{url('/')}}/e-commerce/shopping-cart" title="Shopping Cart"><span >Shopping Cart</span></a></li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- //Header Top -->
    <!-- Header center -->
    <div class="header-center left">
       <div class="container">
          <div class="row">
             <!-- Logo -->
             <div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
                <a href="{{url('/')}}"><img src="{{url('/')}}/uploads/Royaltech-Original-1.png" title="RoyalTech Computers Limited" alt="RoyalTech Computers Limited" /></a>
             </div>
             <!-- //end Logo -->
             <!-- Search -->
             <div id="sosearchpro" class="col-sm-7 search-pro">
                <form method="GET" action="{{url('/e-commerce/search-results')}}">

                   <div id="search0" class="search input-group">
                      <div class="select_category filter_type icon-select">
                        <?php $Categories = DB::table('categories')->get(); ?>
                         <select class="no-border" name="category_id">
                            <option value="0">All Categories</option>
                            @foreach ($Categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endforeach
                         </select>
                      </div>
                      <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="keyword">
                      <span class="input-group-btn">
                      <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                      </span>
                   </div>
                   <input type="hidden" name="route" value="product/search" />
                </form>
             </div>
             <!-- //end Search -->
             <!-- Secondary menu -->
             <div class="col-md-2 col-sm-5 col-xs-12 shopping_cart pull-right">
                <?php
                    $cartItems = \Cart::getContent();
                ?>
                <!--cart-->
                <div id="cart" class="btn-group btn-shopping-cart">
                    @if($cartItems->isEmpty())
                        <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                            <div class="shopcart">
                                <span class="handle pull-left"></span>
                                <span class="title">My cart</span>
                                <p class="text-shopping-cart cart-total-full">0 item(s) - 0.00 </p>
                            </div>
                        </a>
                    @else
                        <a data-loading-text="Loading..." class="top_cart dropdown-toggle" data-toggle="dropdown">
                            <div class="shopcart" id="shopcart">
                                <span class="handle pull-left"></span>
                                <span class="title">My cart</span>
                                <p class="text-shopping-cart cart-total-full">{{$cartItems->count()}} item(s) - {{Cart::getTotal();}} </p>
                            </div>
                        </a>
                    @endif
                   <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
                      <li>
                         <table class="table table-striped">
                            <tbody>
                            @if($cartItems->isEmpty())

                            @else
                                @foreach ($cartItems as $cartitems)
                                <?php
                                   $Product = DB::table('products')->where('id',$cartitems->id)->get();
                                ?>
                                    @foreach ($Product as $products)
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="{{url('/')}}/e-commerce/product/{{$products->slung}}"> <img src="{{url('/')}}/uploads/products/{{ $cartitems->attributes->image }}" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name" href="{{url('/')}}/e-commerce/product/{{$products->slung}}">{{$products->name}}</a> </td>
                                            <td class="text-center"> x{{$cartitems->quantity}} </td>
                                            <td class="text-center">  {{$products->price}} </td>
                                            <td class="text-right">
                                                <a href="{{url('/')}}/e-commerce/product/{{$products->slung}}" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url('e-commerce/shopping-cart') }}/remove/{{$cartitems->id}}" onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                               @endforeach
                            @endif
                            </tbody>
                         </table>
                      </li>
                      <li>
                         <div>

                            @if($cartItems->isEmpty())

                            @else
                            <table class="table table-bordered">
                               <tbody>
                                  <tr>
                                     <td class="text-left"><strong>Sub-Total</strong>
                                     </td>
                                     <td class="text-right">kes {{Cart::getTotal();}}</td>
                                  </tr>

                                  <tr>
                                     <td class="text-left"><strong>Total</strong>
                                     </td>
                                     <td class="text-right">kes {{Cart::getTotal();}}</td>
                                  </tr>
                               </tbody>
                            </table>
                            @endif
                            <p class="text-right">
                                <a class="btn view-cart" href="{{url('/')}}/e-commerce/shopping-cart"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-mega checkout-cart" href="{{url('/')}}/e-commerce/shopping-cart/checkout"><i class="fa fa-share"></i>Checkout</a>
                            </p>
                         </div>
                      </li>
                   </ul>
                </div>
                <!--//cart-->
             </div>
          </div>
       </div>
    </div>
    <!-- //Header center -->
    <!-- Header Bottom -->
    <div class="header-bottom">
       <div class="container">
          <div class="row">
             <div class="sidebar-menu col-md-3 col-sm-6 col-xs-12 ">
                <div class="responsive so-megamenu ">
                   <div class="so-vertical-menu no-gutter compact-hidden">
                      <nav class="navbar-default">
                         <div class="container-megamenu vertical  ">
                            <div id="menuHeading">
                               <div class="megamenuToogle-wrapper">
                                  <div class="megamenuToogle-pattern">
                                     <div class="container">
                                        <div>
                                           <span></span>
                                           <span></span>
                                           <span></span>
                                        </div>
                                        All Categories
                                        <i class="fa pull-right arrow-circle fa-chevron-circle-up"></i>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="navbar-header">
                               <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle fa fa-list-alt">
                               </button>
                               All Categories
                            </div>
                            <div class="vertical-wrapper" >
                               <span id="remove-verticalmenu" class="fa fa-times"></span>
                               <div class="megamenu-pattern">
                                  <div class="container">
                                     <ul class="megamenu">


                                        @foreach ($Categories as $item)
                                        <li class="item-vertical">
                                           <p class="close-menu"></p>
                                           <a href="{{url('/')}}/e-commerce/product/tags/{{$item->slung}}" class="clearfix">
                                           <img width="30" src="{{url('/')}}/uploads/categories/{{$item->image}}" alt="{{$item->title}}">
                                           <span>{{$item->title}}</span>
                                           </a>
                                        </li>
                                        @endforeach


                                        <li class="loadmore">
                                           <i class="fa fa-plus-square-o"></i>
                                           <span class="more-view">More Categories</span>
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </nav>
                   </div>
                </div>
             </div>
             <!-- Main menu -->
             <div class="megamenu-hori header-bottom-right  col-md-9 col-sm-6 col-xs-12">
                <div class="responsive so-megamenu" >
                   <nav class="navbar-default" >
                      <div class=" container-megamenu  horizontal">
                         <div class="navbar-header">
                            <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            Navigation
                         </div>
                         <div class="megamenu-wrapper" style="background-image: url('{{asset('corporate/images/background/pattern-8.png')}}');  background-repeat: repeat;">
                            <span id="remove-megamenu" class="fa fa-times"></span>
                            <div class="megamenu-pattern">
                               <div class="container">
                                  <ul class="megamenu " data-transition="slide" data-animationtime="250">
                                     <li class="home hover">
                                        <a href="{{url('/')}}"><span class="fa fa-home"></span> Home</a>
                                     </li>
                                     <li>
                                        <a href="{{url('/')}}/the-company"> The Company</a>
                                     </li>

                                     <li class="with-sub-menu hover">
                                        <a href="{{url('/')}}"> Center of Excellence</a>
                                        <div class="sub-menu">
                                            <div class="content" >
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="column">
                                                            <a href="#" class="title-submenu">Center of Excellence</a>
                                                            <div>
                                                                <ul class="row-list">
                                                                    <?php $Services = DB::table('services')->get(); ?>
                                                                    @foreach ($Services as $Ser)
                                                                    <li><a target="new" href="{{url('/')}}/center-of-excellence/{{$Ser->slung}}">{{$Ser->title}}</a></li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </li>
                                     <li>
                                        <a href="{{url('/')}}/e-commerce"><span class="fa fa-shopping-cart"></span> Shop Online</a>
                                     </li>
                                     <li>
                                        <a href="{{url('/')}}/laptops-for-hire"><span class="fa fa-laptop"></span> Hire a Laptop</a>
                                     </li>
                                     <li>
                                        <a href="{{url('/')}}/contact-us"><span class="fa fa-phone"></span> Contact Us</a>
                                     </li>


                                  </ul>
                               </div>
                            </div>
                         </div>
                      </div>
                   </nav>
                </div>
             </div>
             <!-- //end Main menu -->
          </div>
       </div>
    </div>
    <!-- Navbar switcher -->
    <!-- //end Navbar switcher -->
 </header>
