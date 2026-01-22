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
                    <li class="active-bre"><a href="#"> Front End Banners </a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/addSlider"><i class="fa fa-pencil" aria-hidden="true"></i> Add Slider </a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-1">
                <h2>All Sliders</h2>
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
                            
                            <th>Content</th>
                            <th>Thumbail</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <tbody>
                        @foreach ($Slider as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                Text1 - {!! html_entity_decode($item->text1, ENT_QUOTES, 'UTF-8') !!}<br>
                                Text2 - {!! html_entity_decode($item->text2, ENT_QUOTES, 'UTF-8') !!}<br>
                                Text3-  {!! html_entity_decode($item->text3, ENT_QUOTES, 'UTF-8') !!}<br>
                                Text4 - {!! html_entity_decode($item->text4, ENT_QUOTES, 'UTF-8') !!}<br>
                                Text5 - {!! html_entity_decode($item->text5, ENT_QUOTES, 'UTF-8') !!}<br>
                            </td>
                            
                            <td><img style="width:200px" src="{{url('/')}}/uploads/slider/{{$item->thumbnail}}" alt=""></td>           
                            <td><img style="width:200px" src="{{url('/')}}/uploads/slider/{{$item->image}}" alt=""></td>
                            <td><a href="{{url('/')}}/admin/editSlider/{{$item->id}}" class="sb2-2-1-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
                                                url: "{{url('/')}}/admin/deleteSliderAjax",
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