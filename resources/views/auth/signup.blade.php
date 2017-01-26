@extends('layouts.masterlayoutadgency', ['signupactive' => 'active'])

@section('title')
    Signup
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
    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">
        <div class="panel-group"
             style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #191919">
                    <h2 style=" color: white; text-shadow: 2px 2px 4px #000000;">Register</h2>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{url('/register')}}">

                        {{csrf_field()}}

                        <div class="form-group">
                            <!--firstname-->
                            <label for="firstname"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-user"
                                                                  aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="first_name" id="firstname"
                                       placeholder="First Name" required>
                            </div>

                            <!--lastname-->
                            <label for="lastname"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-user"
                                                                  aria-hidden="true"></i></div>
                                <input type="text" name="last_name" class="form-control" id="lastname"
                                       placeholder="Last Name" required>
                            </div>

                            <!--email-->
                            <label for="email"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-envelope"
                                                                  aria-hidden="true"></i></div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                       required>
                            </div>

                            <!--address-->
                            <label for="address"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-map-marker"
                                                                  aria-hidden="true"></i></div>
                                <input type="text" name="address" class="form-control" id="address"
                                       placeholder="Address" required>
                            </div>

                            <!--contact-->
                            <label for="contact"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-mobile"
                                                                  aria-hidden="true"></i></div>
                                <input type="text" name="contact" class="form-control" id="contact"
                                       placeholder="Contact" required>
                            </div>

                            <br>

                            <!--role-->
                            <label for="sel1">Select Role</label>
                            <div class="input-group">

                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-users"
                                                                  aria-hidden="true"></i></div>
                                <select class="form-control" id="sel1" name="role_id">
                                    <option value="2">Client</option>
                                    <option value="3">Owner</option>
                                </select>
                            </div>

                            <!--password-->
                            <label for="password"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-lock"
                                                                  aria-hidden="true"></i></div>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!--confirm password-->
                            <label for="password-confirm"></label>
                            <div class="input-group">
                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-lock"
                                                                  aria-hidden="true"></i></div>
                                <input type="password" class="form-control" id="password-confirm"
                                       name="password_confirmation" placeholder="Confirm Password" required>
                            </div>


                        </div>

                        <div class="row">


                            <button type="submit" class="btn btn-primary btn-md pull-right active"
                                    style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                Submit
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection