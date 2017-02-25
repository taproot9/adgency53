@extends('layouts.masterlayoutadgency', ['signupactive' => 'active'])

@section('title')
    Signup
@endsection

@section('nav')
    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
    <li><a href="about-us.html">About Us</a></li>
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

                @if(Auth::user()->role_id == 3)

                    <li><a href="{{url('/owner/show/profile')}}">Show Profile</a></li>
                    <li><a href="#">Subscription</a></li>

                    <hr>

                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My Post</a></li>
                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">Available Post</a></li>

                    <hr>

                    <li><a href="{{url('/show_all_rented')}}">For Rent</a></li>
                    <li><a href="{{url('/owner/show_all_sale')}}">For Sale</a></li>

                    <hr>

                    <li><a href="{{url('/owner/show_all_rented_billboard')}}">Rented</a></li>
                    <li><a href="{{url('/owner/show_all_sale_billboard')}}">Sold</a></li>
                    <li><a href="{{url('/owner/show_all_reserve_billboard')}}">Reserved</a></li>

                @endif

                @if(Auth::user()->role_id == 2)
                    <li><a href="{{url('/client/show/profile')}}">Show Profile</a></li>

                    <hr>

                    <li><a href="{{url('/client/available_post')}}">Available Ad Spaces</a></li>
                    <li><a href="{{url('/client/show_available_rent')}}">For Rent</a></li>
                    <li><a href="{{url('/client/show_available_sales')}}">For Sale</a></li>

                    <hr>

                    <li><a href="{{url('/client/show_my_all_rent')}}">My Rental</a></li>
                    <li><a href="{{url('/client/show_my_all_sale')}}">My Sales</a></li>
                    <li><a href="{{url('/client/show_my_all_reserve')}}">My Reservation</a></li>
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
    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">

        <div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="container">
                <div class="center">
                    <h2>Pricing Table</h2>
                    <p class="lead">Choose your subscription plan</p>
                </div>
                <div class="pricing-area text-center">
                    <div class="row">

                        <div class="col-sm-4 plan price-one wow fadeInDown">
                            <ul>
                                <li class="heading-one">
                                    <h1>Start Up</h1>
                                    <span>&#8369;100/3 Months</span>
                                </li>
                                <li>3 Months Unlimited Access</li>
                                <li>No Discount</li>
                                <li>24/7 Support</li>
                                <li class="plan-action">
                                    <a href="#" class="btn btn-primary">Subscribe</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-4 plan price-two wow fadeInDown">
                            <ul>
                                <li class="heading-two">
                                    <h1>Standard</h1>
                                    <span>&#8369;190/6 Months</span>
                                </li>
                                <li>6 Months Unlimited Access</li>
                                <li>10% Discount</li>
                                <li>24/7 Support</li>
                                <li class="plan-action">

                                    <a href="#" class="btn btn-primary">Subscribe</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-4 plan price-three wow fadeInDown">
                            <img src="{{asset('adgencystyles/images/ribon_one.png')}}">
                            <ul>
                                <li class="heading-three">
                                    <h1>Premium</h1>
                                    <span>&#8369;270/1 Year</span>
                                </li>
                                <li>1 Year Unlimited Access</li>
                                <li>30% Discount</li>
                                <li>24/7 Support</li>
                                <li class="plan-action">
                                    <a href="#" class="btn btn-primary">Subscribe</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 plan price-four wow fadeInDown">
                            <ul>
                                <li class="heading-four">
                                    <h1>Free Trial</h1>
                                    <span>Free 1 Month</span>
                                </li>
                                <li>1 Month Free Access</li>
                                <li>24/7 Support</li>
                                <li class="plan-action">
                                    <a href="#" class="btn btn-primary">Subscribe</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!--/pricing-area-->
            </div><!--/container-->
        </div>


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
                            <label for="role">Select Role</label>
                            <div class="input-group">

                                <div class="input-group-addon"><i style="width: 30px" class="fa fa-users"
                                                                  aria-hidden="true"></i></div>
                                <select class="form-control" id="role" name="role_id">
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