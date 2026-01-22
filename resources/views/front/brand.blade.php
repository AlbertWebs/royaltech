<!--Sponsors Section-->
	<section class="sponsors-section style-three brands-carousel-section">
		<div class="auto-container">
			<div class="sec-title centered">
				<div class="title">Our Trusted Brands</div>
				<p class="section-subtitle">Partnering with World-Class Technology Leaders</p>
			</div>

			<div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <?php $Brands = DB::table('brands')->get(); ?>
                    @foreach ($Brands as $brands)
                    <li>
                        <div class="image-box brand-card">
                            <a href="#">
                                <img src="{{url('/')}}/uploads/brands/{{$brands->image}}" alt="{{$brands->title}}">
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

		</div>
	</section>
