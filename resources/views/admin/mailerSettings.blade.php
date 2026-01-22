@extends('admin.master')
@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--== BODY CONTNAINER ==-->
 <div class="container-fluid sb2">
    <div class="row">
        @include('admin.sidebar')
        @foreach ($SiteSettings as $Setting)
        <!--== BODY INNER CONTAINER ==-->
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active-bre"><a href="#">Email Settings</a>
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
                                <h4>Email Settings</h4>
                                <p>Mailers Defaults For Mailing Operations</p>
                            </div>
                            <div class="tab-inn">
                                <form method="PUT" id="saveSettings" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="text" name="email" value="{{$Setting->email}}" class="validate">
                                            <label for="website">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="text" value="{{$Setting->title}}" name="title" class="validate">
                                            <label>Title</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                      
                                        <div class="input-field col s12">
                                            <input autocomplete="off" type="text" value="{{$Setting->site_title}}" name="site_title"  class="validate">
                                            <label>Site Title</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="phone" value="{{$Setting->driver}}" type="text" name="driver" class="validate">
                                            <label for="phone">Mail Driver</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="cphone" type="text" value="{{$Setting->host}}" name="host" class="validate">
                                            <label for="cphone">Email Host</label>
                                        </div>
                                    </div>
                                 
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->port}}" id="email" name="port" type="text"  class="validate">
                                            <label for="email">Mailer Port Number</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->encryption}}" id="email1" name="encryption" type="text" class="validate">
                                            <label for="email1">Mailer Encryption</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="phone" value="{{$Setting->username}}" type="text" name="username" class="validate">
                                            <label for="phone">Mail Username</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="cphone" type="text" value="{{$Setting->password}}" name="password" class="validate">
                                            <label for="cphone">Mail Password</label>
                                        </div>
                                    </div>

                                  

                                 <br><br>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input type="submit"  value="Save Changes" class="waves-effect waves-light btn-large">
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
        @endforeach

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    $("#saveSettings").on('submit',function(event)
        {
            event.preventDefault(); // prevent form submit
            swal({
                title: "Are you sure you want to make this changes?",
                text: "Once submited You cannot revert back to the previous state",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    //do the ajax stuff.
                    $.ajax({
                        url: "{{url('/')}}/admin/updateMailerAjax",
                        type: "PUT",
                        dataType: "html",
                        data: $(this).serialize(),
                        success: function () 
                        {
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