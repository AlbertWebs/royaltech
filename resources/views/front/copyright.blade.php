@extends('front.master-other')

@section('content')
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url('{{asset('corporate/images/background/pattern-16.png')}}')"></div>
        <div class="auto-container">
            <h2>Copyright Statement</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{url('/')}}">home</a></li>
                <li>Copyright Statement</li>
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


                    <!--Block-->
                    <li class="accordion block active-block">
                        <div class="acc-btn active">Copyright Statement <div class="icon fa fa-angle-right"></div></div>
                        <div class="acc-content current">
                            <div class="content">
                                <div class="text">
                                    {{--  --}}
                                    <div class="col-12 align-self-center">

                                        <p>&nbsp;This website and its content is copyright of RoyalTech Computers Limited - ©
                                        RoyalTech Computers Limited  2022. All rights reserved.

                                        Any redistribution or reproduction of part or all of the contents in
                                        any form is partially prohibited other than the following:

                                            <strong>.</strong>you may print or download to a local hard disk extracts for your
                                            personal and non-commercial use only<br>

                                            <strong>.</strong>you may copy the content to individual third parties for their
                                            personal use, but only if you acknowledge the website as the source
                                            of the material<br>

                                            <strong>.</strong>Free Web themes can be downloaded reused and redistributed but the
                                            footer back-links have to be retained<br>


                                        You may not, except with our express written permission, distribute
                                        or commercially exploit the content. Nor may you transmit it or store
                                        it in any other website or other form of electronic retrieval system.

                                        <br><p></p>

                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                    </li>



                </ul>

            </div>



        </div>
    </div>
</section>
<!-- End Faq's Page Section -->
@endsection
