@extends('layouts.masterlayoutadgency')

@section('title')
    Edit Post
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
        <li class="active"><a href="{{url('/login')}}">Login</a></li>
        <li><a href="{{url('/register')}}">SignUp</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">

                @if(Auth::user()->role_id == 3)

                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">My Availabe Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My All Post</a></li>

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


    <div class="container" style="width: 400px; padding-top: 70px; padding-bottom: 100px">

        <h1 style="color: black">Create Post</h1>

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
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection