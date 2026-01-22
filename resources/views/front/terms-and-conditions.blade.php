@extends('front.master-other')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>Terms and Conditions</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Terms and Conditions</li>
            </ul>
        </div>
    </section>


<!-- Faq's Page Section -->
<section class="faq-page-section">
    <div class="auto-container">


        <div class="row clearfix">

            <!-- Column -->
            <div class="column col-lg-12 col-md-12 col-sm-12">

                <ul class="accordion-box">

                    @foreach ($Terms as $terms)
                    <!--Block-->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">{{$terms->title}} <div class="icon fa fa-angle-right"></div></div>
                        <div class="acc-content current">
                            <div class="content">
                                <div class="text">
                                    {{--  --}}
                                    <div class="col-12 align-self-center">

                                        {!! html_entity_decode($terms->content, ENT_QUOTES, 'UTF-8') !!}

                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>

            </div>



        </div>
    </div>
</section>
<!-- End Faq's Page Section -->
@endsection
