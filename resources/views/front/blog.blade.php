@extends('front.master-other')

@section('content')
@foreach ($Blog as $blog)
<?php $Current = $blog->id ?>
<section class="page-title">
    <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
    <div class="auto-container">
        <h2>{{$blog->title}}</h2>
        <ul class="page-breadcrumb">
            <li><a href="{{url('/')}}">home</a></li>
            <li>{{$blog->title}}</li>
        </ul>
    </div>
</section>

	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">

				<!-- Content Side -->
                <div class="content-side col-lg-10 col-md-12 col-sm-12" style="margin:0 auto    ">
                	<div class="news-detail">
						<div class="inner-box">
							<div class="upper-box">
								<h3>{{$blog->title}}</h3>
								<ul class="post-meta">
									<li><span class="icon flaticon-comment"></span>0 comments</li>
									<li><span class="icon flaticon-user"></span>Admin</li>
								</ul>
							</div>
							<div class="image">
								<img src="{{url('/')}}/uploads/blog/{{$blog->image}}" alt="" />
								<div class="post-date"> {{date("d", strtotime($blog->created_at))}} <span>{{date("M", strtotime($blog->created_at))}}</span></div>
							</div>

							<div class="lower-content">
								<p>
                                    {!! html_entity_decode($blog->content, ENT_QUOTES, 'UTF-8') !!}
                                </p>


								<!-- Post Share Options-->
								<div class="post-share-options">
									<div class="post-share-inner clearfix">
										<div class="pull-left tags"><a href="#">Business</a> <a href="#">Solution</a><a href="#">IT-Services</a><a href="#">Laptop Hire</a></div>
										<ul class="social-box pull-right">
											<li class="share">Share This Post :</li>
											<li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
											<li><a href="#"><span class="fa fa-twitter"></span></a></li>
											<li><a href="#"><span class="fa fa-linkedin"></span></a></li>
											<li><a href="#"><span class="fa fa-instagram"></span></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>






					</div>
				</div>

				<!-- Sidebar Side -->
                {{-- <div class="sidebar-side left-sidebar col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						<div class="sidebar-inner">

							<!-- Search -->
							<div class="sidebar-widget search-box">
								<div class="sidebar-title">
									<h5>Search :-</h5>
								</div>
								<form method="post" action="https://expert-themes.com/html/globex/contact.html">
									<div class="form-group">
										<input type="search" name="search-field" value="" placeholder="Search....." required>
										<button type="submit"><span class="icon fa fa-search"></span></button>
									</div>
								</form>
							</div>

							<!-- Categories Widget -->
							<div class="sidebar-widget categories-widget">
								<div class="sidebar-title">
									<h5>Categories :-</h5>
								</div>
								<div class="widget-content">
									<ul class="blog-cat">
                                        <?php
                                           $Categories = DB::table('categories')->get();
                                        ?>
                                        @foreach ($Categories as $categories)
                                          <li><a href="#">{{$categories->title}} <span>( <?php $Blogz = DB::table('blogs')->where('category',$categories->id)->get(); ?> 0{{count($Blogz)}} )</span></a></li>
                                        @endforeach

									</ul>
								</div>
							</div>

							<!-- Categories Widget -->
							<div class="sidebar-widget popular-posts">
								<div class="sidebar-title">
									<h5>Recent Post :-</h5>
								</div>
								<div class="widget-content">
                                    <?php $Blog = DB::table('blogs')->get(); ?>
                                    @foreach ($Blog as $blog)
									<article class="post">
										<figure class="post-thumb"><img src="{{url('/')}}/uploads/blog/{{$blog->image}}" alt=""><a href="{{url('/')}}/blogs/{{$blog->slung}}" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
										<div class="text"><a href="{{url('/')}}/blogs/{{$blog->slung}}">{{$blog->title}}</a></div>
									</article>
                                    @endforeach
								</div>
							</div>

							<!-- Popular Posts -->
							<div class="sidebar-widget popular-tags">
								<div class="sidebar-title">
									<h5>Tag Cloud :-</h5>
								</div>
                                <?php $Services = DB::table('services')->get(); ?>
								<div class="widget-content">
                                    @foreach ($Services as $services)
                                    <a href="{{url('/')}}/center-of-excellence/{{$services->slung}}">{{$services->title}}</a>
                                    @endforeach
								</div>
							</div>


						</div>
					</aside>
				</div> --}}

			</div>
		</div>
	</div>
	<!-- End Sidebar Page Container -->

	<!-- News More Section -->
	<section class="news-more-section">
		<div class="auto-container">
			<div class="row clearfix">

                <?php $Blog = DB::table('blogs')->limit(3)->get(); ?>
                <?php
                    $CurrentID = $Current;
                    $Next = $CurrentID+1;
                    $Previous = $CurrentID-1;
                    $NextProduct = \App\Models\Blog::find($Next);
                    $PreviousProduct = \App\Models\Blog::find($Previous);
                ?>

                @if($PreviousProduct==null)

                @else
				<!-- New Post -->
				<div class="new-post col-lg-6 col-md-12 col-sm-12">
					<div class="post-inner">
						<div class="content">
							<div class="post-image">
								<img src="{{url('/')}}/uploads/blog/{{$PreviousProduct->image}}" alt="{{$PreviousProduct->title}}" />
							</div>
							<h4><a href="{{url('/')}}/blogs/{{$PreviousProduct->slung}}">{{$PreviousProduct->title}} </a></h4>
							<a href="{{url('/')}}/blogs/{{$PreviousProduct->slung}}" class="more">Previous</a>
						</div>
					</div>
				</div>
                @endif


                @if($NextProduct==null)

                @else
                <!-- New Post -->
				<div class="new-post style-two col-lg-6 col-md-12 col-sm-12">
					<div class="post-inner">
						<div class="content">
							<div class="post-image">
								<img src="{{url('/')}}/uploads/blog/{{$NextProduct->image}}" alt="{{$NextProduct->title}}" />
							</div>
							<h4><a href="{{url('/')}}/blogs/{{$NextProduct->slung}}">{{$NextProduct->title}}</a></h4>
							<a href="{{url('/')}}/blogs/{{$NextProduct->slung}}" class="more">Next</a>
						</div>
					</div>
				</div>
                @endif

			</div>
		</div>
	</section>
	<!-- End News More Section -->



@endforeach
@endsection
