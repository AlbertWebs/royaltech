@extends('front.master-pesapal')
@section('content')
<?php $SiteSettings = DB::table('sitesettings')->get(); ?>
@foreach($SiteSettings as $Settings)

<main>

<br><br><br>



    <div class="bg_color_1">
        <div class="container margin_80_55" style="min-height:550px;">

            {!!html_entity_decode($iframe)!!}

        </div>
        <!--/container-->
    </div>
    <!--/bg_color_1-->

</main>
<!--/main-->
@endforeach

@endsection
