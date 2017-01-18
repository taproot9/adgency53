@extends('layouts.masterlayoutadgency', ['signupactive' => 'active'])

@section('title')
    Login
@endsection

@section('nav')

    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="adspace.html">AdSpaces</a></li>
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
        <li class="active"><a href="{{url('/login')}}">Login</a></li>
        <li><a href="{{url('/register')}}">SignUp</a></li>
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
    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">
        <div class="panel-group"
             style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #191919">
                    <h2 style=" color: white; text-shadow: 2px 2px 4px #000000;">Login</h2>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{url('/login')}}">

                        <div class="form-group">

                            {{csrf_field()}}

                            {{--email--}}
                            <label for="email"></label>
                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-envelope"
                                                                  aria-hidden="true"></i></div>
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>


                            {{--password--}}
                            <label for="password"></label>
                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-lock"
                                                                  aria-hidden="true"></i></div>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group pull-left">
                                    <div class="checkbox">
                                        <label class="active">
                                            <input type="checkbox" name="remember" class="active"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-md pull-right active"
                                        style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    Submit
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection