@extends('admin.master')
@section('content')
<!--== BODY CONTNAINER ==-->
 <div class="container-fluid sb2">
    <div class="row">
        @include('admin.sidebar')

        <!--== BODY INNER CONTAINER ==-->
        @foreach ($SiteSettings as $Setting)
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active"><a href="#"> Social Media</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/home"><i class="fa fa-backward" aria-hidden="true"></i> Dashboard </a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <div class="inn-title">
                    <h4>Social Media Settings</h4>
                    <p>Your Social Media Settings</p>
                </div>
                <div class="bor">
                    <form id="saveSettings" method="PUT">
                        <div class="form-group">
                            <label for="email1">Facebook:</label>
                            <input type="text" name="facebook" value="{{$Setting->facebook}}" class="form-control" id="email1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email2">Twitter:</label>
                            <input type="text" name="twitter" value="{{$Setting->twitter}}" class="form-control" id="email2" placeholder="">
                        </div>
                   
                        <div class="form-group">
                            <label for="email3">Instagram:</label>
                            <input type="text" name="instagram" value="{{$Setting->instagram}}" class="form-control" id="email3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email4">Linked In:</label>
                            <input type="text" name="linkedin" value="{{$Setting->linkedin}}" class="form-control" id="email4" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email3">Telegram:</label>
                            <input type="text" name="telegram" value="{{$Setting->telegram}}" class="form-control" id="email3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="email5">Whats App:</label>
                            <input type="text" name="whatsapp" value="{{$Setting->whatsapp}}" class="form-control" id="email5" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-default">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!--== BODY INNER CONTAINER ==-->

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
                        url: "{{url('/')}}/admin/updateSiteSocialMediaAjax",
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