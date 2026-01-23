@extends('admin.master')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <li class="active-bre"><a href="#">{{$User->name}}</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/home"><i class="fa fa-backward" aria-hidden="true"></i> Dashboard </a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-inn-sp">
                            <div class="inn-title">
                                <h4>{{$User->name}}</h4>
                            </div>
                            <div class="tab-inn">
                                <form method="PUT" id="saveSettings" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                  
                        
                                 
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$User->email}}" id="email" name="email_one" type="email"  class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$User->mobile}}" id="email1" name="email" type="text" class="validate">
                                            <label for="email1">Moble</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{$User->id}}">

                                    <div class="row">
                                        {{--  --}}
                                        <div class="input-field col s12">
                                            <select required name="course_id" class="icons" id="mydiv">
                                                
                                                <?php $Course = DB::table('courses')->get(); ?>
                                                @foreach ($Course as $Categories)
                                                <option value="{{$Categories->id}}" data-icon="{{url('/')}}/uploads/courses/{{$Categories->image}}" class="circle">{{$Categories->title}}</option>
                                                @endforeach
                                            </select>
                                            <label>Choose Enrolled Course</label>
                                        </div>
                                    </div>
        

                              
<br><br>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button type="submit"  value="Enroll" class="waves-effect waves-light btn-large">Enroll Now <img class="spinner" width="32" src="{{asset('theme/img/ZZ5H.gif')}}" alt=""></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->
       

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
   $( document ).ready(function() {
     $('.spinner').hide();
   });

    $("#saveSettings").on('submit',function(event)
        {
            event.preventDefault(); // prevent form submit
            $('.spinner').show();
            swal({
                title: "Are you sure you want to Enroll This User",
                text: "You can always revoke the enrollment later",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    //do the ajax stuff.
                    $.ajax({
                        url: "{{url('/')}}/admin/enroll-user-now",
                        type: "POST",
                        dataType: "html",
                        data: $(this).serialize(),
                        success: function () 
                        {
                            $('.spinner').hide();
                            swal("Done!","Your Changes Have Been Updated");
                            setTimeout(function() {
                                window.location.reload();
                            }, 3000);
                        }
                    });
                    // 
                  
                } 
            });
        });
</script>

@endsection