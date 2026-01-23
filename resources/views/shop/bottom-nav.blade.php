@php
    $cartItems = \Cart::getContent();
    $cartCount = $cartItems->count();
    $cartTotal = \Cart::getTotal();
@endphp

<!-- E-Commerce Bottom Navigation -->
<nav class="ecommerce-bottom-nav">
    <a href="{{url('/')}}/e-commerce" class="nav-item" data-page="shop">
        <span class="nav-icon fa fa-shopping-bag"></span>
        <span class="nav-label">Shop</span>
    </a>
    <a href="{{url('/')}}/e-commerce/shopping-cart" class="nav-item cart-nav" data-page="cart">
        <span class="nav-icon fa fa-shopping-cart"></span>
        <span class="nav-label">Cart</span>
        @if($cartCount > 0)
        <span class="cart-badge">{{$cartCount}}</span>
        @endif
    </a>
    @if($cartCount > 0)
    <a href="{{url('/')}}/e-commerce/shopping-cart/checkout" class="nav-item checkout-nav" data-page="checkout">
        <span class="nav-icon fa fa-credit-card"></span>
        <span class="nav-label">Checkout</span>
    </a>
    @else
    <a href="#" class="nav-item checkout-nav disabled" onclick="return false;" title="Add items to cart first">
        <span class="nav-icon fa fa-credit-card"></span>
        <span class="nav-label">Checkout</span>
    </a>
    @endif
    @if(Auth::check())
    <a href="{{url('/')}}/dashboard" class="nav-item" data-page="account">
        <span class="nav-icon fa fa-user"></span>
        <span class="nav-label">Account</span>
    </a>
    @else
    <a href="{{url('/')}}/login" class="nav-item" data-page="login">
        <span class="nav-icon fa fa-sign-in"></span>
        <span class="nav-label">Login</span>
    </a>
    @endif
    <a href="{{url('/')}}" class="nav-item" data-page="home">
        <span class="nav-icon fa fa-home"></span>
        <span class="nav-label">Home</span>
    </a>
</nav>

<style>
/* E-Commerce Bottom Navigation Styles */
.ecommerce-bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 8px 0;
    z-index: 1000;
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    height: 60px;
}

.ecommerce-bottom-nav .nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #666;
    font-size: 11px;
    flex: 1;
    position: relative;
    transition: all 0.3s ease;
    padding: 4px 8px;
}

.ecommerce-bottom-nav .nav-item:hover,
.ecommerce-bottom-nav .nav-item:focus {
    text-decoration: none;
    color: #1c2c52;
}

.ecommerce-bottom-nav .nav-item.active {
    color: #1c2c52;
}

.ecommerce-bottom-nav .nav-item.disabled {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
}

.ecommerce-bottom-nav .nav-icon {
    font-size: 20px;
    margin-bottom: 4px;
    display: block;
}

.ecommerce-bottom-nav .nav-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 500;
}

.ecommerce-bottom-nav .nav-item.active .nav-icon {
    color: #1c2c52;
    transform: scale(1.1);
}

.ecommerce-bottom-nav .cart-badge {
    position: absolute;
    top: 2px;
    right: 50%;
    transform: translateX(12px);
    background: #e74c3c;
    color: #fff;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 10px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1;
    border: 2px solid #fff;
}

.ecommerce-bottom-nav .cart-nav.active .cart-badge {
    background: #1c2c52;
}

/* Hide on desktop/tablet - show only on mobile */
@media (min-width: 768px) {
    .ecommerce-bottom-nav {
        display: none;
    }
}

/* Ensure content doesn't get hidden behind bottom nav */
@media (max-width: 767px) {
    .main-container {
        padding-bottom: 70px !important;
    }
    
    body.res.layout-subpage {
        padding-bottom: 60px;
    }
}
</style>

<script>
// Set active state for e-commerce bottom nav based on current page
(function() {
    var currentPath = window.location.pathname;
    var navItems = document.querySelectorAll('.ecommerce-bottom-nav .nav-item');
    
    navItems.forEach(function(item) {
        var itemHref = item.getAttribute('href');
        var itemPage = item.getAttribute('data-page');
        
        // Remove active class first
        item.classList.remove('active');
        
        // Skip disabled items
        if (item.classList.contains('disabled')) {
            return;
        }
        
        // Skip external links
        if (itemHref && itemHref.startsWith('http') && !itemHref.includes(window.location.hostname)) {
            return;
        }
        
        if (!itemHref || itemHref === '#') {
            return;
        }
        
        var itemPath = new URL(itemHref, window.location.origin).pathname;
        
        // Check if current path matches exactly
        if (currentPath === itemPath || currentPath === itemPath + '/') {
            item.classList.add('active');
        } 
        // Special handling for product pages - mark shop button as active
        else if (itemPage === 'shop' && (currentPath.includes('/e-commerce/product/') || currentPath.includes('/e-commerce') && !currentPath.includes('/shopping-cart'))) {
            item.classList.add('active');
        }
        // Special handling for cart page
        else if (itemPage === 'cart' && currentPath.includes('/shopping-cart') && !currentPath.includes('/checkout')) {
            item.classList.add('active');
        }
        // Special handling for checkout page
        else if (itemPage === 'checkout' && currentPath.includes('/checkout')) {
            item.classList.add('active');
        }
        // Special handling for account/dashboard
        else if (itemPage === 'account' && currentPath.includes('/dashboard')) {
            item.classList.add('active');
        }
    });
})();
</script>
