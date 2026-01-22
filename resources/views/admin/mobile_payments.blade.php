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
                    <li class="active-bre"><a href="#"> Customer to Business Payments</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/accountbalance"> Account Balance</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/b2b"> B2B</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/b2c"> B2C</a>
                    </li>
                
                    <li class="page-back"><a href="{{url('/')}}/admin/reverse_transaction">Reversed Transactions </a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/transaction_status">Transcation Status </a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-1">
                <h2>All C2B Payments</h2>
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
                            <th>IDs#</th>
                            <th>Details</th>
                            
                            <th>Durations</th>
                            <th>Approve/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        @foreach ($C2B as $item)
                        <tr>
                            <td>
                                transLoID: {{$item->transLoID}}<br>
                                TransactionType: {{$item->TransactionType}}<br>
                                TransID : {{$item->TransID}}<br>
                                BillRefNumber : {{$item->BillRefNumber}}<br>
                                InvoiceNumber : {{$item->InvoiceNumber}}<br>
                                ThirdPartyTransID : {{$item->ThirdPartyTransID}}<br>
       
                                MSISDN : {{$item->MSISDN}}<br>
                                FirstName : {{$item->FirstName}}<br>
                                MiddleName : {{$item->MiddleName}}<br>
                                LastName : {{$item->LastName}}<br>
                                
                            </td>
                            <td>
                              
                                    Amount: {{$item->TransAmount}}<br>
                                    BusinessShortCode: {{$item->BusinessShortCode}}<br>
                                    OrgAccountBalance : {{$item->OrgAccountBalance}}<br>
                               
                                 
                            </td>
                            <td>
                                TransTime: {{$item->TransTime}}
                                lastUpdate: {{$item->lastUpdate}}
                            </td>
                           
                          
                            <td>
                                @if($item->status == 1)
                                <a onclick="return confirm('Are you sure you want to un-approve this transaction')" title="Approve This Transaction" href="{{url('/')}}/admin/approve-transaction/{{$item->transLoID}}" class="sb2-2-1-edit"><i class="fa fa-close" aria-hidden="true"></i></a>
                                @else 
                                <a onclick="return confirm('Are you sure you want to approve this transaction')" title="Approve This Transaction" href="{{url('/')}}/admin/approve-transaction/{{$item->transLoID}}" class="sb2-2-1-edit"><i class="fa fa-check" aria-hidden="true"></i></a>
                                @endif
                                <br><br>
                                <a onclick="archiveFunction{{$item->transLoID}}()" href="#" class="sb2-2-1-edit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <script>
                            function archiveFunction{{$item->transLoID}}()
                                {
                                    event.preventDefault(); // prevent form submit
                                    swal({
                                        title: "Are you sure you want to delete this record?",
                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                        if (willDelete) {
                                            //do the ajax stuff.
                                            $.ajax({
                                                url: "{{url('/')}}/admin/deleteC2BAjax",
                                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                type: "POST",
                                                data: {id: {{$item->transLoID}}},
                                                dataType: "html",
                                                success: function () 
                                                {
                                                    swal("Done!","It was succesfully deleted!","success");
                                                    setTimeout(function() {
                                                        window.location.reload();
                                                    }, 3000);

                                                }
                                            });
                                            // 
                                          
                                        } else {
                                            swal("Your imaginary file is safe!");
                                        }
                                    });
                                }
                        </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>


@endsection