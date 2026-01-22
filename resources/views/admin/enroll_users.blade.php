@extends('admin.master')
@section('content')
<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
    .modal a.close-modal{
        top:0px !important;
        right:0px !important;
    }
</style>
<!--== BODY CONTNAINER ==-->
 <div class="container-fluid sb2">
    <div class="row">
        @include('admin.sidebar')

        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active-bre"><a href="#"> Enroll Users</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/users"><i class="fa fa-pencil" aria-hidden="true"></i> All Users</a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-1">
                <h2>Enroll Users</h2>
                <hr>
                <center>
                    @if(Session::has('message'))
                                  <div class="alert alert-success">{{ Session::get('message') }}</div>
                   @endif
   
                   @if(Session::has('messageError'))
                                  <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                   @endif
                </center>
               
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Info</th>
                            <th>Payment Info</th>
                           
                            <th>Action</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                        @foreach ($Users as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}<br>{{$item->email}}</td>
                           
                            <td>
                                <?php 
                                    $MobilePayments = DB::table('mobile_payments')->where('user_id',$item->id)->get();
                                    $StK = DB::table('lnmo_api_response')->where('user_id',$item->id)->get();
                                ?>
                                @foreach ($MobilePayments as $MobilePayments)
                                    <?php 
                                        $RawDate = $MobilePayments->created_at;
                                        $FormatDate = strtotime($RawDate);
                                        $Month = date('M',$FormatDate);
                                        $Date = date('D',$FormatDate);
                                        $date = date('d',$FormatDate);
                                        $Year = date('Y',$FormatDate);
                                        $Hour = date('H',$FormatDate);
                                        $Minute = date('i',$FormatDate);
                                        $Second = date('s',$FormatDate);
                                    ?>
                                    TransactionType : M-PESA PayBill<br>
                                    TransID: {{$MobilePayments->TransID}}<br>
                                    Trans Amount: {{$MobilePayments->TransAmount}}<br>
                                    Trans Date; {{$Date}}, {{$date}} {{$Month}}, {{$Year}} | {{$Hour}} {{$Minute}} {{$Second}}
                                @endforeach

                                <hr>
                                @foreach ($StK as $stk)
                                    <?php 
                                        $RawDate = $stk->updateTime;
                                        $FormatDate = strtotime($RawDate);
                                        $Month = date('M',$FormatDate);
                                        $Date = date('D',$FormatDate);
                                        $date = date('d',$FormatDate);
                                        $Year = date('Y',$FormatDate);
                                        $Hour = date('H',$FormatDate);
                                        $Minute = date('i',$FormatDate);
                                        $Second = date('s',$FormatDate);
                                    ?>
                                    TransactionType : M-PESA STK<br>
                                    MpesaReceiptNumber: {{$stk->MpesaReceiptNumber}}<br>
                                    Amount: {{$stk->Amount}}<br>
                                    Trans Date; {{$Date}}, {{$date}} {{$Month}}, {{$Year}} | {{$Hour}} {{$Minute}} {{$Second}}
                                @endforeach
                                
                            </td>
                            <td>{{$item->comments}}</td>
                            

                            <td style="display:table !important">
                                <a style="display:table-cell !important; vertical-align:middle !important" title="Enroll User" href="{{url('/')}}/admin/enroll-users-post/{{$item->id}}" class="waves-effect waves-light btn-large waves-input-wrapper"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>


@endsection