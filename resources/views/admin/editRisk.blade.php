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
                    <li class="active-bre"><a href="#"> Orders & Delivery </a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/privacy"><i class="fa fa-backward" aria-hidden="true"></i> Privacy Policy </a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/terms"><i class="fa fa-backward" aria-hidden="true"></i> Terms and Conditions</a>
                    </li>
                    <li class="page-back"><a href="{{url('/')}}/admin/faq"><i class="fa fa-backward" aria-hidden="true"></i> Frequently Asked Questions</a>
                    </li>
                </ul>
               
            </div>
            <div class="sb2-2-add-blog sb2-2-1">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Orders & Delivery</h4>
                        <p> </p>
                        <center>
                            @if(Session::has('message'))
                                          <div class="alert alert-success">{{ Session::get('message') }}</div>
                           @endif
           
                           @if(Session::has('messageError'))
                                          <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                           @endif
                        </center>
                    </div>
                    @foreach ($Settings as $item)
                        
                    <div class="bor">
                        <form method="POST" action="{{url('/')}}/admin/edit_Risk" enctype="multipart/form-data">
                            {{csrf_field()}}
                       
                            
                         
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea required id="article-ckeditor" name="content" class="materialilze-textarea" placeholder="content">{{$item->risks}}</textarea>
                                 
                                </div>
                            </div><br><br>
                       
                            <div class="row">
                                <div class="input-field col s12">
                                    <input  type="submit" class="waves-effect waves-light btn-large" value="Save Changes">
                                </div>
                            </div>
                            
                        </form>
                    </div>
                        
                    @endforeach
                    
                </div>
            </div>
        </div>
        <!--== BODY INNER CONTAINER ==-->

    </div>
</div>

@endsection