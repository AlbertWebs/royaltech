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
                    <li class="active-bre"><a href="#"> Edit Color</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/addVariation/color"><i class="fa fa-pencil" aria-hidden="true"></i> Add Color Variation</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/addVariation/size"><i class="fa fa-pencil" aria-hidden="true"></i> Add Size Variation</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/variations/color"><i class="fa fa-pencil" aria-hidden="true"></i> All Size Variations</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Edit Color Variation</h4>
                        {{-- <p> Create Blog Posts </p> --}}
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
                        <form method="POST" action="{{url('/')}}/admin/edit_Variation/{{$Variations->id}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                            
                                {{--  --}}
                                <div class="input-field col s12">

                                    <div class="row">
                                
                                        {{--  --}}
                                        <div class="input-field col s12">
                                            <select required name="value" class="icons" id="mydiv">
                                                <option value="{{$Variations->value}}" selected>{{$Variations->value}}</option>
                                                <option value="Red" data-icon="{{asset('theme/images/products/product-color-red.jpg')}}" class="circle">Red</option>
                                                <option value="Green" data-icon="{{asset('theme/images/products/product-color-green.jpg')}}" class="circle">Green</option>
                                                <option value="Violet" data-icon="{{asset('theme/images/products/product-color-violet.jpg')}}" class="circle">Violet</option>
                                                <option value="Blue" data-icon="{{asset('theme/images/products/product-color-blue.jpg')}}" class="circle">Blue</option>
                                                <option value="Yellow" data-icon="{{asset('theme/images/products/product-color-yellow.jpg')}}" class="circle">Yellow</option>
                                                <option value="Grey" data-icon="{{asset('theme/images/products/product-color-grey.jpg')}}" class="circle">Grey</option>
                                            </select>
                                            <label>Choose Color</label>
                                        </div>
                                    
                                        <div class="section-space col s12"></div>
                                    
                                    </div>
                                </div>
                                {{--  --}}
                                <div class="input-field col s12">
                                    <input autocomplete="off" name="price" id="list-title" value="{{$Variations->price}}" placeholder="140" type="number" class="validate" required>
                                    <label for="list-title"> Price</label>
                                </div>
                                <input type="hidden" name="type" value="color">
                               
                            </div>
                            <div class="row">
                             
                                {{--  --}}
                                <div class="input-field col s12">
                                    <select required name="product_id" class="icons" id="mydiv">
                                        <?php $Products = \App\Models\Product::find($Variations->product_id) ?>
                                        <option value="{{$Variations->product_id}}" selected>{{$Products->name}}</option>
                                        @foreach ($Product as $product)
                                        <option value="{{$product->id}}" data-icon="{{url('/')}}/uploads/products/{{$product->image_one}}" class="circle">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Choose Product</label>
                                </div>
                             
                                <div class="section-space col s12"></div>
                               
                            </div>

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
                                            <label>Add Category Featured Image</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                        Size: 720 by 960 Browse… <input name="image" type="file" id="imgInp">
                                                    </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                            </div>
                                            <img class="image-preview" style="width:auto;" src="{{url('/')}}/uploads/variations/{{$Variations->image}}" id='img-upload'/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Preview --}}

                            {{-- Images --}}
                            <input type="hidden" name="image_cheat" value="{{$Variations->image}}">
                   
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