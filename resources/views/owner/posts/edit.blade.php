@extends('layouts.masterlayoutadgency')

@section('title')
    Edit Post
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


    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">

        <h1 style="color: black">Update Post</h1>

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
            {!! Form::select('adspace_type', ['lamp' => 'Lamp', 'bus' => 'Bus', 'billboard' => 'Billboard','led' => 'LED','jeep' => 'Jeep','taxi' => 'Taxi','poster' => 'Poster'],null, ['class'=>'form-control', 'placeholder' => 'Select...']) !!}
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

        {{--submit--}}
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection