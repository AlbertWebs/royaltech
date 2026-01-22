@extends('shop.master')

@section('content')
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}/"><i class="fa fa-home"></i></a></li>

			<li><a href="{{url('/')}}/dashboard">My Account</a></li>
            <li><a href="#">{{Auth::User()->name}}</a></li>
            <li><a href="#">Order History</a></li>
            <li><a href="#">Order ID #214521</a></li>
		</ul>
        @foreach($OrderPro as $OrderPros)
		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
                <h2 class="title">Order Information</h2>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td colspan="2" class="text-left">Order Details</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{$OrderPros->orders_id}}
								<br>
								<b>Date Added:</b> {!! date('d/m/Y', strtotime($OrderPros->created_at)) !!}</td>
							<td style="width: 50%;" class="text-left"> <b>Payment Method:</b> Pesapal
								<br>
								<b>Shipping Method:</b> Flat Shipping Rate </td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td style="width: 50%; vertical-align: top;" class="text-left">Payment Address</td>
							<td style="width: 50%; vertical-align: top;" class="text-left">Shipping Address</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-left">{{Auth::User()->name}}
								<br>{{Auth::User()->address}}
								<br>{{Auth::User()->mobile}}
								<br>{{Auth::User()->country}}
								<br></td>
							<td class="text-left">{{Auth::User()->name}}
								<br>{{Auth::User()->address}}
								<br>{{Auth::User()->mobile}}
								<br>{{Auth::User()->country}}
								<br></td>
						</tr>
					</tbody>
				</table>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-left">Product Name</td>
								{{-- <td class="text-left">Model</td> --}}
								<td class="text-right">Quantity</td>
								<td class="text-right">Price</td>
								<td class="text-right">Total</td>
								<td style="width: 20px;"></td>
							</tr>
						</thead>
						<tbody>
                            <?php $Product = DB::table('products')->where('id', $OrderPros->id)->get(); ?>
                            @foreach ($Product as $item)
                            <tr>
								<td class="text-left">{{$item->name}} </td>
								{{-- <td class="text-left">product 11</td> --}}
								<td class="text-right">{{$OrderPros->qty}}</td>
								<td class="text-right">kes {{$item->price}}</td>
								<td class="text-right">kes {{$item->price+700}}</td>
								<td style="white-space: nowrap;" class="text-right">
                                    {{-- <a class="btn btn-primary addToCart add-to-cart" title="" data-toggle="tooltip" data-url="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}" href="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}"  data-original-title="Reorder"><i class="fa fa-shopping-cart"></i></a> --}}
                                    <a title="Reorder" href="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}" data-url="{{url('/')}}/e-commerce/shopping-cart/add-to-cart/{{$item->id}}" class="btn btn-primary addToCart add-to-cart" type="button" data-toggle="tooltip" title="Add to Cart" onclick="cart.add('{{$item->id}}', '1');"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"></span></a>
									<a class="btn btn-danger" title="" data-toggle="tooltip" href="return.html" data-original-title="Return"><i class="fa fa-reply"></i></a>
								</td>
							</tr>
                            @endforeach


						</tbody>
						<tfoot>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b>Sub-Total</b>
								</td>
								<td class="text-right">kes {{$item->price}}</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b>Flat Shipping Rate</b>
								</td>
								<td class="text-right">kes 700</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b>Eco Tax (0.00)</b>
								</td>
								<td class="text-right">kes 0.00</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b>VAT (0%)</b>
								</td>
								<td class="text-right">kes 0.00</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td class="text-right"><b>Total</b>
								</td>
								<td class="text-right">kes  {{$item->price+700}}</td>
								<td></td>
							</tr>
						</tfoot>
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
        @endforeach
	</div>
	<!-- //Main Container -->
@endsection
