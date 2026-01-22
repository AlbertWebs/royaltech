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
                <center>
                    @if(Session::has('message'))
                                  <div class="alert alert-success">{{ Session::get('message') }}</div>
                   @endif
                </center>
                <ul>
                    <li><a href="{{url('/')}}/admin/home/home"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active-bre"><a href="#"> Dashboard</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/SiteSettings"><i class="fa fa-forward" aria-hidden="true"></i>Go To Site Settings</a>
                    </li>
                </ul>
            </div>
            <!--== DASHBOARD INFO ==-->
            @include('admin.dashboard')
            <!--== DASHBOARD INFO ==-->
            <div class="sb2-2-3">
                <div class="row">

                    <!--== Country Campaigns ==-->
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4> Activity Logs</h4>
                                <p>Registers All important activities by all users</p>
                                <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown2'><i class="material-icons">more_vert</i></a>
                                 <!-- Dropdown Structure -->
                                 <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="{{url('/')}}/admin/activitylogs">All Activity</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-inn">
                                <div class="table-responsive table-desi">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Descriptions</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ActivityLog as $item)
                                            <tr>
                                                <td><span class="txt-dark weight-500">{{$item->id}}</span>
                                                </td>
                                                <td>
                                                    <?php
                                                       $UserName = DB::table('users')->where('id',$item->causer_id)->get();

                                                    ?> @foreach($UserName as $TheName) {{$TheName->name}} @endforeach
                                                </td>
                                                <td><span class="txt-success"><i class="fa fa-check" aria-hidden="true"></i>{{$item->description}}</span>
                                                </td>
                                                <td>
                                                    <span style="font-weight: 600;" class="txt-dark weight-500">{{$item->created_at}}</span>
                                                </td>

                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4> Notifications </h4>
                                <p>All Site notifications</p>
                                <a class='dropdown-button drop-down-meta' href='#' data-activates='dropdown1'><i class="material-icons">more_vert</i></a>
                                <!-- Dropdown Structure -->
                                <ul id='dropdown1' class='dropdown-content'>
                                    <li><a href="#!">Add New</a>
                                    </li>
                                    <li><a href="#!">Edit</a>
                                    </li>
                                    <li><a href="#!">Update</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#!"><i class="material-icons">delete</i>Delete</a>
                                    </li>
                                    <li><a href="#!"><i class="material-icons">subject</i>View All</a>
                                    </li>
                                    <li><a href="#!"><i class="material-icons">play_for_work</i>Download</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-inn">
                                <div class="table-responsive table-desi">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Country</th>
                                                <th>Client</th>
                                                <th>Changes</th>
                                                <th>Budget</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="txt-dark weight-500">Australia</span>
                                                </td>
                                                <td>Beavis</td>
                                                <td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>2.43%</span></span>
                                                </td>
                                                <td>
                                                    <span class="txt-dark weight-500">$1478</span>
                                                </td>
                                                <td>
                                                    <span class="label label-success">Active</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="txt-dark weight-500">Cuba</span>
                                                </td>
                                                <td>Felix</td>
                                                <td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>1.43%</span></span>
                                                </td>
                                                <td>
                                                    <span class="txt-dark weight-500">$951</span>
                                                </td>
                                                <td>
                                                    <span class="label label-danger">Closed</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="txt-dark weight-500">France</span>
                                                </td>
                                                <td>Cannibus</td>
                                                <td><span class="txt-danger"><i class="fa fa-angle-up" aria-hidden="true"></i><span>-8.43%</span></span>
                                                </td>
                                                <td>
                                                    <span class="txt-dark weight-500">$632</span>
                                                </td>
                                                <td>
                                                    <span class="label label-default">Hold</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="txt-dark weight-500">Norway</span>
                                                </td>
                                                <td>Neosoft</td>
                                                <td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>7.43%</span></span>
                                                </td>
                                                <td>
                                                    <span class="txt-dark weight-500">$325</span>
                                                </td>
                                                <td>
                                                    <span class="label label-default">Hold</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span class="txt-dark weight-500">South Africa</span>
                                                </td>
                                                <td>Hencework</td>
                                                <td><span class="txt-success"><i class="fa fa-angle-up" aria-hidden="true"></i><span>9.43%</span></span>
                                                </td>
                                                <td>
                                                    <span>$258</span>
                                                </td>
                                                <td>
                                                    <span class="label label-success">Active</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sb2-2-3">
                <!--== User Details ==-->
                <?php  $Users = DB::table('users')->get() ?>
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
                                                <td><a href="{{url('/')}}/editUser/{{$item->id}}"><span class="list-enq-name">{{$item->name}}</span><span class="list-enq-city">@if($item->is_admin == 1) Administrator @else Normal User @endif</span></a>
                                                </td>
                                                <td>{{$item->mobile}}<br>{{$item->email}}<br>{{$item->address}}<br>{{$item->country}}</td>

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


                                                <td><a onclick="archiveFunction{{$item->id}}()" href="#" class="sb2-2-1-edit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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



            <!--== Latest Activity ==-->
            <div class="sb2-2-3">
                <div class="row">
                    <!--== Latest Activity ==-->
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Latest Messages</h4>
                                <p>Latest Messages & Enquiries Goes Here</p>
                            </div>
                            <div class="tab-inn list-act-hom">
                                <ul>
                                    @foreach ($Message as $item)
                                    <li class="list-act-hom-con">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <?php
                                            $RawDate = $item->created_at;
                                            $FormatDate = strtotime($RawDate);
                                            $Month = date('M',$FormatDate);
                                            $Date = date('D',$FormatDate);
                                            $date = date('d',$FormatDate);
                                            $Year = date('Y',$FormatDate);
                                        ?>
                                        <h4><span>{{$Date}}, {{$date}} {{$Month}}, {{$Year}}</span> {{$item->subject}}</h4>
                                        <p>{{$item->content}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--== User Details ==-->
            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>Our Location On Google Map</h4>
                            </div>
                            @foreach ($SiteSettings as $Set)
                            <div class="tab-inn">
                                <div class="table-responsive table-desi tab-map">
                                    <iframe src="{{$Set->map}}"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
