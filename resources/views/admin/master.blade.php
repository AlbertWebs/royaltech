<!DOCTYPE html>
<html lang="en">
<?php $SiteSettings = DB::table('_site_settings')->get(); ?>
@foreach ($SiteSettings as $SiteSettings)
<head>
    <title> {{$SiteSettings->sitename}} - AdminsPanel </title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--== FAV ICON ==-->
    @include('favicon')

    <!-- GOOGLE FONTS -->
    <link href="../../../../fonts.googleapis.com/cssbcc5.css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">

    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="{{asset('admin-theme/css/font-awesome.min.css')}}">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{asset('admin-theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-theme/css/mob.css')}}">
    <link rel="stylesheet" href="{{asset('admin-theme/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin-theme/css/materialize.css')}}" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body>
    <!--== MAIN CONTRAINER ==-->
    <div class="container-fluid sb1">
        <div class="row">
            <!--== LOGO ==-->
            <div class="col-md-2 col-sm-3 col-xs-6 sb1-1">
                <a href="#" class="btn-close-menu"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="#" class="atab-menu"><i class="fa fa-bars tab-menu" aria-hidden="true"></i></a>
                <a href="{{url('/')}}/admin/home" class="logo"><img src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo}}" alt="{{$SiteSettings->sitename}}" />
                </a>
            </div>
            <!--== SEARCH ==-->
            <div class="col-md-6 col-sm-6 mob-hide">
                <form class="app-search">
                    <input type="text" placeholder="Search..." class="form-control">
                    <a href="#"><i class="fa fa-search"></i></a>
                </form>
            </div>
            <!--== NOTIFICATION ==-->
            <div class="col-md-2 tab-hide">
                <div class="top-not-cen">
                     <?php $Message = App\Models\Message::all() ?>
                     <?php $User = App\Models\User::all() ?>
                     <?php $Posts = App\Models\Blog::all() ?>
                    <a title="Blog Post" class='waves-effect btn-noti' href='#'><i class="fa fa-commenting-o" aria-hidden="true"></i><span><?php echo count($Message = DB::table('blogs')->get()) ?></span></a>
                    <a title="Messages" class='waves-effect btn-noti' href='#'><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php echo count($Message = DB::table('messages')->get()) ?></span></a>
                    <a title="Users" class='waves-effect btn-noti' href='#'><i class="fa fa-user" aria-hidden="true"></i><span><?php echo count($Users = DB::table('users')->get()) ?></span></a>
                    <a title="Site Settings" class='waves-effect btn-noti' href='{{url('/')}}/admin/SiteSettings'><i class="fa fa-cog" aria-hidden="true"></i><span>100</span></a>
                </div>
            </div>
            <!--== MY ACCCOUNT ==-->
            <div class="col-md-2 col-sm-3 col-xs-6">
                <!-- Dropdown Trigger -->
                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu'><img src="{{asset('admin-theme/images/user/6.png')}}" alt="" />My Account <i class="fa fa-angle-down" aria-hidden="true"></i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                    <li><a href="{{url('/')}}/admin/SiteSettings" class="waves-effect"><i class="fa fa-cogs" aria-hidden="true"></i>Site Settings</a>
                    </li>
                    <li><a href="{{url('/')}}/admin/users" class="waves-effect"><i class="fa fa-user" aria-hidden="true"></i> Manage Users </a>
                    </li>
                    <li><a href="{{url('/')}}/admin/admins" class="waves-effect"><i class="fa fa-support" aria-hidden="true"></i> Manage Admins </a>
                    </li>
                    <li><a href="{{url('/')}}/admin/addUser" class="waves-effect"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New User</a>
                    </li>
                    <li><a href="{{url('/')}}/create-backup" class="waves-effect"><i class="fa fa-undo" aria-hidden="true"></i> Backup Data</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{url('/')}}/logout" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

   @yield('content')

    <!--== BOTTOM FLOAT ICON ==-->
    <section>
        <div class="fixed-action-btn vertical">
            <a class="btn-floating btn-large red pulse">
                <i class="large material-icons">mode_edit</i>
            </a>
            <ul>
                <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a>
                </li>
                <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a>
                </li>
                <li><a class="btn-floating green"><i class="material-icons">publish</i></a>
                </li>
                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a>
                </li>
            </ul>
        </div>
    </section>

    <!--======== SCRIPT FILES =========-->
    <script src="{{asset('admin-theme/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin-theme/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-theme/js/materialize.min.js')}}"></script>
    <script src="{{asset('admin-theme/js/custom.js')}}"></script>


    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script>CKEDITOR.replace('article-ckeditor');</script>

    {{-- Process Image --}}
    <script>
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {
                
                var input = $(this).parents('.input-group').find(':text'),
                    log = label;
                
                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }
            
            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            }); 	
        });
    </script>
    {{-- Process Image --}}


</body>
@endforeach
</html>