@extends('layouts.masterlayoutadgency')

@section('title')
    AdSpaces
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

                    <li><a href="#">My Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="#">General</a></li>

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
            @foreach($ad_spaces as $ad_space)
                <div class="col-sm-4">
                    <div class="single-blog">
                        <img class="picPost" src="{{$ad_space->photo_name ? 'post_owner_images/'.$ad_space->photo_name : asset('adgencystyles/images/blog/bus.jpg')}}" alt=""/>
                        <h2>Type: {{$ad_space->type}}</h2>
                        <p>Size: {{$ad_space->size}}</p>
                        <p>Location: {{$ad_space->location}}</p>
                        <p>Price: &#8369; {{$ad_space->price}}</p>
                        <p>Rent Price: &#8369; {{$ad_space->rent_price}}</p>

                        <ul class="post-meta">
                            <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> {{$ad_space->posted_by}}</li>
                            <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> {{ $ad_space->created_at->format('M d, Y') }}</li>

                        </ul>
                        <a href="" class="btn btn-primary">Interested</a>
                    </div>

                </div>
            @endforeach
        </div>

        {{--{{$ad_spaces->links()}}--}}
        {!! $posts->links('admin/posts/pagination') !!}
        {!! $ad_spaces->links('layout/pagination') !!}

    </div>

@endsection