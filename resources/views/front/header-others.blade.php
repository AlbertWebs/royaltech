<style>
/* Ensure header-others has white background and dark menu text */
.header-others-white-bg {
    background-color: #ffffff !important;
    background: #ffffff !important;
}

.header-others-white-bg .main-menu .navigation > li > a {
    color: #222222 !important;
    border: 1px solid rgba(29, 51, 92, 0.1) !important;
    border-radius: 6px !important;
    box-sizing: border-box !important;
    transition: all 0.3s ease !important;
    background: rgba(255, 255, 255, 0) !important;
    padding: 33px 12px !important;
    font-weight: 600 !important;
}

.header-others-white-bg .main-menu .navigation > li:hover > a,
.header-others-white-bg .main-menu .navigation > li.current > a {
    color: #1d335c !important;
    border-color: rgba(29, 51, 92, 0.25) !important;
    background: rgba(29, 51, 92, 0.05) !important;
    box-shadow: 0 2px 8px rgba(29, 51, 92, 0.1) !important;
}

.header-others-white-bg .main-menu .navigation > li.dropdown > a {
    padding-right: 25px !important;
}

.header-others-white-bg .main-menu .navigation > li.dropdown > a:before {
    color: #222222 !important;
}

.header-others-white-bg .outer-box .nav-btn {
    color: #222222 !important;
}

.header-others-white-bg .btn-box .theme-btn {
    color: #ffffff !important;
    background-color: #1d335c !important;
}

.header-others-white-bg .btn-box .theme-btn:hover {
    background-color: #1c2c52 !important;
}
</style>

<!--Header-Upper-->
<div class="header-upper header-others-white-bg">
    <div class="outer-container clearfix">

        <div class="pull-left logo-box">
            <div class="logo">
                <a href="{{url('/')}}"><img style="max-height:100px" src="{{url('/')}}/uploads/logo-theme.png" alt="Royal Tech Computers Limited" title=""></a> &nbsp; &nbsp;
            </div>
        </div>

        <div class="nav-outer clearfix">
            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
            <!-- Main Menu -->
            <nav class="main-menu navbar-expand-md">
                <div class="navbar-header">
                    <!-- Toggle Button -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                    @include('front.menu')
                </div>
            </nav>

            <!-- Main Menu End-->
            <div class="outer-box clearfix">

                <!-- Cart Box -->
                {{-- @include('front.carts') --}}

                <!-- Nav Btn -->
                <div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-2"></span></div>

                @if(Auth::User())
                <div class="btn-box">
                    <a href="{{url('/')}}/dashboard" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-user"></span> &nbsp; {{Auth::User()->name}}</span></a>
                </div>
                @else
                <!-- Quote Btn -->
                <div class="btn-box">
                    <a href="{{url('/')}}/contact-us" class="theme-btn btn-style-one"><span class="txt"><span class="fa fa-phone"></span> &nbsp; Contact us</span></a>
                </div>
                @endif

            </div>
        </div>

    </div>
</div>
<!--End Header Upper-->
