@extends('layouts.masterlayoutadgency', ['signupactive' => 'active'])

@section('title')
    Add Post
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

        <h1 style="color: black">Create Post</h1>

        <div>
            <img id ="showimages" class="img-responsive img-rounded" src="{{$ad_space->photo_name ? $ad_space->photo_name : 'http://placehold.it/400x400'}}" alt="">
        </div>

        {!! Form::model($ad_space,['method'=>'PATCH', 'action'=>['OwnersPostsController@update_post', $ad_space->id],'files' => true]) !!}

        {{csrf_field()}}

        {{--upload a billoard--}}
        <div class="form-group">
            {!! Form::label('photo_name', 'Upload Billboard:') !!}
            {!! Form::file('photo_name',['id'=>'inputimages'] ) !!}
        </div>

        {{--select a type--}}
        <div class="form-group">
            {!! Form::label('type', 'Select Type:') !!}
            {!! Form::select('type', ['lamp' => 'Lamp', 'bus' => 'Bus'],null, ['class'=>'form-control', 'placeholder' => 'Pick a type...']) !!}
        </div>

        {{--size--}}
        <div class="form-group">
            {!! Form::label('size', 'Size:') !!}
            {!! Form::text('size', null, ['class'=>'form-control']) !!}
        </div>

        {{--Location--}}
        <div class="form-group">
            {!! Form::label('location', 'Location:') !!}
            {!! Form::text('location', null, ['class'=>'form-control']) !!}
        </div>

        {{--Price--}}
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', null, ['class'=>'form-control']) !!}
        </div>

        {{--Rent Price--}}
        <div class="form-group">
            {!! Form::label('rent_price', 'Rent Price:') !!}
            {!! Form::text('rent_price', null, ['class'=>'form-control']) !!}
        </div>

        {{--submit--}}
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@endsection