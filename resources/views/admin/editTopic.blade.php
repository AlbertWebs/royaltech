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
                    <li class="active-bre"><a href="#"> Edit  Topic</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/topics"><i class="fa fa-backward" aria-hidden="true"></i> All Topics</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-Edit-Topic sb2-2-1">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Edit  Topic</h4>
                        <p> Create Topic  </p>
                        <center>
                            @if(Session::has('message'))
                                          <div class="alert alert-success">{{ Session::get('message') }}</div>
                           @endif
           
                           @if(Session::has('messageError'))
                                          <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                           @endif
                        </center>
                    </div>
                    <div class="bor">
                        <form method="POST" action="{{url('/')}}/admin/edit_Topic/{{$Topic->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="input-field col s12">
                                    <input autocomplete="off" name="title" id="list-title" value="{{$Topic->title}}" type="text" class="validate" required>
                                    <label for="list-title">Topic Title</label>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="kXYiU_JCYtU" autocomplete="off" value="{{$Topic->video}}" name="video" id="list-title" type="text" class="validate" required>
                                    <label for="list-title">Topic Video</label>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="example 3:20" autocomplete="off" value="{{$Topic->video_duration}}" name="video_duration" id="list-title" type="text" class="validate" required>
                                    <label for="list-title">Topic Video Duration</label>
                                </div>

                               

                            </div>

                            <div class="row">
                                {{--  --}}
                                <div class="input-field col s12">
                                    <select required name="course_id" class="icons" id="mydiv">
                                        <?php $SelectedCategories = DB::table('courses')->where('id',$Topic->course_id)->get(); ?>
                                        @foreach ($SelectedCategories as $item)
                                        <option value="{{$item->id}}" selected>{{$item->title}}</option>
                                        @endforeach
                                        
                                        @foreach ($Course as $Categories)
                                        <option value="{{$Categories->id}}" data-icon="{{url('/')}}/uploads/courses/{{$Categories->image}}" class="circle">{{$Categories->title}}</option>
                                        @endforeach
                                    </select>
                                    <label>Choose Parent Course</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s6">
                                    <div class="box-inn-sp box-second-inn">
                                        <div class="inn-title">
                                            <h4>Bonus Video</h4>
                                        </div>
                                        <div class="tab-inn">
                                            @if($Topic->is_bonus == 0)
                                            <!-- Switch -->
                                            <div class="switch mar-bot-20">
                                                <label>
                                                    Off
                                                    <input name="bonus" type="checkbox">
                                                    <span class="lever"></span> On
                                                </label>
                                            </div>
                                            @else 
                                            <!-- Switch -->
                                            <div class="switch mar-bot-20">
                                                <label>
                                                    Off
                                                    <input name="bonus" checked type="checkbox">
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
                                    <textarea required name="meta" class="materialize-textarea">{{$Topic->meta}}</textarea>
                                    <label for="textarea1">Meta Descriptions:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea required id="article-ckeditor" name="content" class="materialilze-textarea" placeholder="content">{{$Topic->content}}</textarea>
                                </div>
                            </div><br><br>
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
                                        <label>Change Image</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                    Placeholder: Browse… <input name="image" type="file" id="imgInp">
                                                </span>
                                            </span>
                                            <input type="text" class="form-control" readonly>
                                        </div>
                                        <img class="image-preview" style="width:auto;" src="{{url('/')}}/uploads/topics/{{$Topic->placeholder}}" id='img-upload'/>
                                    </div>
                                </div>

                               
                            </div>
                            </div>
                            {{-- Preview --}}

                            {{-- Images --}}
                            <br><br>
                           
                     
                            <input type="hidden" name="image_cheat" value="{{$Topic->placeholder}}">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  type="submit" class="waves-effect waves-light btn-large" value="Save Changes">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>

@endsection