@extends('layouts.masterlayoutadgency')

@section('title')
    Rent Billboard Pending
@endsection

@section('nav')

    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active"><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
    <li><a href="about-us.html">About Us</a></li>
    <!--<li><a href="services.html">Services</a></li>-->
    <li><a href="portfolio.html">Portfolio</a></li>

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
        <ul class="dropdown-menu">
            <li><a href="blog-item.html">Blog Single</a></li>
            <li><a href="pricing.html">Pricing</a></li>
            <li><a href="404.html">404</a></li>
            <li><a href="shortcodes.html">Shortcodes</a></li>
        </ul>
    </li>
    <!--<li><a href="blog.html">Blog</a></li> -->
    <li><a href="contact-us.html">Contact</a></li>

    @if(Auth::guest())
        <li><a href="{{url('/login')}}">Login</a></li>
        <li><a href="{{url('/register')}}">SignUp</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">

                @if(Auth::user()->role_id == 3)

                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">My Available Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My All Post</a></li>

                @endif

                @if(Auth::user()->role_id == 2)
                    <li><a href="{{url('/client/available_post')}}">Available Billboard</a></li>
                    <li><a href="{{url('/client/rented')}}">Rented</a></li>
                    {{--<li><a href="#">Reserved</a></li>--}}
                    {{--<li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">Owned</a></li>--}}
                @endif

                <li>

                    <hr>

                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>


            </ul>
        </li>
    @endif

@endsection

@section('content')

    <div class="container" style="padding-top: 70px; padding-bottom: 70px">

        <div class="row">
            <div class="col-sm-9">
                <ul class="mainmenu nav navbar-nav pull-left">
                    <li class="dropdown">

                        <h2><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #a9a9b7;">Billboard Type <i
                                        class="fa fa-angle-down"></i></a></h2>

                        <ul class="dropdown-menu">
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="shortcodes.html">Shortcodes</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="Search"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="single-blog">
                    <img class="picPost" src="{{$ad_space->photo_name ? $ad_space->photo_name : asset('adgencystyles/images/blog/bus.jpg')}}" alt=""/>
                    <h2>Type: {{$ad_space->adspace_type}}</h2>
                    <h3><b>For {{$ad_space->advertising_type}}</b></h3>
                    <p>Size: {{$ad_space->size}}</p>
                    <p>Location: {{$ad_space->location}}</p>
                    @if($ad_space->advertising_type == 'sale')
                        <p>Selling Price: &#8369; {{$ad_space->price}}</p>
                    @endif
                    @if($ad_space->advertising_type == 'rent')
                        <p>Rent Price: &#8369; {{$ad_space->price}}{{'/Month'}} </p>
                    @endif
                    <ul class="post-meta">
                        <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> {{$ad_space->posted_by}}</li>
                        <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> {{ $ad_space->created_at->format('M d, Y') }}</li>
                    </ul>
                    {{--<a href="{{route('edit_rented_post',[$ad_space->id])}}" class="btn btn-primary">Update</a>--}}
                    <a href="{{url('/owner/adspace_rent/add_to_adspace_rent', [$ad_space, $rent_id,$client_id])}}" class="btn btn-primary">Accept</a>
                    <a href="{{url('/owner/rent_pending/delete', [$ad_space, $rent_id,$client_id])}}" class="btn btn-primary">Decline</a>

                </div>
            </div>
        </div>

        {{--{{$ad_spaces->links()}}--}}

        {{--{!! $adspaces->links('layouts/pagination') !!}--}}

    </div>

@endsection