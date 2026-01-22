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
                    <li class="active-bre"><a href="#">APIs Settings</a>
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
                                <h4>APIs Settings</h4>
                                <p>Systems APIs Credentials Settings</p>
                            </div>
                            <div class="tab-inn">
                                <form method="PUT" id="saveSettings" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="url" name="url" value="" class="validate">
                                            <label for="website">Paypal API KEY</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" type="text" value="" name="sitename" class="validate">
                                            <label>Paypal API SECRET</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="" id="email" name="email_one" type="text"  class="validate">
                                            <label for="email">M-PESA Initiator</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" value="" id="email1" name="text" type="email" class="validate">
                                            <label for="email1">M-PESA SECRET KEY</label>
                                        </div>
                                    </div>

                                    
                                   
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="phone" type="text" name="mobile_one" class="validate">
                                            <label for="phone">M-PESA Call Back URL (B2C)</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input autocomplete="off" id="cphone" type="text"  name="mobile_two" class="validate">
                                            <label for="cphone">M-PESA Call Back URL (B2B)</label>
                                        </div>
                                    </div>
                                 
                    
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input autocomplete="off" value="{{$Setting->mpesa}}" id="email" name="mpesa" type="text"  class="validate">
                                            <label for="email">M_PESA TILL/PAYBILL</label>
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