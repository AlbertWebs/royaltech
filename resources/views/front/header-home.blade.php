<!--Header-Upper-->
<div class="header-upper">
    <div class="outer-container clearfix">

        <div class="pull-left logo-box">
            <div class="logo">
                <a href="{{url('/')}}"><img style="max-height:100px" src="{{url('/')}}/uploads/Royaltech-Original-White-1.png" alt="Royal Tech Computers Limited" title=""></a> &nbsp; &nbsp;
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
