<ul class="navigation clearfix">
    {{-- <li class="current"><a href="{{url('/')}}"><span class="fa fa-home"></span> Home</a>

    </li> --}}
    <li><a href="{{url('/')}}/the-company"><span class="fa fa-info"></span> The Company</a>

    </li>

    <li class="dropdown"><a href="#">Center of Exellence</a>
        <ul>
            <?php $Services = DB::table('services')->get(); ?>
            @foreach ($Services as $Ser)
            <li><a href="{{url('/')}}/center-of-excellence/{{$Ser->slung}}">{{$Ser->title}}</a></li>
            @endforeach
        </ul>
    </li>

    <li><a href="{{url('/')}}/e-commerce"><span class="fa fa-shopping-cart"></span>&nbsp; Shop Online</a>
        {{-- <ul>
            <li><a href="{{url('/')}}/e-commerce/product/tags/laptops">Laptops</a></li>
            <?php $Category = DB::table('categories')->limit(5)->get(); ?>
            @foreach ($Category as $cat)
            <li><a href="{{url('/')}}/e-commerce/product/tags/{{$cat->slung}}">{{$cat->title}}</a></li>
            @endforeach

        </ul> --}}
    </li>
    <li><a href="{{url('/')}}/laptops-for-hire"><span class="fa fa-laptop"></span> Hire </a>
        {{-- <ul>

            <li><a download href="{{url('/')}}/uploads/Laptops-Hire-Brochure.pdf">Download Profile <span class="fa fa-download"></span></a></li>

        </ul> --}}

    </li>
</ul>
