@extends('admin.master')
@section('content')
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
                    <li class="active"><a href="#"> Social Media</a>
                    </li>
                </ul>
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <div class="inn-title">
                    <h4>Logo & Favicon</h4>
                    <p>Your Site Settings(Identity Media)</p>
                </div>
                @foreach ($SiteSettings as $SiteSettings)
                <div class="bor">
                    <form method="POST" action="{{url('/')}}/admin/logo-and-favicon-update" enctype="multipart/form-data">
                        {{csrf_field()}}
                       
                        <hr>
                            {{-- Images --}}
                                 {{-- Preview --}}
                            {{-- Style --}}
                            <style>
                                .btn-file {
                                    position: relative;
                                    overflow: hidden;
                                }
                                .btn-file input[type=file] {
                                    position: absolute;
                                    top: 0;
                                    right: 0;
                                    min-width: 33.33%;
                                    min-height: 100%;
                                    font-size: 100px;
                                    text-align: right;
                                    filter: alpha(opacity=0);
                                    opacity: 0;
                                    outline: none;
                                    background: white;
                                    cursor: inherit;
                                    display: block;
                                }

                                #img-upload{
                                    width: 33.33%;
                                }
                            </style>
                            {{-- Style --}}
                            <div class="row">
                                <div class="">
                                    <div class="input-field col s6 col-lg-6" style="min-height:200px">
                                        <div class="form-group">
                                            <label>Logo One  Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Logo 1: Browse… <input name="logo" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="min-width:100%;" src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo}}" id='img-upload'/>
                                        </div>
                                    </div>

                                    <div class="input-field col s6 col-lg-6" style="min-height:200px">
                                        <div class="form-group">
                                            <label>Footer  Logo</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Footer Logo: Browse… <input name="logo_footer" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="min-width:100%;" src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo_footer}}" id='img-upload'/>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="input-field col s6 col-lg-6" style="min-height:200px">
                                        <div class="form-group">
                                            <label>Logo Two  Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Logo 2: Browse… <input name="logo_two" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="min-width:100%;" src="{{url('/')}}/uploads/logo/{{$SiteSettings->logo_two}}" id='img-upload'/>
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="input-field col s6 col-lg-6" style="min-height:200px">
                                        <div class="form-group">
                                            <label>Favicon</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Favicon: Browse… <input name="favicon" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="min-width:100%;" src="{{url('/')}}/uploads/logo/{{$SiteSettings->favicon}}" id='img-upload'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Preview --}}

                            {{-- Images --}}

                        <input type="hidden" name="logo_cheat" value="{{$SiteSettings->logo}}">
                        <input type="hidden" name="logo_footer_cheat" value="{{$SiteSettings->logo_footer}}">
                        

                        <input type="hidden" name="logo_two_cheat" value="{{$SiteSettings->logo_two}}">
                        <input type="hidden" name="favicon_cheat" value="{{$SiteSettings->favicon}}">


                        <button type="submit" class="btn btn-default">Save</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>

@endsection