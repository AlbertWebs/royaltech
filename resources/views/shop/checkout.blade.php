@extends('shop.master-checkout')

@section('content')
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Checkout</a></li>

    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h2 class="title">Checkout</h2>
          <div class="so-onepagecheckout ">
            <div class="col-left col-sm-3">
            <form action="{{url('/')}}/checkout/make-payment" id="updateUser">
              @csrf
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-user"></i> Your Personal Details</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="account">
                          <div class="form-group required">
                            <label for="input-payment-firstname" class="control-label">Full Name</label>
                            <input type="text" class="form-control" id="input-payment-firstname" placeholder="Full Name" value="{{Auth::User()->name}}" name="name">
                          </div>

                          <div class="form-group required">
                            <label for="input-payment-email" class="control-label">E-Mail</label>
                            <input type="text" class="form-control" id="input-payment-email" placeholder="E-Mail" value="{{Auth::User()->email}}" name="email">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-telephone" class="control-label">Mobile</label>
                            <input type="text" class="form-control" id="input-payment-telephone" placeholder="Telephone" value="{{Auth::User()->mobile}}" name="mobile">
                          </div>

                        </fieldset>
                      </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"><i class="fa fa-book"></i> Your Address</h4>
                </div>
                  <div class="panel-body">
                        <fieldset id="address" class="required">
                          <div class="form-group">
                            <label for="input-payment-company" class="control-label">Company</label>
                            <input type="text" class="form-control" id="input-payment-company" placeholder="Company" value="{{Auth::User()->company}}" name="company">
                          </div>
                          <div class="form-group required">
                            <label for="input-payment-address-1" class="control-label">Address 1</label>
                            <input type="text" class="form-control" id="input-payment-address-1" placeholder="Address 1" value="{{Auth::User()->address}}" name="address">
                          </div>

                          <div class="form-group required">
                            <label for="input-payment-city" class="control-label">Country</label>
                            <input type="text" class="form-control" id="input-payment-city" placeholder="City" value="{{Auth::User()->country}}" name="country">
                          </div>

                          <div class="checkbox">
                            <label>
                              <input type="checkbox" checked="checked" value="1" name="shipping_address">
                              My delivery and billing addresses are the same.</label>
                          </div>
                        </fieldset>

                      </div>
              </div>


            </div>
            <div class="col-right col-sm-9">
              <div class="row">
                <div class="col-sm-12">




                    </div>





                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> Shopping cart</h4>
                    </div>
                      <div class="panel-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right">Total</td>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartitems)
                                <?php $Product = DB::table('products')->where('id',$cartitems->id)->get(); ?>
                                @foreach ($Product as $item)
                                    <tr>
                                    <td class="text-center"><a target="new" href="{{url('/')}}/e-commerce/product/{{$item->slung}}"><img width="70px" src="{{url('/')}}/uploads/products/{{ $cartitems->attributes->image }}" alt="Aspire Ultrabook Laptop" title="Aspire Ultrabook Laptop" class="img-thumbnail" /></a></td>
                                    <td class="text-left"><a target="new" href="{{url('/')}}/e-commerce/product/{{$item->slung}}">{{$cartitems->name}}</a><br />
                                    </td>
                                    {{-- <td class="text-left">Pt 001</td> --}}
                                    <td class="text-left" width="200px"><div class="input-group btn-block quantity">
                                        <input type="text" name="quantity" value="{{$cartitems->quantity}}" size="1" class="form-control" />
                                        <span class="input-group-btn">
                                        <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary"><i class="fa fa-clone"></i></button>
                                        <a onclick="return confirm('Delete {{$item->name}} From Cart?')" href="{{ url('e-commerce/shopping-cart') }}/remove/{{$cartitems->id}}" data-toggle="tooltip" title="Remove" class="btn btn-danger" onClick=""><i class="fa fa-times-circle"></i></a>
                                        </span></div></td>
                                    <td class="text-right">KES {{$cartitems->price}}</td>
                                    <td class="text-right">KES <?php $prices = $cartitems->price; $qty = $cartitems->quantity; echo $total = $qty*$prices ?></td>
                                    </tr>
                                @endforeach
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <td class="text-right" colspan="3"><strong>Sub-Total:</strong></td>
                                <?php $Shipping = 700; $totalShipping = $Shipping*$cartitems->quantity; $Total = \Cart::getTotal(); ?>
                                <td class="text-right" colspan="2">KES {{$Total}}</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="3"><strong>Flat Shipping Rate:</strong></td>
                                <td class="text-right" colspan="2">KES {{$Shipping}}</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="3">
                                    <strong>Total Shipping:</strong>
                                </td>
                                <td class="text-right" colspan="2">KES {{$totalShipping}}</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="3">
                                    <strong>Discount (0.00):</strong>
                                </td>
                                <td class="text-right" colspan="2">0.00</td>
                              </tr>
                              <tr>
                                <td class="text-right" colspan="3">
                                    <strong>VAT (0%):</strong>
                                </td>
                                <td class="text-right" colspan="2">0</td>
                            </tr>
                            <tr>
                                <td class="text-right" colspan="3">
                                    <strong>Total:</strong>
                                </td>
                                <td class="text-right" colspan="2">KES {{$totalShipping+$Total}}</td>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-pencil"></i> Add Comments About Your Order</h4>
                    </div>
                      <div class="panel-body">
                        <textarea rows="4" class="form-control" id="confirm_comment" name="notes" required></textarea>
                        <br>
                        <label class="control-label" for="confirm_agree">
                          <input type="checkbox" checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm agree">
                          <span>I have read and agree to the <a class="agree" href="{{url('/')}}/terms-and-conditions"><b>Terms &amp; Conditions</b></a></span> </label>
                        {{-- <div class="buttons">
                          <div class="pull-right">
                            <input type="button" class="btn btn-primary" id="button-confirm" value="Confirm Order">
                          </div>
                        </div> --}}
                        {{--  --}}
                        <div class="buttons">
                            <div class="pull-right">
                              <button type="submit" class="btn btn-primary" id="button-confirm" value="">Confirm Order <img class="loading" width="30" src="{{url('/')}}/uploads/icon/loading.gif" alt="royaltech loading"/></button>
                            </div>
                          </div>
                        {{--  --}}
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
    </form>

    </div>
</div>
<!-- //Main Container -->
@endsection
