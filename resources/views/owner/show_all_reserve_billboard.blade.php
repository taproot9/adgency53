@extends('layouts.masterlayoutadgency')

@section('title')
    My All Reserve Billboard
@endsection

@section('nav')

    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
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

                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img height="20px" width="20px" src="{{asset('user_photo/img2.png')}}" alt="Avatar"></span>
                        <span class="header"><span class="from">Ryan Boter</span></span>
                    </a>
                </li>
            </ul>
        </li>

    @endif

    @if(Auth::guest())
        <li class="active"><a href="{{url('/login')}}">Login</a></li>
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
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My All Post</a></li>
                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">My Available Post</a></li>

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

            @foreach($adspaces as $ad)
                @foreach($ad->ad_spaces as $ad_spaces)
                    <div class="col-sm-4">
                        <div class="single-blog">
                            <?php $ad_space = \App\Adspace::findOrFail($ad_spaces->pivot->adspace_id)?>

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
                            <a href="{{url('/client/edit_my_rented_post',[$ad_space->id])}}" class="btn btn-primary">Edit</a>
                        </div>

                    </div>
                @endforeach
            @endforeach
        </div>

        {{--{{$ad_spaces->links()}}--}}

        {!! $adspaces->links('layouts/pagination') !!}

    </div>

@endsection