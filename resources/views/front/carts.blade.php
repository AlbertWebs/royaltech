@php
    $cartItems = \Cart::getContent();
@endphp
@if($cartItems->isEmpty())
<div class="cart-box">
    <div class="dropdown">
        <button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-bag-1"></span><span class="total-cart">0</span></button>

    </div>
</div>
@else
<div class="cart-box">
    <div class="dropdown">
        <button class="cart-box-btn dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flaticon-shopping-bag-1"></span><span class="total-cart">2</span></button>
        <div class="dropdown-menu pull-right cart-panel" aria-labelledby="dropdownMenu">
            @foreach ($cartItems as $cartitems)
            <?php
               $Product = DB::table('products')->where('id',$cartitems->id)->get();
            ?>
                @foreach ($Product as $products)
                <div class="cart-product">
                    <div class="inner">
                        <div class="cross-icon"><span class="icon fa fa-remove"></span></div>
                        <div class="image"><img src="{{url('/')}}/uploads/products/{{ $cartitems->attributes->image }}" alt="" /></div>
                        <h3><a href="{{url('/')}}/e-commerce/product/{{$products->slung}}"><small>{{$products->name}}</small></a></h3>
                        <div class="quantity-text">Quantity x{{$cartitems->quantity}}</div>
                        <div class="price">KES {{$products->price}}</div>
                    </div>
                </div>
                @endforeach
                @endforeach

            <div class="cart-total">Sub Total: <span>kes {{\Cart::getTotal()}}</span></div>
            <ul class="btns-boxed">
                <li><a href="{{url('/')}}/e-commerce/shopping-cart">View Cart</a></li>
                <li><a href="{{url('/')}}/e-commerce/shopping-cart/checkout">CheckOut</a></li>
            </ul>

        </div>
    </div>
</div>
@endif

