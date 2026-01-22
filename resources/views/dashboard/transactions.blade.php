@extends('shop.master')

@section('content')
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}/"><i class="fa fa-home"></i></a></li>

			<li><a href="{{url('/')}}/dashboard">My Account</a></li>
            <li><a href="#">{{Auth::User()->name}}</a></li>
            <li><a href="#">Transactions</a></li>
		</ul>

		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
                <h2 class="title">Transactions</h2>
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td class="text-center">Tranaction ID</td>
                                <td class="text-center">Amount</td>
								<td class="text-left">Order Number</td>
								<td class="text-center">Transaction Date</td>
								<td class="text-center">Status</td>
								<td class="text-center">Tracking ID</td>
								<td class="text-right">View Order</td>

							</tr>
						</thead>

						<tbody>
                            @foreach ($Transactions as $item)
                            <tr>
                                <td class="text-center">{{$item->transactionid}}</td>
								<td class="text-center">{{$item->currency}} {{$item->amount}}</td>
								<td class="text-center">#{{$item->order_id}}</td>
								<td class="text-center">{{$item->created_at}}</td>
                                @if($item->status == "New")
                                <td class="text-info text-center">New</td>
                                @elseif($item->status == "PENDING")
                                <td class="text-warning text-center">Pending</td>
                                @else
                                <td class="text-success text-center">Confirmed</td>
                                @endif

								<td class="text-center">{{$item->trackingid}}</td>

								<td class="text-center"><a class="btn btn-info" title="" data-toggle="tooltip" href="{{url('/')}}/dashboard/order-history/{{$item->order_id}}" data-original-title="View"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
                            @endforeach

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
