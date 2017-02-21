@extends('layouts.masterlayoutadgency')

@section('title')
    My Profile
@endsection

@section('nav')

    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
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
        <li class="active"><a href="{{url('/register')}}">SignUp</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>
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

        <div class="panel panel-info" style="padding-bottom: 20px">
            <div class="panel-heading">
                <h3 class="panel-title">My Profile</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center">
                        <!--<img class="img-responsive img-rounded"-->
                        {{--<!--src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="">-->--}}
                        <img height="200px" width="200px" class="img-responsive img-rounded"
                             src="{{Auth::user()->photo_name ? Auth::user()->photo_name : 'http://placehold.it/400x400'}}" alt="">
                    </div>

                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>FirstName</td>
                                <td>{{Auth::user()->first_name}}</td>
                            </tr>
                            <tr>
                                <td>Lastname</td>
                                <td>{{Auth::user()->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{Auth::user()->email}}</td>
                            </tr>

                            <tr>
                                <td>Address:</td>
                                <td>{{Auth::user()->address}}</td>
                            </tr>

                            <tr>
                                <td>Contact:</td>
                                <td>{{Auth::user()->contact}}</td>
                            </tr>

                            <tr>
                                <td>Role:</td>
                                @if(Auth::user()->role_id == 2)
                                    <td>Client</td>
                                @endif

                            </tr>

                            <tr>
                                <td>Status:</td>
                                @if(Auth::user()->user_status_id)
                                    <td>Active</td>
                                @endif

                            </tr>


                            </tbody>
                        </table>
                        <a href="{{route('client_edit_profile', [ Auth::user()->id])}}" class="btn btn-primary">Edit Profile</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection