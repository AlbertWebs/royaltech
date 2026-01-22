@extends('shop.master')

@section('content')
	<!-- Main Container  -->
	<div class="main-container container">
		<ul class="breadcrumb">
			<li><a href="{{url('/')}}/"><i class="fa fa-home"></i></a></li>
			<li><a href="#">Account</a></li>
			<li><a href="{{url('/')}}/dashboard">My Account</a></li>
            <li><a href="#">{{Auth::User()->name}}</a></li>
		</ul>

		<div class="row">
			<!--Middle Part Start-->
			<div class="col-sm-9" id="content">
				<h2 class="title">My Account</h2>
				<p class="lead">Hello, <strong>{{Auth::User()->name}}</strong> - To update your account information.</p>
				<form>
					<div class="row">
						<div class="col-sm-6">
							<fieldset id="personal-details">
								<legend>Personal Details</legend>
								<div class="form-group required">
									<label for="input-firstname" class="control-label">Full Name</label>
									<input type="text" class="form-control" id="input-firstname" placeholder="Full Name" value="{{Auth::User()->name}}" name="firstname">
								</div>

								<div class="form-group required">
									<label for="input-email" class="control-label">E-Mail</label>
									<input type="email" class="form-control" id="input-email" placeholder="E-Mail" value="{{Auth::User()->email}}" name="email">
								</div>
								<div class="form-group required">
									<label for="input-telephone" class="control-label">Mobile</label>
									<input type="tel" class="form-control" id="input-telephone" placeholder="Telephone" value="{{Auth::User()->mobile}}" name="telephone">
								</div>

							</fieldset>
							<br>
						</div>
						<div class="col-sm-6">
							<div class="col-sm-12">
                                <fieldset id="address">
                                    <legend>Payment Address</legend>
                                    <div class="form-group">
                                        <label for="input-company" class="control-label">Country</label>

                                        <input type="text" class="form-control" id="input-company" placeholder="Company" value="{{Auth::User()->country}}" name="company">

                                    </div>
                                    <div class="form-group required">
                                        <label for="input-address-1" class="control-label">Address </label>
                                        <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="{{Auth::User()->address}}" name="address">
                                    </div>

                                </fieldset>
                            </div>
						</div>
					</div>




					<div class="buttons clearfix">
						<div class="pull-right">
							<input type="submit" class="btn btn-md btn-primary" value="Save Changes">
						</div>
					</div>
				</form>
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
