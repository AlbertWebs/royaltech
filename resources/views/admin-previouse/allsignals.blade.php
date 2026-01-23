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
                    <li class="active-bre"><a href="#"> Signals</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/addSignal"><i class="fa fa-pencil" aria-hidden="true"></i> Add Signal</a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-1">
                <h2>All Signals</h2>
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
                            <th>Curency Pair</th>
                            <th>TP/SP</th>
                            <th>Date/Time</th>

                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        @foreach ($Signal as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->currency_pair}}</td>
                            <td>TP:{{$item->tp}}<br>
                                SL:{{$item->sl}}<br>
                            </td>
                            <td>
                                <?php 
                                    $RawDate = $item->datetime;
                                    $FormatDate = strtotime($RawDate);
                                    $Month = date('M',$FormatDate);
                                    $Date = date('D',$FormatDate);
                                    $date = date('d',$FormatDate);
                                    $Year = date('Y',$FormatDate);
                                    $Hour = date('H',$FormatDate);
                                    $Minute = date('i',$FormatDate);
                                    $Second = date('s',$FormatDate);
                                ?>
                                {{$Date}}, {{$date}} {{$Month}}, {{$Year}} | {{$Hour}} {{$Minute}} {{$Second}}
                            </td>
                            <td>{{$item->comments}}</td>
                            

                            <td><a href="{{url('/')}}/admin/editSignal/{{$item->id}}" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </td>
                            <td><a onclick="archiveFunction{{$item->id}}()" href="#" class="sb2-2-1-edit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <script>
                            function archiveFunction{{$item->id}}()
                                {
                                    event.preventDefault(); // prevent form submit
                                    swal({
                                        title: "Are you sure?",
                                        text: "Once deleted, you will not be able to recover this imaginary file!",
                                        icon: "warning",
                                        buttons: true,
                                        dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                        if (willDelete) {
                                            //do the ajax stuff.
                                            $.ajax({
                                                url: "{{url('/')}}/admin/deleteSignalsAjax",
                                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                                type: "POST",
                                                data: {id: {{$item->id}}},
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