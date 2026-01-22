@extends('shop.master-checkout')

@section('content')
<!-- Main Container  -->
<div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Make Payments</a></li>

    </ul>

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">

          <div class="so-onepagecheckout ">

            <div class="col-right col-sm-12">
              <div class="row">
                <div class="col-sm-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title"><i class="fa fa-money"></i> Make Payment</h4>
                    </div>
                      <div class="panel-body">
                        {!!html_entity_decode($iframe)!!}
                      </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!--Middle Part End -->

    </div>
</div>
<!-- //Main Container -->
@endsection
