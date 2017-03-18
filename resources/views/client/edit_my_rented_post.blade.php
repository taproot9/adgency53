@extends('layouts.masterlayoutadgency')

@section('title')
    Edit My Rented Post
@endsection

@section('nav')

    <li class="active"><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
    <li><a href="{{url('/about_us')}}">About Us</a></li>
    <li><a href="{{url('/contact')}}">Contact</a></li>


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
                                    <span class="message">{{App\User::findOrFail($sale->client_id)->first_name}} Bought Adspace</span>
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
                {{--@if($rents_client == null)--}}
                    {{--<li>--}}
                        {{--<span class="message">No notification</span>--}}
                    {{--</li>--}}

                {{--@else--}}
                    {{--@foreach($rents_client as $rent)--}}
                        {{--@if($rent->is_seen == 1)--}}
                            {{--<li>--}}
                                {{--<a href="{{url('/owner/show_pending_rent_specific_billboard', [$rent->billboard_id, $rent->id, $rent->client_id])}}">--}}
                                {{--<span class="message">{{App\User::findOrFail($rent->owner_id)->first_name}} View Rent Request</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--@endif--}}




                {{--sales--}}
                {{--@if($sales_client == null)--}}
                    {{--<li>--}}
                        {{--<span class="message">No notification</span>--}}
                    {{--</li>--}}

                {{--@else--}}
                    {{--@foreach($sales_client as $sale)--}}
                        {{--@if($sale->is_seen == 1)--}}
                            {{--<li>--}}
                                {{--<a href="{{url('/owner/show_pending_sale_specific_billboard', [$sale->billboard_id, $sale->id, $sale->client_id])}}">--}}
                                {{--<span class="message">{{App\User::findOrFail($sale->owner_id)->first_name}} View Sales Request</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--@endif--}}

                {{--reservation--}}

                {{--@if($reserves_client == null)--}}
                    {{--<li>--}}
                        {{--<span class="message">No notification</span>--}}
                    {{--</li>--}}

                {{--@else--}}
                    {{--@foreach($reserves_client as $reserve)--}}

                        {{--@if($reserve->is_seen == 1)--}}
                            {{--<li>--}}
                                {{--<a href="{{url('/owner/show_pending_reserved_specific_billboard', [$reserve->billboard_id, $reserve->id, $reserve->client_id])}}">--}}
                                {{--<span class="message">{{App\User::findOrFail($reserve->owner_id)->first_name}} Accept Reserve Request</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endif--}}

                    {{--@endforeach--}}
                {{--@endif--}}




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
                    <li><a href="{{url('/owner/show_subscription')}}">Subscription</a></li>


                    <hr>

                    <li><a href="{{url('/owner/create_posts')}}">Add Advertising Media</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My Advertising Media</a></li>
                    <li><a style="font-size: smaller" href="{{url('/owner/my_post', Auth::user()->id )}}">Available Advertising Media</a></li>

                    {{----}}
                    {{--<hr>--}}

                    {{--<li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">Mga Renta og Sale og Reserve</a></li>--}}
                    {{--<li><a href="{{url('/show_all_rented')}}">For Rent</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_sale')}}">For Sale</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/owner/show_all_reserve_billboard')}}">Mga Reserve</a></li>--}}

                    {{--<li><a href="{{url('/owner/show_all_rented_billboard')}}">Rented</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_sale_billboard')}}">Sold</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_reserve_billboard')}}">Reserved</a></li>--}}
                    {{----}}
                    {{----}}

                @endif

                @if(Auth::user()->role_id == 2)
                    <li><a href="{{url('/client/show/profile')}}">Show Profile</a></li>
                    <li><a href="{{url('/client/show/adspace_purchased')}}">Purchased</a></li>



                    {{--<li><a href="{{url('/client/available_post')}}">Available Ad Spaces</a></li>--}}

                    {{--<li><a href="{{url('/client/show_available_rent')}}">For Rent</a></li>--}}
                    {{--<li><a href="{{url('/client/show_available_sales')}}">For Sale</a></li>--}}

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


    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">

        <h1 style="color: black">Edit Post</h1>

        <div>
            <img id ="showimages" class="img-responsive img-rounded" src="{{$ad_space->photo_name ? $ad_space->photo_name : 'http://placehold.it/400x400'}}" alt="">
        </div>

        {!! Form::model($ad_space,['method'=>'PATCH', 'action'=>['OwnersPostsController@update_post', $ad_space->id],'files' => true]) !!}

        {{csrf_field()}}


        {{--upload a billoard--}}
        <div class="form-group">
            {!! Form::label('photo_name', 'Upload Billboard:') !!}
            {!! Form::file('photo_name', ['id'=>'inputimages']) !!}
        </div>

        {{--select advertising_type--}}
        <div class="form-group">
            {!! Form::label('advertising_type', 'Type for Operation:') !!}
            {!! Form::select('advertising_type', ['sale' => 'for Sale', 'rent' => 'for Rent'],null, ['class'=>'form-control', 'placeholder' => 'Select...']) !!}
        </div>

        {{--select a type--}}
        <div class="form-group">
            {!! Form::label('adspace_type', 'Select Type:') !!}
            {!! Form::select('adspace_type', ['lamp' => 'Lamp', 'bus' => 'Bus'],null, ['class'=>'form-control', 'placeholder' => 'Select...']) !!}
        </div>

        {{--size--}}
        <div class="form-group">
            {!! Form::label('size', 'Size: (meter)') !!}
            {!! Form::text('size', null, ['class'=>'form-control', 'placeholder' => 'ex. 100 x 100']) !!}
        </div>

        {{--Location--}}
        <div class="form-group">
            {!! Form::label('location', 'Location:') !!}
            {!! Form::text('location', null, ['class'=>'form-control']) !!}
        </div>

        {{--Price--}}
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class'=>'form-control','placeholder' => 'Peso']) !!}
        </div>

        {{--Rent Price--}}
        {{--<div class="form-group">--}}
        {{--{!! Form::label('rent_price', 'Rent Price:') !!}--}}
        {{--{!! Form::text('rent_price', null, ['class'=>'form-control']) !!}--}}
        {{--</div>--}}

        {{--Status--}}
        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'],$ad_space->status, ['class'=>'form-control'] ) !!}
        </div>

        {{--submit--}}
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary pull-left']) !!}
        </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=>['ClientController@delete_my_rented_post', $ad_space->id]])!!}

        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-primary pull-right']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection