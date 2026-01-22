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
                    <li class="active-bre"><a href="#"> Edit Slider</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/sliders"><i class="fa fa-backward" aria-hidden="true"></i> All Sliders</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <h2>Edit Sliders</h2>
                <p>Homepage Sliders and the hero images sliding on the landing page</p>
                <center>
                    @if(Session::has('message'))
                                  <div class="alert alert-success">{{ Session::get('message') }}</div>
                   @endif
   
                   @if(Session::has('messageError'))
                                  <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                   @endif
                </center>
                <form method="POST" action="{{url('/')}}/admin/edit_Slider/{{$Slider->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="text1" type="text"  value="{{$Slider->text1}}"  class="validate">
                            <label for="list-title">Slider Text 1</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="text2" type="text"  value="{{$Slider->text2}}"  class="validate">
                            <label for="list-title">Slider Text 2</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="text3" type="text"  value="{{$Slider->text3}}"  class="validate">
                            <label for="list-title">Slider Text 3</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="text4" type="text"  value="{{$Slider->text4}}"  class="validate">
                            <label for="list-title">Slider Text 4</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="text5" type="text"  value="{{$Slider->text5}}"  class="validate">
                            <label for="list-title">Slider Text 5</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="action_name" type="text"  value="{{$Slider->action_name}}"  class="validate">
                            <label for="list-title">Action Name</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="list-title" name="action" type="url"  value="{{$Slider->action}}"  class="validate">
                            <label for="list-title">Action</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                             
                        {{--  --}}
                        <div class="input-field col s12">
                            <select required name="type" class="iacons" id="mydiv">
                        
                                <option value="{{$Slider->type}}" selected>{{$Slider->type}}</option>                                        
                            
                       
                                <option value="1" data-icon="#" class="circle">1 - With Text 5 Dropping Off</option>
                                <option value="2" data-icon="#" class="circle">2 - With word by word Dropping</option>
                                <option value="3" data-icon="#" class="circle">3 - With Words With background</option>
                    
                            </select>
                            <label>Choose Type</label>
                        </div>
                       
                    </div>

                 
                <br>
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
                                    <div class="input-field col s6">
                                        <div class="form-group">
                                            <label>Slider Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input name="image" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="width:auto;" src="{{url('/')}}/uploads/slider/{{$Slider->image}}" id='img-upload'/>
                                        </div>
                                    </div>

                                    <div class="input-field col s6">
                                        <div class="form-group">
                                            <label>Slider Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Browse… <input name="thumbnail" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="width:auto;" src="{{url('/')}}/uploads/slider/{{$Slider->thumbnail}}" id='img-upload'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Preview --}}

                            {{-- Images --}}
                            <br><br>
                            <div class="clearfix"></div>
                            <input type="hidden" name="image_cheat" value="{{$Slider->image}}">
                            <input type="hidden" name="thumbnail_cheat" value="{{$Slider->thumbnail}}">
                            
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