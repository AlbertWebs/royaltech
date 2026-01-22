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
                    <li class="active-bre"><a href="#">System Settings</a>
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
                                <h4>System Settings</h4>
                                <p>System Defaults For various Operations</p>
                            </div>
                            <div class="tab-inn">
                                <form method="PUT" id="saveSettings" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="url" name="url" value="{{$Setting->url}}" class="validate">
                                            <label for="website">Website</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="text" value="{{$Setting->sitename}}" name="sitename" class="validate">
                                            <label>Sitename</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                      
                                        <div class="input-field col s12">
                                            <input autocomplete="off" type="text" value="{{$Setting->tagline}}" name="tagline"  class="validate">
                                            <label>Tagline</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="phone" value="{{$Setting->mobile_one}}" type="text" name="mobile_one" class="validate">
                                            <label for="phone">Mobile</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="cphone" type="text" value="{{$Setting->mobile_two}}" name="mobile_two" class="validate">
                                            <label for="cphone">Phone</label>
                                        </div>
                                    </div>
                                 
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->email_one}}" id="email" name="email_one" type="email"  class="validate">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->email}}" id="email1" name="email" type="email" class="validate">
                                            <label for="email1">Alternate Email</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->mpesa}}" id="email" name="mpesa" type="text"  class="validate">
                                            <label for="email">M_PESA TILL/PAYBILL</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->paypal}}" id="email1" name="paypal" type="text" class="validate">
                                            <label for="email1">Alternate Email</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->location}}" id="email" name="location" type="text"  class="validate">
                                            <label for="email">Location</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="{{$Setting->address}}" id="email1" name="address" type="text" class="validate">
                                            <label for="email1">Address</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <div class="box-inn-sp box-second-inn">
                                                <div class="inn-title">
                                                    <h4>Live Chat Status</h4>
                                                </div>
                                                <div class="tab-inn">
                                                    @if($Setting->tawkToStatus == 0)
                                                    <!-- Switch -->
                                                    <div class="switch mar-bot-20">
                                                        <label>
                                                            Off
                                                            <input name="tawkToStatus" type="checkbox">
                                                            <span class="lever"></span> On
                                                        </label>
                                                    </div>
                                                    @else 
                                                    <!-- Switch -->
                                                    <div class="switch mar-bot-20">
                                                        <label>
                                                            Off
                                                            <input name="tawkToStatus" checked type="checkbox">
                                                            <span class="lever"></span> On
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-field col s6">
                                            <div class="box-inn-sp box-second-inn">
                                                <div class="inn-title">
                                                    <h4>WhatsApp Widget Status</h4>
                                                </div>
                                                <div class="tab-inn">
                                                    @if($Setting->whatsAppStatus == 0)
                                                    <!-- Switch -->
                                                    <div class="switch mar-bot-20">
                                                        <label>
                                                            Off
                                                            <input name="whatsAppStatus" type="checkbox">
                                                            <span class="lever"></span> On
                                                        </label>
                                                    </div>
                                                    @else 
                                                    <!-- Switch -->
                                                    <div class="switch mar-bot-20">
                                                        <label>
                                                            Off
                                                            <input name="whatsAppStatus" checked type="checkbox">
                                                            <span class="lever"></span> On
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea required name="tawkTo" class="materialize-textarea" placeholder="content">{{$Setting->tawkTo}}</textarea>
                                             <label for="textarea1">Tawk To Script:</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea required name="map" class="materialize-textarea" placeholder="content">{{$Setting->map}}</textarea>
                                             <label for="textarea1">Our Location On Map:</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea required id="article-ckeditor" name="welcome" class="materialilze-textarea" placeholder="content">{{$Setting->welcome}}</textarea>
                                        </div>
                                    </div><br><br>

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
                        url: "{{url('/')}}/admin/updateSiteSettingsAjax",
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