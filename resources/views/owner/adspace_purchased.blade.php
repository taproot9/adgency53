@extends('layouts.masterlayoutadgency')

@section('title')
    Purchased
@endsection

@section('nav')

    <li class="active"><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
    <li><a href="{{url('/about_us')}}">About Us</a></li>
    <li><a href="contact-us.html">Contact</a></li>


    @if(Auth::check())
        <li id="isActive" class="dropdown hidden-phone">

            <a id="btnCLick" class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-bell " aria-hidden="true"></i>
            </a>

            <ul class="dropdown-menu notifications">

                <li class="dropdown-menu-title">
                    {{--<span>You have a notifications</span>--}}
                    {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                </li>


                {{--rents--}}
                <?php $is_notify_owner = false;?>

                @if(count($rents))

                    @foreach($rents as $rent)
                        @if($rent->is_seen == 0)
                            <?php $is_notify_owner = true;?>
                        @endif
                    @endforeach

                @endif

                <?php $is_notify_client = false;?>
                <?php $is_notify_client_is_seen = false;?>
                @if(count($rents_client))
                    @foreach($rents_client as $rent)
                        @if($rent->is_seen == 1)
                            <?php $is_notify_client = true;?>
                        @endif
                        @if($rent->is_seen_client == 1)
                            <?php $is_notify_client_is_seen = true;?>
                        @endif

                    @endforeach
                @endif


                {{--sales--}}
                <?php $is_notify_owner_sales = false;?>

                @if(count($sales))

                    @foreach($sales as $sale)
                        @if($sale->is_seen == 0)
                            <?php $is_notify_owner_sales = true;?>
                        @endif
                    @endforeach

                @endif

                <?php $is_notify_sales_client = false;?>
                <?php $is_notify_sales_client_is_seen = false;?>
                @if(count($sales_client))
                    @foreach($sales_client as $sale)
                        @if($sale->is_seen == 1)
                            <?php $is_notify_sales_client = true;?>
                        @endif
                        @if($sale->is_seen_client == 1)
                            <?php $is_notify_sales_client_is_seen = true;?>
                        @endif

                    @endforeach
                @endif


                {{--reservation--}}
                <?php $is_notify_owner_reserves = false;?>

                @if(count($reserves))

                    @foreach($reserves as $reserve)
                        @if($reserve->is_seen == 0)
                            <?php $is_notify_owner_reserves = true;?>
                        @endif
                    @endforeach

                @endif

                <?php $is_notify_reserve_client = false;?>
                <?php $is_notify_reserve_client_is_seen = false;?>
                @if(count($reserves_client))
                    @foreach($reserves_client as $reserve)
                        @if($reserve->is_seen == 1)
                            <?php $is_notify_reserve_client = true;?>
                        @endif
                        @if($reserve->is_seen_client == 1)
                            <?php $is_notify_reserve_client_is_seen = true;?>
                        @endif

                    @endforeach
                @endif




                {{--owner notification--}}

                {{--rents--}}
                @if(!count($rents) && !count($rents_client) && !count($sales) && !count($reserves) && !count($sales_client) && !count($reserves_client))
                    <li>
                        <span class="message">No notification</span>
                    </li>

                @else
                    @foreach($rents as $rent)
                        @if($rent->is_seen == 0)
                            <li>
                                <a href="{{url('/owner/show_pending_rent_specific_billboard', [$rent->billboard_id, $rent->id, $rent->client_id])}}">
                                    <span class="message">{{App\User::findOrFail($rent->client_id)->first_name}} Rented Your Billboard</span>
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
                                    <span class="message">{{App\User::findOrFail($reserve->client_id)->first_name}} Reserve your Billboard</span>
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
                                <span class="message">{{App\User::findOrFail($rent->owner_id)->first_name}} View Rent Request</span>
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
                                <span class="message">{{App\User::findOrFail($sale->owner_id)->first_name}} View Sales Request</span>
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
                    <li><a href="{{url('/owner/show_subscription')}}">Subscription</a></li>
                    <li><a href="{{url('/owner/show/adspace_purchased')}}">Purchased</a></li>

                    <hr>

                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My Post</a></li>
                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">Available Post</a></li>

                    <hr>

                    {{--<li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">Mga Renta og Sale og Reserve</a></li>--}}
                    <li><a href="{{url('/show_all_rented')}}">For Rent</a></li>
                    <li><a href="{{url('/owner/show_all_sale')}}">For Sale</a></li>

                    <hr>

                    {{--<li><a href="{{url('/owner/show_all_reserve_billboard')}}">Mga Reserve</a></li>--}}

                    <li><a href="{{url('/owner/show_all_rented_billboard')}}">Rented</a></li>
                    <li><a href="{{url('/owner/show_all_sale_billboard')}}">Sold</a></li>
                    <li><a href="{{url('/owner/show_all_reserve_billboard')}}">Reserved</a></li>

                @endif

                @if(Auth::user()->role_id == 2)
                    <li><a href="{{url('/client/show/profile')}}">Show Profile</a></li>

                    <hr>

                    {{--<li><a href="{{url('/client/available_post')}}">Available Ad Spaces</a></li>--}}
                    <li><a href="{{url('/client/show_available_rent')}}">For Rent</a></li>
                    <li><a href="{{url('/client/show_available_sales')}}">For Sale</a></li>

                    <hr>

                    <li><a href="{{url('/client/show_my_all_rent')}}">My Rental</a></li>
                    <li><a href="{{url('/client/show_my_all_sale')}}">My Sales</a></li>
                    <li><a href="{{url('/client/show_my_all_reserve')}}">My Reservation</a></li>
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

        @if(Auth::user()->role_id == 2)

            <?php $table_sales = \App\Sale::where('client_id', Auth::id())->get()?>
            <?php $table_rents = \App\Rent::where('client_id', Auth::id())->get()?>

            <h1 style="color: black">Adspace Purchased</h1>
            <br>

            <h2>All Bought</h2>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><h4>Owner</h4></th>
                    <th><h4>AdSpace Type</h4></th>
                    <th><h4>Advertising Type</h4></th>
                    <th><h4>Size</h4></th>
                    <th><h4>Location</h4></th>
                    <th><h4>Price</h4></th>
                </tr>
                </thead>
                <tbody>

                <?php $total_sale_table = 0?>
                @foreach($table_sales as $table_sale)
                    <?php $user_table = \App\User::whereId($table_sale->owner_id)->first()?>
                    <?php $adspace_table = \App\Adspace::whereId($table_sale->billboard_id)->first()?>
                    <tr>
                        <td>{{$user_table->first_name}}</td>
                        <td>{{$adspace_table->adspace_type}}</td>
                        <td class="text-right">{{$adspace_table->advertising_type}}</td>
                        <td class="text-right">{{$adspace_table->size}}</td>
                        <td class="text-right">{{$adspace_table->location}}</td>
                        <td class="text-right">&#8369;{{$adspace_table->price}}</td>

                    </tr>
                    <?php $total_sale_table+=$adspace_table->price?>
                @endforeach

                </tbody>



            </table>



            <div class="row text-right">
                <div class="col-xs-2 col-xs-offset-8">
                    <p>
                        <strong>
                            {{--Sub Total : <br>--}}
                            {{--TAX : <br>--}}
                            Total : <br>
                        </strong>
                    </p>
                </div>
                <div class="col-xs-2">
                    <strong>
                        {{--$1200.00 <br>--}}
                        {{--N/A <br>--}}
                        &#8369;{{$total_sale_table}} <br>
                    </strong>
                </div>
            </div>




            <h2>All Rented</h2>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><h4>Owner</h4></th>
                    <th><h4>AdSpace Type</h4></th>
                    <th><h4>Advertising Type</h4></th>
                    <th><h4>Size</h4></th>
                    <th><h4>Location</h4></th>
                    <th><h4>Price</h4></th>
                </tr>
                </thead>
                <tbody>
                <?php $total_rent_table = 0?>
                @foreach($table_rents as $table_rent)
                    <?php $user_table_rent = \App\User::whereId($table_rent->owner_id)->first()?>
                    <?php $adspace_table_rent = \App\Adspace::whereId($table_rent->billboard_id)->first()?>
                    <tr>
                        <td>{{$user_table_rent->first_name}}</td>
                        <td>{{$adspace_table_rent->adspace_type}}</td>
                        <td class="text-right">{{$adspace_table_rent->advertising_type}}</td>
                        <td class="text-right">{{$adspace_table_rent->size}}</td>
                        <td class="text-right">{{$adspace_table_rent->location}}</td>
                        <td class="text-right">&#8369;{{$adspace_table_rent->price}}</td>

                    </tr>
                    <?php $total_rent_table+=$adspace_table_rent->price?>
                @endforeach

                </tbody>
            </table>

            <div class="row text-right">
                <div class="col-xs-2 col-xs-offset-8">
                    <p>
                        <strong>
                            {{--Sub Total : <br>--}}
                            {{--TAX : <br>--}}
                            Total : <br>
                        </strong>
                    </p>
                </div>
                <div class="col-xs-2">
                    <strong>
                        {{--$1200.00 <br>--}}
                        {{--N/A <br>--}}
                        &#8369;{{$total_rent_table}} <br>
                    </strong>
                </div>
            </div>

            <br>

            <div class="row text-right">
                <div class="col-xs-2 col-xs-offset-8">
                    <p>
                        <strong>
                            {{--Sub Total : <br>--}}
                            {{--TAX : <br>--}}
                            Total All: <br>
                        </strong>
                    </p>
                </div>
                <div class="col-xs-2">
                    <strong>
                        {{--$1200.00 <br>--}}
                        {{--N/A <br>--}}
                        &#8369;{{$total_rent_table+$total_sale_table}} <br>
                    </strong>
                </div>
            </div>

        @endif











        {{--<table class="table">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>Owner</th>--}}
        {{--<th>AdSpace Type</th>--}}
        {{--<th>Advertising Type</th>--}}
        {{--<th>Size</th>--}}
        {{--<th>Location</th>--}}
        {{--<th>Price</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--<tr>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>john@example.com</td>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>1000</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Mary</td>--}}
        {{--<td>Moe</td>--}}
        {{--<td>mary@example.com</td>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>1000</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>July</td>--}}
        {{--<td>Dooley</td>--}}
        {{--<td>july@example.com</td>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>1000</td>--}}
        {{--</tr>--}}

        {{--<tr>--}}
        {{--<td>July</td>--}}
        {{--<td>Dooley</td>--}}
        {{--<td>july@example.com</td>--}}
        {{--<td>John</td>--}}
        {{--<td>Doe</td>--}}
        {{--<td>1000</td>--}}
        {{--</tr>--}}


        {{--</tbody>--}}


        {{--</table>--}}
    </div>
@endsection