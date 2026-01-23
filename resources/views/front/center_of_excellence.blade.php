@extends('front.master-other')

@section('content')
@foreach ($Service as $service)

<style>
/* Fix breadcrumb overlap with header */
.page-title {
    padding-top: 160px !important;
    margin-top: 0 !important;
    position: relative;
    z-index: 1;
}

@media (max-width: 991px) {
    .page-title {
        padding-top: 140px !important;
    }
}

@media (max-width: 575px) {
    .page-title {
        padding-top: 120px !important;
    }
}
</style>

	<!--Page Title-->
    <section class="page-title">
		<div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
    	<div class="auto-container">
		<br><br><br>
			<h2>{{$service->title}}</h2>
			<ul class="page-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<a href="{{url('/')}}" itemprop="item">
						<span itemprop="name">Home</span>
					</a>
					<meta itemprop="position" content="1" />
				</li>
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<span itemprop="name">Center of Excellence</span>
					<meta itemprop="position" content="2" />
				</li>
				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					<span itemprop="name">{{$service->title}}</span>
					<meta itemprop="position" content="3" />
				</li>
			</ul>
        </div>
    </section>
    <!--End Page Title-->

	<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Sidebar Side -->
                <div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">

						<!-- Services -->
                        <div class="sidebar-widget">
                            <ul class="service-list">
                                <?php $Servicess = DB::table('services')->get(); ?>
                                @foreach ($Servicess as $Ser)
                                @if($Ser->id == $service->id)
                                   <li class="current"><a href="{{url('/')}}/center-of-excellence/{{$Ser->slung}}"><span class="arrow fa fa-angle-double-right"></span> {{$Ser->title}}</a></li>
                                @else
                                   <li><a href="{{url('/')}}/center-of-excellence/{{$Ser->slung}}"><span class="arrow fa fa-angle-double-right"></span> {{$Ser->title}}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>

						<!-- Contact Widget -->
						<div class="sidebar-widget contact-widget">
							<div class="widget-content" style="background-image:url('{{asset('corporate/images/background/bg.jpg')}}')">
								<div class="border-layer"></div>
								<div class="icon-box flaticon-phone-call"></div>
								<h4>How Can We Help?</h4>
								<div class="text">If you need any help, please <br> feel free to contact us.</div>
								<ul>
									<li><span class="icon flaticon-call"></span><a style="color:#ffffff" href="tel:+254724404935">254724404935</a></li>
									<li><span class="icon flaticon-envelope"></span><a style="color:#ffffff" href="mailto:info@royaltech.co.ke">info@royaltech.co.ke</a></li>
								</ul>
							</div>
						</div>

					</aside>
				</div>

				<!-- Content Side -->
                <div class="content-side right-sidebar col-lg-8 col-md-12 col-sm-12">
                	<div class="services-detail">
						<div class="inner-box">
							<h2>
                                {{$service->title}}
                            </h2>
							<div class="image">
								<img style="border:6px solid #1c2c52; border-radius:10px;" src="{{url('/')}}/uploads/services/{{$service->image}}" alt="{{$service->title}}" />
							</div>
							{!! html_entity_decode($service->content, ENT_QUOTES, 'UTF-8') !!}

							<div class="image-two">
								<img style="border:6px solid #1c2c52; border-radius:10px;" src="{{url('/')}}/uploads/services/{{$service->image}}" alt="{{$service->title}}" />
								<div class="play-box">
									<a href="https://www.youtube.com/watch?v=lQ4y_POCT20" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
								</div>
							</div>
							<h3>{{$service->title}}</h3>
                            {!! html_entity_decode($service->content_one, ENT_QUOTES, 'UTF-8') !!}
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

    @endforeach
@endsection
