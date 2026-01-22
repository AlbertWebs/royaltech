@extends('shop.master-product')

@section('content')
@foreach ($Products as $Pro)


<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <?php $Category = DB::table('categories')->where('id',$Pro->category)->get(); ?>
        @foreach ($Category as $cat)
        <li><a href="{{url('/')}}/e-commerce/product/tags/{{$cat->slung}}">{{$cat->title}}</a></li>
        @endforeach
        <li><a href="#">{{$Pro->name}}</a></li>
    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-md-12 col-sm-12">

            <div class="product-view row">
                <div class="left-content-product col-lg-10 col-xs-12">
                    <div class="row">
                        <div class="content-product-left  col-sm-7 col-xs-12 ">
                            <div id="thumb-slider-vertical" class="thumb-vertical-outer">
                                <span class="btn-more prev-thumb nt"><i class="fa fa-angle-up"></i></span>
                                <span class="btn-more next-thumb nt"><i class="fa fa-angle-down"></i></span>
                                <ul class="thumb-vertical">
                                    <li class="owl2-item">
                                        <a data-index="0" class="img thumbnail" data-image="{{url('/')}}/uploads/products/{{$Pro->image_one}}" title="{{$Pro->name}}">
                                            <img src="{{url('/')}}/uploads/products/{{$Pro->image_one}}" title="{{$Pro->name}}" alt="{{$Pro->name}}">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="1" class="img thumbnail " data-image="{{url('/')}}/uploads/products/{{$Pro->image_two}}" title="{{$Pro->name}}">
                                            <img src="{{url('/')}}/uploads/products/{{$Pro->image_two}}" title="{{$Pro->name}}" alt="{{$Pro->name}}">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="2" class="img thumbnail" data-image="{{url('/')}}/uploads/products/{{$Pro->image_three}}" title="{{$Pro->name}}">
                                            <img src="{{url('/')}}/uploads/products/{{$Pro->image_three}}" title="{{$Pro->name}}" alt="{{$Pro->name}}">
                                        </a>
                                    </li>
                                    <li class="owl2-item">
                                        <a data-index="3" class="img thumbnail" data-image="{{url('/')}}/uploads/products/{{$Pro->image_four}}" title="{{$Pro->name}}">
                                            <img src="{{url('/')}}/uploads/products/{{$Pro->image_four}}" title="{{$Pro->name}}" alt="{{$Pro->name}}">
                                        </a>
                                    </li>
                                </ul>


                            </div>
                            <div class="large-image  vertical">
                                <img itemprop="image" class="product-image-zoom" src="{{url('/')}}/uploads/products/{{$Pro->image_one}}" data-zoom-image="{{url('/')}}/uploads/products/{{$Pro->image_one}}"  title="{{$Pro->name}}" alt="{{$Pro->name}}">
                            </div>
                            <!--<a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a>-->

                        </div>
                        <div class="content-product-right col-sm-5 col-xs-12">
                            <div class="title-product">
                                <h1>{{$Pro->name}} </h1>
                            </div>
                            <!-- Review ---->
                            <div class="box-review form-group">
                                <div class="ratings">
                                    <div class="rating-box">
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                                    </div>
                                </div>
                                <a class="reviews_button" href="quickview.php.html" onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">0 reviews </a>
                            </div>

                            <div class="product-label form-group">
                                <div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                                   @if($Pro->price_raw == $Pro->price)
                                   <span class="price-new">KES {{$Pro->price_raw}}</span>


                                  @else
                                      <?php
                                          $Origianal = $Pro->price_raw;
                                          $Offer = $Pro->price;
                                          $Diff = $Origianal-$Offer;
                                          $Per = ($Diff*100)/$Origianal;
                                      ?>
                                      <span class="price-new">KES {{$Pro->price}}</span>
                                      <span class="price-old">KES {{$Pro->price_raw}}</span>
                                      <span class="label label-percent">-{{ceil($Per)}}%</span>
                                  @endif
                                </div>

                                @if($Pro->stock == "In Stock")
                                <div class="stock"><span>Availability: </span>  <span class="status-stock">In Stock </span></div>
                                @else
                                <div class="stock"><span>Availability: </span>  <span class="status-stock text-danger">Out of Stock </span></div>
                                @endif
                            </div>

                            {{-- <pre><code style="max-width:300px">{{$Pro->meta}}</code></pre> --}}

                            <div class="product-box-desc">
                                <div class="inner-box-desc">
                                    <div class="price-tax"><span>Price: </span> KES {{$Pro->price}} </div>
                                    <div class="reward"><span>Product Condition: </span> {{$Pro->pro_condition}} </div>
                                    <div class="brand"><span>Brand: </span><a href="{{url('/')}}/e-commerce/product/brand/{{$Pro->brand}}">{{$Pro->brand}} </a>		 </div>
                                    <div class="model"><span>Product Code: </span> {{$Pro->sku}} </div>
                                   <?php $Category = DB::table('categories')->where('id',$Pro->category)->get(); ?>
                                   @foreach ($Category as $cat)
                                      <div class="reward"><span>Category: </span><a href="{{url('/')}}/e-commerce/product/tags/{{$cat->slung}}"> {{$cat->title}} </a></div>
                                   @endforeach
                                </div>
                            </div>


                            <div id="product">




                                <div class="form-group box-info-product">
                                    <div class="option quantity">
                                        <div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
                                            <label>Qty </label>
                                            <input class="form-control" type="text" name="quantity" value="1" />
                                            <input type="hidden" name="product_id" value="50" />
                                            <span class="input-group-addon product_quantity_down">− </span>
                                            <span class="input-group-addon product_quantity_up">+ </span>
                                        </div>
                                    </div>
                                    <div class="cart">
                                       <a style="border:2px solid #1c2c52; border-radius:10px;" href="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$Pro->id}}" data-url="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$Pro->id}}" class="addToCart add-to-cart btn btn-mega btn-lg" data-toggle="tooltip" title="" onclick="cart.add('{{$Pro->id}}', '1');" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></a>
                                       <a
                                            style="border:2px solid #1c2c52; border-radius:10px;"
                                            href="https://wa.me/254724404935?text=Hello%20I%20would%20like%20to%20buy%20this%20product:%20{{$Pro->name}}%20-%20{{url('/')}}/e-commerce/product/{{$Pro->slung}}"
                                            target="_blank"
                                            class="btn btn-mega btn-lg"
                                            data-toggle="tooltip"
                                            title="Buy Now on WhatsApp"
                                        >
                                            <i class="fa fa-whatsapp"></i>
                                            <span class="hidden-xs">Buy Now</span>
                                        </a>

                                    </div>
                                    <div class="add-to-links wish_comp">
                                        <ul class="blank list-inline">
                                            <li class="wishlist">
                                                <a class="icon" data-toggle="tooltip" title="" onclick="wishlist.add('50');" data-original-title="Add to Wish List"><i class="fa fa-heart"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                </div>

                            </div>
                            <!-- end box info product -->

                        </div>
                    </div>
                </div>

                <section class="col-lg-2 hidden-sm hidden-md hidden-xs slider-products">
                    <div class="module col-sm-12 four-block">
                        <div class="modcontent clearfix">
                            <div class="policy-detail">
                                <div class="banner-policy">
                                    <div class="policy policy1">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	90 day
                                        <br> money back </a>
                                    </div>
                                    <div class="policy policy2">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	In-store exchange </a>
                                    </div>
                                    <div class="policy policy3">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	lowest price guarantee </a>
                                    </div>
                                    <div class="policy policy4">
                                        <a href="#"> <span class="ico-policy">&nbsp;</span>	shopping guarantee </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Product Tabs -->
            <div class="producttab ">
<div class="tabsslider  col-xs-12">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-1">Description</a></li>
        <li class="item_nonactive"><a data-toggle="tab" href="#tab-review">Reviews (1)</a></li>
        <li class="item_nonactive"><a data-toggle="tab" href="#tab-4">Tags</a></li>
        <li class="item_nonactive"><a data-toggle="tab" href="#tab-5">About Us</a></li>
    </ul>
    <div class="tab-content col-xs-12">
        <div id="tab-1" class="tab-pane fade active in">
            <p>
                {!! html_entity_decode($Pro->content, ENT_QUOTES, 'UTF-8') !!}
            </p>

        </div>
        <div id="tab-review" class="tab-pane fade">
            <form>
                <div id="review">

                    <div class="text-right"></div>
                </div>
                <h2 id="review-title">Write a review</h2>
                <div class="contacts-form">
                    <div class="form-group"> <span class="icon icon-user"></span>
                        <input type="text" name="name" class="form-control" value="Your Name" onblur="if (this.value == '') {this.value = 'Your Name';}" onfocus="if(this.value == 'Your Name') {this.value = '';}">
                    </div>
                    <div class="form-group"> <span class="icon icon-bubbles-2"></span>
                        <textarea class="form-control" name="text" onblur="if (this.value == '') {this.value = 'Your Review';}" onfocus="if(this.value == 'Your Review') {this.value = '';}">Your Review</textarea>
                    </div>
                    <span style="font-size: 11px;"><span class="text-danger">Note:</span>						HTML is not translated!</span>

                    <div class="form-group">
                     <b>Rating</b> <span>Bad</span>&nbsp;
                    <input type="radio" name="rating" value="1"> &nbsp;
                    <input type="radio" name="rating"
                    value="2"> &nbsp;
                    <input type="radio" name="rating"
                    value="3"> &nbsp;
                    <input type="radio" name="rating"
                    value="4"> &nbsp;
                    <input type="radio" name="rating"
                    value="5"> &nbsp;<span>Good</span>

                    </div>
                    <div class="buttons clearfix"><a id="button-review" class="btn buttonGray">Continue</a></div>
                </div>
            </form>
        </div>
        <div id="tab-4" class="tab-pane fade">
            <a href="{{url('/')}}/e-commerce/product/brand/{{$Pro->brand}}">{{$Pro->brand}}</a>,
            <?php $Category = DB::table('categories')->where('id',$Pro->category)->get(); ?>
           @foreach ($Category as $cat)

              <a href="{{url('/')}}/e-commerce/product/tags/{{$cat->slung}}">{{$cat->title}}</a>
           @endforeach



        </div>
        {{-- Leave that one there, It will work its magic --Hapana Guza --}}
        <div id="tab-5" class="tab-pane fade">
            <p>Royal Tech is the partner of choice for many of the world’s leading Brands, Such as HP, Toshiba, Lenovo, Acer among others. We help Individuals, SMEs and Corporates elevate their value through custom hardware options, product delivery, QA and consultancy services.</p>
        </div>
    </div>
</div>
</div>
            <!-- //Product Tabs -->

            <!-- Related Products -->
            <div class="related titleLine products-list grid module ">
        <h3 class="modtitle">Related Products  </h3>
            <div class="releate-products ">
                <?php $Related = DB::table('products')->where('category',$Pro->category)->get(); ?>
                @foreach ($Related as $item)
                <div class="product-layout">

                    <div class="product-item-container">
                        <div class="left-block">
                           <div class="product-image-container lazy second_img ">
                              <img data-src="{{url('/')}}/uploads/products/{{$item->image_one}}" src="{{url('/')}}/uploads/products/{{$item->image_one}}"  alt="{{$item->name}}" class="img-responsive" />
                              <img data-src="{{url('/')}}/uploads/products/{{$item->image_two}}" src="{{url('/')}}/uploads/products/{{$item->image_two}}"  alt="{{$item->name}}" class="img_0 img-responsive" />
                           </div>
                           <!--Sale Label-->
                           <span class="label label-sale">Ex-Uk</span>
                           <!--full quick view block-->
                           <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/')}}/e-commerce/quick-view/{{$item->slung}}">  Quickview</a>
                           <!--end full quick view block-->
                        </div>
                        <div class="right-block">
                           <div class="caption">
                              <h4><a href="{{url('/')}}/e-commerce/product/{{$item->slung}}">{{$item->name}}</a></h4>
                              <div class="ratings">
                                 <div class="rating-box">
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                 </div>
                              </div>
                              <div class="price">
                                 @if($item->price_raw == $item->price)
                                     <span class="price-new">KES {{$item->price_raw}}</span>

                                 @else
                                     <?php
                                        $Origianal = $item->price_raw;
                                        $Offer = $item->price;
                                        $Diff = $Origianal-$Offer;
                                        $Per = ($Diff*100)/$Origianal;
                                     ?>
                                     <span class="price-new">KES {{$item->price}}</span>
                                     <span class="price-old">KES {{$item->price_raw}}</span>
                                     <span class="label label-percent">-{{ceil($Per)}}%</span>
                                 @endif
                              </div>
                              <div class="description item-desc hidden">
                                 <p>{{$item->meta}} </p>
                              </div>
                           </div>
                           <div class="button-group">
                              <a href="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}" data-url="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}" class="addToCart add-to-cart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('{{$item->id}}', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs">Add to Cart</span></a>
                              

                              {{-- <button data-product="{{url('/')}}/e-commerce/shopping-cart/add-to-wishlist/{{$item->id}}" class="wishlist add-to-wishlist" type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('42');" style="min-height:38px !important; borders:3px solid #000;"><i class="fa fa-heart" ></i></button> --}}
                              {{-- <button class="compare" type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('42');"><i class="fa fa-exchange"></i></button> --}}
                           </div>
                        </div>
                        <!-- right block -->
                     </div>
                </div>
                @endforeach

            </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    var zoomCollection = '.large-image img';
                    $( zoomCollection ).elevateZoom({
                        zoomType    : "inner",
                        lensSize    :"200",
                        easing:true,
                        gallery:'thumb-slider-vertical',
                        cursor: 'pointer',
                        galleryActiveClass: "active"
                    });
                    $('.large-image').magnificPopup({
                        items: [
                            {src: '{{url('/')}}/uploads/products/{{$Pro->image_one}}'},
                            {src: '{{url('/')}}/uploads/products/{{$Pro->image_two}}'},
                            {src: '{{url('/')}}/uploads/products/{{$Pro->image_three}}'},
                            {src: '{{url('/')}}/uploads/products/{{$Pro->image_four}}'},
                        ],
                        gallery: { enabled: true, preload: [0,2] },
                        type: 'image',
                        mainClass: 'mfp-fade',
                        callbacks: {
                            open: function() {

                                var activeIndex = parseInt($('#thumb-slider-vertical .img.active').attr('data-index'));
                                var magnificPopup = $.magnificPopup.instance;
                                magnificPopup.goTo(activeIndex);
                            }
                        }
                    });
                    $("#thumb-slider-vertical .owl2-item").each(function() {
                        $(this).find("[data-index='0']").addClass('active');
                    });

                    $('.thumb-video').magnificPopup({
                      type: 'iframe',
                      iframe: {
                        patterns: {
                           youtube: {
                              index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
                              id: 'v=', // String that splits URL in a two parts, second part should be %id%
                              src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                                },
                            }
                        }
                    });

                    $('.product-options li.radio').click(function(){
                        $(this).addClass(function() {
                            if($(this).hasClass("active")) return "";
                            return "active";
                        });

                        $(this).siblings("li").removeClass("active");
                        $(this).parent().find('.selected-option').html('<span class="label label-success">'+ $(this).find('img').data('original-title') +'</span>');
                    });

                    var _isMobile = {
                      iOS: function() {
                       return navigator.userAgent.match(/iPhone/i);
                      },
                      any: function() {
                       return (_isMobile.iOS());
                      }
                    };

                    $(".thumb-vertical-outer .next-thumb").click(function () {
                        $( ".thumb-vertical-outer .lSNext" ).trigger( "click" );
                    });

                    $(".thumb-vertical-outer .prev-thumb").click(function () {
                        $( ".thumb-vertical-outer .lSPrev" ).trigger( "click" );
                    });

                    $(".thumb-vertical-outer .thumb-vertical").lightSlider({
                        item: 3,
                        autoWidth: false,
                        vertical:true,
                        slideMargin: 15,
                        verticalHeight:340,
                        pager: false,
                        controls: true,
                        prevHtml: '<i class="fa fa-angle-up"></i>',
                        nextHtml: '<i class="fa fa-angle-down"></i>',
                        responsive: [
                            {
                                breakpoint: 1199,
                                settings: {
                                    verticalHeight: 330,
                                    item: 3,
                                }
                            },
                            {
                                breakpoint: 1024,
                                settings: {
                                    verticalHeight: 235,
                                    item: 2,
                                    slideMargin: 5,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    verticalHeight: 340,
                                    item: 3,
                                }
                            }
                            ,
                            {
                                breakpoint: 480,
                                settings: {
                                    verticalHeight: 100,
                                    item: 1,
                                }
                            }

                        ]

                    });



                    // Product detial reviews button
                    $(".reviews_button,.write_review_button").click(function (){
                        var tabTop = $(".producttab").offset().top;
                        $("html, body").animate({ scrollTop:tabTop }, 1000);
                    });
                });

            </script>


        </div>


    </div>
    <!--Middle Part End-->
</div>
<!-- //Main Container -->
@endforeach
@endsection
