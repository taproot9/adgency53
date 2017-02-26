@extends('layouts.masterlayoutadgency')

@section('title')
    AdSpaces
@endsection

@section('nav')
    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active"><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
    <li><a href="about-us.html">About Us</a></li>
    <li><a href="contact-us.html">Contact</a></li>


    @if(Auth::check())
        <li id="isActive" class="dropdown hidden-phone">

            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell " aria-hidden="true"></i>
            </a>

            <ul class="dropdown-menu notifications">

                <li class="dropdown-menu-title">
                    {{--<span>You have a notifications</span>--}}
                    {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                </li>

                {{--owner notification--}}

                {{--rents--}}
                @if($rents == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($rents as $rent)
                        @if($rent->is_seen == 0)
                            <li>
                                <a href="{{url('/owner/show_pending_rent_specific_billboard', [$rent->billboard_id, $rent->id, $rent->client_id])}}">
                                    <span class="message">{{App\User::findOrFail($rent->client_id)->first_name}} Ask For Rent</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif




                {{--sales--}}
                @if($sales == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($sales as $sale)
                        @if($sale->is_seen == 0)
                            <li>
                                <a href="{{url('/owner/show_pending_sale_specific_billboard', [$sale->billboard_id, $sale->id, $sale->client_id])}}">
                                    <span class="message">{{App\User::findOrFail($sale->client_id)->first_name}} Ask For Sale</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif

                {{--reservation--}}

                @if($reserves == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($reserves as $reserve)

                        @if($reserve->is_seen == 0)
                            <li>
                                <a href="{{url('/owner/show_pending_reserved_specific_billboard', [$reserve->billboard_id, $reserve->id, $reserve->client_id])}}">
                                    <span class="message">{{App\User::findOrFail($reserve->client_id)->first_name}} Ask For Reserve</span>
                                </a>
                            </li>
                        @endif

                    @endforeach
                @endif



                {{--client notification--}}

                {{--rents--}}
                @if($rents_client == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($rents_client as $rent)
                        @if($rent->is_seen == 1)
                            <li>
                                {{--<a href="{{url('/owner/show_pending_rent_specific_billboard', [$rent->billboard_id, $rent->id, $rent->client_id])}}">--}}
                                <span class="message">{{App\User::findOrFail($rent->owner_id)->first_name}} Accept Rent Request</span>
                                {{--</a>--}}
                            </li>
                        @endif
                    @endforeach
                @endif




                {{--sales--}}
                @if($sales_client == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($sales_client as $sale)
                        @if($sale->is_seen == 1)
                            <li>
                                {{--<a href="{{url('/owner/show_pending_sale_specific_billboard', [$sale->billboard_id, $sale->id, $sale->client_id])}}">--}}
                                <span class="message">{{App\User::findOrFail($sale->owner_id)->first_name}} Accept Sales Request</span>
                                {{--</a>--}}
                            </li>
                        @endif
                    @endforeach
                @endif

                {{--reservation--}}

                @if($reserves_client == null)
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($reserves_client as $reserve)

                        @if($reserve->is_seen == 1)
                            <li>
                                {{--<a href="{{url('/owner/show_pending_reserved_specific_billboard', [$reserve->billboard_id, $reserve->id, $reserve->client_id])}}">--}}
                                <span class="message">{{App\User::findOrFail($reserve->owner_id)->first_name}} Accept Reserve Request</span>
                                {{--</a>--}}
                            </li>
                        @endif

                    @endforeach
                @endif




                {{--@if($rent == null)--}}
                {{--<li>--}}
                {{--<span class="message">No notification</span>--}}
                {{--</li>--}}

                {{--@else--}}
                {{--@foreach($rents as $res)--}}
                {{--<li>--}}
                {{--@foreach($res->ad_spaces as $ad_space)--}}

                {{--$table->integer('rent_id');--}}
                {{--$table->integer('adspace_id');--}}

                {{--<a href="{{url('/owner/show_rent_specific_billboard', [$ad_space->pivot->adspace_id, $res->client_id])}}">--}}
                {{--<span class="message">{{App\User::findOrFail($res->client_id)->first_name}} Ask For Rent</span>--}}
                {{--@endforeach--}}
                {{--</a>--}}

                {{--<a href="{{url('/owner/show_reserved_specific_billboard', [$ad_space->pivot->adspace_id, $res->client_id])}}">--}}
                {{--@endforeach--}}
                {{--<span class="message">{{App\User::findOrFail($res->client_id)->first_name}} Ask For Rent</span>--}}
                {{--</a>--}}

                {{--</li>--}}
                {{--@endforeach--}}
                {{--@endif--}}

                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="icon green"><i class="icon-comment-alt"></i></span>--}}
                {{--<span class="message">New comment</span>--}}
                {{--<span class="time">7 min</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="icon green"><i class="icon-comment-alt"></i></span>--}}
                {{--<span class="message">New comment</span>--}}
                {{--<span class="time">8 min</span>--}}
                {{--</a>--}}
                {{--</li>--}}


            </ul>

        </li>



        <li class="dropdown hidden-phone">

            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                {{--<span class="badge red">--}}
                {{--4 </span>--}}
            </a>
            <ul class="dropdown-menu messages">
                <li class="dropdown-menu-title">
                    {{--<span>You have 9 messages</span>--}}
                    {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img height="20px" width="20px" src="{{asset('user_photo/img2.png')}}" alt="Avatar"></span>
                        <span class="header"><span class="from">Ryan Boter</span></span>
                    </a>
                </li>
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>--}}
                {{--<span class="header"><span class="from">Dennis Ji</span><span class="time">56 min</span></span>--}}
                {{--<span class="message">Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore</span>--}}
                {{--</a>--}}
                {{--</li>--}}

                {{--<li>--}}
                {{--<a class="dropdown-menu-sub-footer">View all messages</a>--}}
                {{--</li>--}}
            </ul>
        </li>
    @endif




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
    <section class="pricing-page">
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
                                <a href="{{url('/owner/subscribe', [100, 'Start Up', 3])}}" class="btn btn-primary">Subscribe</a>
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
                                <a href="{{url('/owner/subscribe', [190, 'Standard', 6])}}" class="btn btn-primary">Subscribe</a>
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
                                <a href="{{url('/owner/subscribe', [270, 'Premium', 12])}}" class="btn btn-primary">Subscribe</a>
                            </li>
                        </ul>
                    </div>

                    <?php $exists = Illuminate\Support\Facades\DB::table('subscribe_user')->whereUserId(Auth::user()->id)->count() > 0?>

                    @if(!$exists)
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 plan price-four wow fadeInDown">
                            <ul>
                                <li class="heading-four">
                                    <h1>Free Trial</h1>
                                    <span>Free 1 Month</span>
                                </li>
                                <li>1 Month Free Access</li>
                                <li>24/7 Support</li>
                                <li class="plan-action">
                                    <a href="{{url('/owner/subscribe', [0, 'Free Trial', 1])}}" class="btn btn-primary">Subscribe</a>
                                </li>
                            </ul>
                        </div>
                    @endif


                </div>
            </div><!--/pricing-area-->
        </div><!--/container-->
    </section><!--/pricing-page-->

@endsection