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
                    <li class="active-bre"><a href="#"> Add New Topic</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/topics"><i class="fa fa-backward" aria-hidden="true"></i> All Topics</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-add-Topic sb2-2-1">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Add New Topic</h4>
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
                        <form method="POST" action="{{url('/')}}/admin/add_Topic" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="input-field col s12">
                                    <input autocomplete="off" name="title" id="list-title" type="text" class="validate" required>
                                    <label for="list-title">Topic Title</label>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="kXYiU_JCYtU" autocomplete="off" name="video" id="list-title" type="text" class="validate" required>
                                    <label for="list-title">Topic Video</label>
                                </div>

                                <div class="input-field col s12">
                                    <input placeholder="example 3:20" autocomplete="off" name="video_duration" id="list-title" type="text" class="validate" required>
                                    <label for="list-title">Topic Video Duration</label>
                                </div>

                                
                                <div class="row">
                                    <div class="input-field col s6">
                                        <div class="box-inn-sp box-second-inn">
                                            <div class="inn-title">
                                                <h4>Bonus Video</h4>
                                            </div>
                                            <div class="tab-inn">
                                                <!-- Switch -->
                                                <div class="switch mar-bot-20">
                                                    <label>
                                                        Off
                                                        <input name="bonus" type="checkbox">
                                                        <span class="lever"></span> On
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <div class="file-field">
                                        <div class="btn">
                                            <span>File</span>
                                            <input required name="image" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input  class="file-path validate" type="text" placeholder="Upload Topic Banner">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                {{--  --}}
                                <div class="input-field col s12">
                                    <select required name="course_id" class="icons" id="mydiv">
                                        <option value="" disabled selected>Choose your Course</option>
                                        @foreach ($Course as $Categories)
                                        <option value="{{$Categories->id}}" data-icon="{{url('/')}}/uploads/courses/{{$Categories->image}}" class="circle">{{$Categories->title}}</option>
                                        @endforeach
                                    </select>
                                    <label>Choose Parent Course</label>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea required name="meta" class="materialize-textarea"></textarea>
                                    <label for="textarea1">Meta Descriptions:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea required id="article-ckeditor" name="content" class="materialilze-textarea" placeholder="content"></textarea>
                                </div>
                            </div><br><br>
                           
                     
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  type="submit" class="waves-effect waves-light btn-large" value="Submit">
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

{{--  --}}
<div id="ex1" class="modal">
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Add New Category</h4>
                    </div>
                    <div class="tab-inn">
                        <form method="POST" id="categoryAddForm">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="input-field col s12">
                                    <input autocomplete="off" name="title" id="CategoryTitle" type="text" class="validate">
                                    <label for="CategoryName">Category Name</label>
                                </div>
                            </div>
                            <div class="row" id="submitButton">
                                <div class="input-field col s12">
                                    <input  type="submit" class="waves-effect waves-light btn-large" value="Submit">
                                </div>
                            </div>
                            
                            <div class="tab-inn" id="loading-bar">
                                <div class="progress">
                                    <div class="indeterminate"></div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
{{-- <a href="#" rel="modal:close">Close</a> --}}
<script type="text/javascript">
        // A $( document ).ready() block.
    $( document ).ready(function() {
        $('#loading-bar').hide();
    });

    $('#categoryAddForm').on('submit',function(event){
        event.preventDefault();
        $('#loading-bar').show();
   

        let title = $('#CategoryTitle').val();
       

        $.ajax({
          url: "{{url('/')}}/admin/addCategoryAjaxRequest",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            title:title,
          },
          success:function(response){
            $('#loading-bar').hide();
            $('#submitButton').html('<center><span class="alert-success text-center">Category Added Successfully</span></center>').delay(3000);
            $('#categoryAddForm')[0].reset();
            setTimeout(function() {
                location.reload();
            }, 5000);
          },
         });
        });
      </script>
</div>
{{--  --}}
@endsection