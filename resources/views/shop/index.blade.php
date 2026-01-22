@extends('shop.master')

@section('content')
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
       <li><a href="#"><i class="fa fa-home"></i></a></li>
       <li><a href="#">{{$title}}</a></li>
    </ul>
    <div class="row">
       <!--Middle Part Start-->
       <div id="content" class="col-md-12 col-sm-12">
          <h3 class="offset_title">{{$title}}</h3>
          <div class="products-category">
             
             <!--changed listings-->
             <div class="products-list row list">
                @foreach ($Products as $item)
                <div class="product-layout col-md-4 col-sm-4 col-xs-6">
                    <div class="product-item-container">
                       <div class="left-block">
                          <div class="product-image-container lazy second_img ">
                             <img data-src="{{url('/')}}/uploads/products/{{$item->image_one}}" src="{{url('/')}}/uploads/products/{{$item->image_one}}"  alt="{{$item->name}}" class="img-responsive product-img" />
                             <img data-src="{{url('/')}}/uploads/products/{{$item->image_two}}" src="{{url('/')}}/uploads/products/{{$item->image_two}}"  alt="{{$item->name}}" class="img_0 img-responsive" />
                          </div>
                          <!--Sale Label-->
                          @if($item->pro_condition == "Ex-UK")
                             <span class="label label-new" style="background-color: #e74c3c; color: #ffffff;">Ex-UK</span>
                          @else
                             <span class="label label-new">New</span>
                          @endif
                          <!--full quick view block-->
                          {{-- <a class="quickview iframe-link visible-lg" data-fancybox-type="iframe"  href="{{url('/')}}/e-commerce/quick-view/{{$item->slung}}">  Quickview</a> --}}
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
                                   <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
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
             <!--// End Changed listings-->
             <!-- Filters -->
             <div class="product-filter product-filter-bottom filters-panel" >
                <div class="row">
                   <div class="col-md-2 hidden-sm hidden-xs">
                   </div>
                   <div class="short-by-show text-center col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">Showing 1 to 9 of 10 (2 Pages)</div>
                   </div>

                </div>
             </div>
             <!-- //end Filters -->
          </div>
       </div>
    </div>
    <!--Middle Part End-->
 </div>
 <!-- //Main Container -->
@endsection
