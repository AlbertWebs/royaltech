<!-- News Section Two -->
	<section class="news-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<div class="title">Our Blog</div>
				<h2>Click Out Our <br> Latest News & Articles</h2>
			</div>
			<div class="inner-container">

				<div class="single-item-carousel owl-carousel owl-theme">

                    <?php $Blog = DB::table('blogs')->limit(3)->get(); ?>
                    @foreach ($Blog as $blog)
					<!-- News Block Two -->
					<div class="news-block-two">
						<div class="inner-box">
							<div class="row clearfix">
								<!-- Content Column -->
								<div class="content-column col-lg-5 col-md-12 col-sm-12">
									<div class="inner-column">
										<h4><a href="{{url('/')}}/blogs/{{$blog->slung}}">{{$blog->title}}</a></h4>
										<div class="text">{!! html_entity_decode($blog->meta, ENT_QUOTES, 'UTF-8') !!}</div>
										<ul class="post-meta">
											<li><span class="icon flaticon-comment"></span>3 comments</li>
											<li><span class="icon flaticon-user"></span>Admin</li>
										</ul>
										<a href="{{url('/')}}/blogs/{{$blog->slung}}" class="theme-btn btn-style-three"><span class="txt">Read More</span></a>
									</div>
								</div>
								<!-- Image Column -->
								<div class="image-column col-lg-7 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="post-date">{{date("d", strtotime($blog->created_at))}} <span>{{date("M", strtotime($blog->created_at))}}</span></div>
										<div class="image">
											<a href="{{url('/')}}/blogs/{{$blog->slung}}"><img src="{{url('/')}}/uploads/blog/{{$blog->image}}" alt="{{$blog->title}}" /></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach


				</div>

			</div>
		</div>
	</section>
	<!-- End News Section Two -->
