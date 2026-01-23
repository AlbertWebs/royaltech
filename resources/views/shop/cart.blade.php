@extends('shop.master-cart')

@section('content')
@php
    $cartItems = \Cart::getContent();
    $Shipping = 700;
    $cartCount = $cartItems->count();
    $Total = \Cart::getTotal();
    $totalShipping = 0;
    if($cartCount > 0) {
        $totalShipping = $Shipping * $cartItems->sum('quantity');
    }
    $grandTotal = $Total + $totalShipping;
@endphp

<!--Page Title-->
<section class="page-title">
    <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
    <div class="auto-container">
        <h2>Shopping Cart</h2>
        <ul class="page-breadcrumb">
            <li><a href="{{url('/')}}">home</a></li>
            <li>Shop Online</li>
            <li>Shopping Cart</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<style>
/* Modern Cart Page Styles */
.cart-page-wrapper {
    padding: 30px 0 100px;
}

.cart-header {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #f0f0f0;
}

.cart-header h2 {
    margin: 0;
    font-size: 28px;
    font-weight: 700;
    color: #1c2c52;
    display: flex;
    align-items: center;
    gap: 10px;
}

.cart-header h2 .fa {
    color: #1c2c52;
}

.cart-items-section {
    margin-bottom: 30px;
}

.cart-item-card {
    background: #fff;
    border: 1px solid #e8e8e8;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.cart-item-card:hover {
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    border-color: #1c2c52;
}

.cart-item-content {
    display: flex;
    gap: 20px;
    align-items: center;
}

.cart-item-image {
    flex-shrink: 0;
    width: 120px;
    height: 120px;
    border-radius: 8px;
    overflow: hidden;
    background: #f8f8f8;
    border: 1px solid #e8e8e8;
}

.cart-item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.cart-item-image:hover img {
    transform: scale(1.05);
}

.cart-item-details {
    flex: 1;
    min-width: 0;
}

.cart-item-name {
    font-size: 18px;
    font-weight: 600;
    color: #1c2c52;
    margin-bottom: 8px;
    line-height: 1.4;
}

.cart-item-name a {
    color: #1c2c52;
    text-decoration: none;
    transition: color 0.3s ease;
}

.cart-item-name a:hover {
    color: #1c2c52;
    text-decoration: underline;
}

.cart-item-price {
    font-size: 16px;
    color: #666;
    margin-bottom: 15px;
}

.cart-item-price .unit-price {
    color: #999;
    font-size: 14px;
}

.cart-item-actions {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: wrap;
}

.quantity-control {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 6px;
    overflow: hidden;
    background: #fff;
}

.quantity-control button {
    background: #f8f8f8;
    border: none;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    color: #666;
    font-size: 16px;
    font-weight: 600;
}

.quantity-control button:hover {
    background: #1c2c52;
    color: #fff;
}

.quantity-control input {
    width: 60px;
    height: 36px;
    border: none;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
    color: #1c2c52;
    background: #fff;
}

.quantity-control input:focus {
    outline: none;
}

.remove-item-btn {
    background: #fff;
    border: 1px solid #e74c3c;
    color: #e74c3c;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.remove-item-btn:hover {
    background: #e74c3c;
    color: #fff;
    text-decoration: none;
}

.item-total {
    font-size: 20px;
    font-weight: 700;
    color: #1c2c52;
    margin-left: auto;
    text-align: right;
    min-width: 120px;
}

.cart-summary-card {
    background: linear-gradient(135deg, #1c2c52 0%, #2c3e6b 100%);
    border-radius: 12px;
    padding: 30px;
    color: #fff;
    box-shadow: 0 4px 20px rgba(28, 44, 82, 0.2);
    position: sticky;
    top: 20px;
}

.cart-summary-card h3 {
    margin: 0 0 25px 0;
    font-size: 24px;
    font-weight: 700;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 10px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
    font-size: 15px;
}

.summary-row:last-of-type {
    border-bottom: none;
}

.summary-row.total-row {
    font-size: 20px;
    font-weight: 700;
    padding-top: 20px;
    margin-top: 10px;
    border-top: 2px solid rgba(255,255,255,0.2);
}

.summary-label {
    color: rgba(255,255,255,0.9);
}

.summary-value {
    color: #fff;
    font-weight: 600;
}

.cart-actions {
    margin-top: 30px;
    display: flex;
    gap: 15px;
    flex-direction: column;
}

.btn-continue-shopping {
    background: #fff;
    color: #1c2c52;
    border: 2px solid #fff;
    padding: 14px 24px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-continue-shopping:hover {
    background: rgba(255,255,255,0.1);
    color: #fff;
    text-decoration: none;
}

.btn-checkout {
    background: #fff;
    color: #1c2c52;
    border: 2px solid #fff;
    padding: 16px 24px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 700;
    text-decoration: none;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.btn-checkout:hover {
    background: rgba(255,255,255,0.95);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #1c2c52;
}

.empty-cart {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 12px;
    border: 2px dashed #e8e8e8;
}

.empty-cart-icon {
    font-size: 80px;
    color: #ddd;
    margin-bottom: 20px;
}

.empty-cart h3 {
    font-size: 24px;
    color: #666;
    margin-bottom: 10px;
}

.empty-cart p {
    color: #999;
    margin-bottom: 30px;
}

/* Mobile Responsive */
@media (max-width: 767px) {
    .cart-page-wrapper {
        padding: 20px 0 100px;
    }
    
    .cart-header h2 {
        font-size: 22px;
    }
    
    .cart-item-content {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .cart-item-image {
        width: 100%;
        height: 200px;
    }
    
    .cart-item-actions {
        width: 100%;
        justify-content: space-between;
    }
    
    .item-total {
        margin-left: 0;
        margin-top: 15px;
        width: 100%;
        text-align: left;
    }
    
    .cart-summary-card {
        position: relative;
        top: 0;
        margin-top: 30px;
    }
    
    .cart-actions {
        flex-direction: column;
    }
}

/* Loading state */
.updating {
    opacity: 0.6;
    pointer-events: none;
}

/* Success animation */
@keyframes successPulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.success-animation {
    animation: successPulse 0.3s ease;
}
</style>

<!-- Main Container -->
<div class="main-container container" style="padding-top: 40px;">
    <div class="cart-page-wrapper">
        <div class="cart-header">
            <h2>
                <i class="fa fa-shopping-cart"></i>
                Shopping Cart
                @if($cartCount > 0)
                <span style="font-size: 18px; color: #999; font-weight: 400;">({{$cartCount}} {{$cartCount == 1 ? 'item' : 'items'}})</span>
                @endif
            </h2>
        </div>

        @if($cartCount > 0)
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-8 col-sm-12">
                <div class="cart-items-section">
                    @foreach ($cartItems as $cartitems)
                        <?php $Product = DB::table('products')->where('id',$cartitems->id)->get(); ?>
                        @foreach ($Product as $item)
                            @php
                                $itemTotal = $cartitems->price * $cartitems->quantity;
                            @endphp
                            <div class="cart-item-card" data-item-id="{{$cartitems->id}}">
                                <div class="cart-item-content">
                                    <div class="cart-item-image">
                                        <a href="{{url('/')}}/e-commerce/product/{{$item->slung}}" target="_blank">
                                            <img src="{{url('/')}}/uploads/products/{{ $cartitems->attributes->image }}" alt="{{$cartitems->name}}" />
                                        </a>
                                    </div>
                                    
                                    <div class="cart-item-details">
                                        <h3 class="cart-item-name">
                                            <a href="{{url('/')}}/e-commerce/product/{{$item->slung}}" target="_blank">{{$cartitems->name}}</a>
                                        </h3>
                                        <div class="cart-item-price">
                                            <span class="unit-price">KES {{number_format($cartitems->price, 2)}} each</span>
                                        </div>
                                        
                                        <div class="cart-item-actions">
                                            <form method="GET" action="{{url('/')}}/e-commerce/shopping-cart/update-quantity/{{$cartitems->id}}" class="quantity-form" style="display: inline-block;">
                                                <div class="quantity-control">
                                                    <button type="button" class="qty-decrease" data-item-id="{{$cartitems->id}}" data-current-qty="{{$cartitems->quantity}}">−</button>
                                                    <input type="number" name="quantity" value="{{$cartitems->quantity}}" min="1" class="qty-input" data-item-id="{{$cartitems->id}}" />
                                                    <button type="button" class="qty-increase" data-item-id="{{$cartitems->id}}" data-current-qty="{{$cartitems->quantity}}">+</button>
                                                </div>
                                            </form>
                                            
                                            <a href="{{ url('e-commerce/shopping-cart') }}/remove/{{$cartitems->id}}" 
                                               class="remove-item-btn" 
                                               onclick="return confirm('Remove {{$item->name}} from cart?');">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="item-total">
                                        KES {{number_format($itemTotal, 2)}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-md-4 col-sm-12">
                <div class="cart-summary-card">
                    <h3>
                        <i class="fa fa-calculator"></i>
                        Order Summary
                    </h3>
                    
                    <div class="summary-row">
                        <span class="summary-label">Subtotal</span>
                        <span class="summary-value">KES {{number_format($Total, 2)}}</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Shipping Rate</span>
                        <span class="summary-value">KES {{number_format($Shipping, 2)}}</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Total Shipping</span>
                        <span class="summary-value">KES {{number_format($totalShipping, 2)}}</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Discount</span>
                        <span class="summary-value">KES 0.00</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">VAT (0%)</span>
                        <span class="summary-value">KES 0.00</span>
                    </div>
                    
                    <div class="summary-row total-row">
                        <span class="summary-label">Total</span>
                        <span class="summary-value">KES {{number_format($grandTotal, 2)}}</span>
                    </div>
                    
                    <div class="cart-actions">
                        <a href="{{url('/')}}/e-commerce" class="btn-continue-shopping">
                            <i class="fa fa-arrow-left"></i>
                            Continue Shopping
                        </a>
                        <a href="{{url('/')}}/e-commerce/shopping-cart/checkout" class="btn-checkout">
                            <i class="fa fa-credit-card"></i>
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Empty Cart State -->
        <div class="empty-cart">
            <div class="empty-cart-icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <h3>Your cart is empty</h3>
            <p>Looks like you haven't added any items to your cart yet.</p>
            <a href="{{url('/')}}/e-commerce" class="btn btn-primary" style="padding: 12px 30px; font-size: 16px;">
                <i class="fa fa-shopping-bag"></i> Start Shopping
            </a>
        </div>
        @endif
    </div>
</div>
<!-- //Main Container -->

<!-- E-Commerce Bottom Navigation -->
@include('shop.bottom-nav')

<script>
// Quantity control functionality
document.addEventListener('DOMContentLoaded', function() {
    // Increase quantity
    document.querySelectorAll('.qty-increase').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = document.querySelector('.qty-input[data-item-id="' + this.dataset.itemId + '"]');
            var currentQty = parseInt(input.value) || 1;
            input.value = currentQty + 1;
            updateCartItem(this.dataset.itemId, input.value);
        });
    });
    
    // Decrease quantity
    document.querySelectorAll('.qty-decrease').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = document.querySelector('.qty-input[data-item-id="' + this.dataset.itemId + '"]');
            var currentQty = parseInt(input.value) || 1;
            if (currentQty > 1) {
                input.value = currentQty - 1;
                updateCartItem(this.dataset.itemId, input.value);
            }
        });
    });
    
    // Manual input change
    document.querySelectorAll('.qty-input').forEach(function(input) {
        input.addEventListener('change', function() {
            var qty = parseInt(this.value) || 1;
            if (qty < 1) qty = 1;
            this.value = qty;
            updateCartItem(this.dataset.itemId, qty);
        });
    });
});

function updateCartItem(itemId, quantity) {
    var form = document.querySelector('.quantity-form input[data-item-id="' + itemId + '"]').closest('form');
    var card = document.querySelector('.cart-item-card[data-item-id="' + itemId + '"]');
    card.classList.add('updating');
    
    // Update via URL
    var updateUrl = form.action + '?quantity=' + quantity;
    
    // Redirect to update URL
    window.location.href = updateUrl;
}
</script>
@endsection
