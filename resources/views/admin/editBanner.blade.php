@extends('admin.master')
@section('content')
<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
    .modal a.close-modal{
        top:0px !important;
        right:0px !important;
    }
</style>
<!--== BODY CONTNAINER ==-->
 <div class="container-fluid sb2">
    <div class="row">
        @include('admin.sidebar')

        <!--== BODY INNER CONTAINER ==-->
        
        <div class="sb2-2">
            <div class="sb2-2-2">
                <ul>
                    <li><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                    </li>
                    <li class="active-bre"><a href="#"> Edit {{$Banner->name}}</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/banners"><i class="fa fa-backward" aria-hidden="true"></i> All Banners</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <h2>Edit {{$Banner->name}} Banner</h2>
                <p>Banner Images are random images used to bring out the layout</p>
                <form method="POST" action="{{url('/')}}/admin/edit_Banner/{{$Banner->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="link_name" type="text" value="{{$Banner->link_name}}" class="validate">
                            <label for="list-title">Banner Link Name</label>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="link" type="text" value="{{$Banner->link}}" class="validate">
                            <label for="list-title">Banner Link</label>
                        </div>
                    </div> --}}
                    <div class="row">
                        <?php $Settings = DB::table('_site_settings')->get(); ?>
                        @foreach ($Settings as $settings)
                        {{--  --}}
                        <div class="input-field col s12">
                            <select required name="link" class="icons" id="mydiv">
                                <option value="{{$Banner->link}}" selected>{{$Banner->link}}</option>                                        
                                <?php $Category = DB::table('categories')->get(); ?>
                                @foreach ($Category as $Categories)
                                <option value="{{$settings->url}}/products/{{$Categories->slung}}" data-icon="{{url('/')}}/uploads/categories/{{$Categories->image}}" class="circle">{{$Categories->title}} - Link: {{$settings->url}}/products/{{$Categories->slung}}</option>
                                @endforeach
                            </select>
                            <label>Choose Where this Link Points To</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="title" type="text" value="{{$Banner->title}}" class="validate">
                            <label for="list-title">Banner title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="content" type="text" value="{{$Banner->content}}" class="validate">
                            <label for="list-title">Banner Content</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="size" type="text" value="{{$Banner->size}}" readonly class="validate">
                            <label for="list-title">Banner Size</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="section" type="text" value="{{$Banner->section}}" readonly class="validate">
                            <label for="list-title">Banner Section</label>
                        </div>
                    </div>
                <br><br>
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
                                    min-width: 100%;
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
                                    width: 100%;
                                }
                            </style>
                            {{-- Style --}}
                            <div class="row">
                                <div class="">
                                    <div class="input-field col s12">
                                        <div class="form-group">
                                            <label>Banner Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input name="image" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="width:auto;" src="{{url('/')}}/uploads/banners/{{$Banner->image}}" id='img-upload'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Preview --}}

                            {{-- Images --}}
                            <br><br>
                            <div class="clearfix"></div>
                            <input type="hidden" name="image_cheat" value="{{$Banner->image}}">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" class="waves-effect waves-light btn-large" value="Save Changes">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>


@endsection