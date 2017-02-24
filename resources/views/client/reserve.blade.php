@extends('layouts.masterlayoutadgency')

@section('title')
    Reserve
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

                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">Available Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My Post</a></li>

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

            <div class="container" style="width: 400px; padding-top: 50px">
                <div class="panel-group"
                     style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 style=" color: white; text-shadow: 2px 2px 4px #000000;">Reserve</h2>
                        </div>
                        <div class="panel-body">


                            {!! Form::open(['method' => 'get','action' => ['ClientController@reserve_add', $owner_id, $client_id, $billboard_id]]) !!}

                            {{csrf_field()}}

                            <div class="form-group">
                                {!! Form::label('reserve_until', 'Reserve for:') !!}
                                {!! Form::select('reserve_until', [1 => '1 Week', 2 => '2 Weeks',3 => '3 Weeks', 4 => '1 Month'],1, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection