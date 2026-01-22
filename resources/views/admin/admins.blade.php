@extends('admin.master')
@section('content')
<!--== BODY CONTNAINER ==-->
 <div class="container-fluid sb2">
    <div class="row">
        @include('admin.sidebar')

        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <!--== breadcrumbs ==-->
            <div class="sb2-2-2">
                <ul>
                    <li><a href="{{url('/')}}/admin/home/home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active-bre"><a href="#"> Dashboard</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/home"><i class="fa fa-forward" aria-hidden="true"></i>Dashboard</a>
                    </li>
                </ul>
            </div>
            <!--== DASHBOARD INFO ==-->
            @include('admin.dashboard')
            <!--== DASHBOARD INFO ==-->
         

            <!--== User Details ==-->
            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>System Users</h4>
                                <p>Registered Users</p>
                                <a class="dropdown-button drop-down-meta" href="#" data-activates="dr-users"><i class="material-icons">more_vert</i></a>
                                <ul id="dr-users" class="dropdown-content">
                                    <li><a href="{{url('/')}}/admin/addUser">Add New User</a>
                                    </li>
                                   
                                    <li><a href="#!"><i class="material-icons">play_for_work</i>Download</a>
                                    </li>
                                </ul>
                                <!-- Dropdown Structure -->

                            </div>
                            <div class="tab-inn">
                                <div class="table-responsive table-desi">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Name</th>
                                                <th>Contacts</th>
                                            
                                                <th>Country</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                            @foreach ($Users as $item)
                                            <tr>
                                                <td><span class="list-img"><img src="{{url('/')}}/uploads/users/{{$item->image}}" alt="{{$item->name}}"></span>
                                                </td>
                                                <td><a href="{{url('/')}}/editUser/{{$item->id}}"><span class="list-enq-name">{{$item->name}}</span><span class="list-enq-city">{{$item->address}}</span></a>
                                                </td>
                                                <td>{{$item->mobile}}<br>{{$item->email}}</td>
                                                
                                                <td>{{$item->country}}</td>
                                                @if($item->status == 1)
                                                <td>
                                                    <span class="label label-success">Active</span>
                                                    <br><hr>

                                                    <a title="Switch To Inactive" href="{{url('/')}}/admin/switchStatus/{{$item->id}}" class="sb2-2-1-edit text-center"><i class="fa fa-exchange" aria-hidden="true"></i><span>Switch To Inactive</span></a>
                                                
                                                </td>
                                                @else
                                                <td>
                                                    <span class="label label-danger">Inactive</span><br><hr>

                                                    <a title="Switch To Active" href="{{url('/')}}/admin/switchStatus/{{$item->id}}" class="sb2-2-1-edit text-center"><i class="fa fa-exchange" aria-hidden="true"></i><span>Switch To Active</span></a>
                                                
                                                </td>
                                                @endif
                                              
                                             
                                                <td>                                            <a href="{{url('/')}}/admin/editUser/{{$item->id}}" class="sb2-2-1-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                                    <a onclick="archiveFunction{{$item->id}}()" href="#" class="sb2-2-1-edit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                            <script>
                                                function archiveFunction{{$item->id}}()
                                                    {
                                                        event.preventDefault(); // prevent form submit
                                                        swal({
                                                            title: "Are you sure you want to delete this user?",
                                                            text: "Once deleted, you will not be able to recover this data!",
                                                            icon: "warning",
                                                            buttons: true,
                                                            dangerMode: true,
                                                            })
                                                            .then((willDelete) => {
                                                            if (willDelete) {
                                                                //do the ajax stuff.
                                                                $.ajax({
                                                                    url: "{{url('/')}}/admin/deleteUserAjax",
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
                        </div>
                    </div>
                </div>
            </div>
  
        </div>

    </div>
</div>

@endsection