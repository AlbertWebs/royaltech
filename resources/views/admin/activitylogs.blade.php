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