@extends('shop.master')

@section('content')
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}/"><i class="fa fa-home"></i></a></li>

			<li><a href="{{url('/')}}/dashboard">My Account</a></li>
            <li><a href="#">{{Auth::User()->name}}</a></li>
            <li><a href="#">Order History</a></li>
		</ul>

		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
                <h2 class="title">Order History</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Image</td>
								<td class="text-left">Product Name</td>
								<td class="text-center">Order ID</td>
								<td class="text-center">Qty</td>
								<td class="text-center">Status</td>
								<td class="text-center">Date Added</td>
								<td class="text-right">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">
									<a href="{{url('/')}}/e-commerce/product/slung"><img width="85" class="img-thumbnail" title="Aspire Ultrabook Laptop" alt="Aspire Ultrabook Laptop" src="{{asset('commerce/image/demo/shop/product/E3.jpg')}}">
									</a>
								</td>
								<td class="text-left"><a href="{{url('/')}}/e-commerce/product/slung">Aspire Ultrabook Laptop</a>
								</td>
								<td class="text-center">#214521</td>
								<td class="text-center">1</td>
								<td class="text-center">Shipped</td>
								<td class="text-center">21/06/2016</td>
								<td class="text-right">kes 30000</td>
								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="{{url('/')}}/dashboard/order-history/order-number" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							<tr>
								<td class="text-center">
									<a href="{{url('/')}}/e-commerce/product/slung"><img  width="85" class="img-thumbnail" title="Xitefun Causal Wear Fancy Shoes" alt="Xitefun Causal Wear Fancy Shoes" src="{{asset('commerce/image/demo/shop/product/E4.jpg')}}">
									</a>
								</td>
								<td class="text-left"><a href="{{url('/')}}/e-commerce/product/slung">Aspire Ultrabook Laptop</a>
								</td>
								<td class="text-center">#1565245</td>
								<td class="text-center">1</td>
								<td class="text-center">Shipped</td>
								<td class="text-center">20/06/2016</td>
								<td class="text-right">kes 25600</td>
								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="{{url('/')}}/dashboard/order-history/order-number" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!--Middle Part End-->
			<!--Right Part Start -->
			<aside class="col-sm-3 hidden-xs" id="column-right">
				@include('dashboard.aside')
			</aside>
			<!--Right Part End -->
		</div>
	</div>
	<!-- //Main Container -->
@endsection
