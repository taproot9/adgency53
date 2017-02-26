@extends('layouts.masterlayoutadgency')

@section('title')
    404
@endsection

@section('nav')
    {{--<li><a href="{{url('/')}}">Home</a></li>--}}
    {{--<li class="active"><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>--}}
    {{--<li><a href="about-us.html">About Us</a></li>--}}
    {{--<li><a href="contact-us.html">Contact</a></li>--}}



    {{--@if(Auth::guest())--}}
        {{--<li><a href="{{url('/login')}}">Login</a></li>--}}
        {{--<li><a href="{{url('/register')}}">SignUp</a></li>--}}
    {{--@else--}}
        {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                {{--{{ Auth::user()->first_name }} <span class="caret"></span>--}}
            {{--</a>--}}

            {{--<ul class="dropdown-menu" role="menu">--}}

                {{--@if(Auth::user()->role_id == 3)--}}

                    {{--<li><a href="{{url('/owner/show/profile')}}">Show Profile</a></li>--}}
                    {{--<li><a href="#">Subscription</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>--}}
                    {{--<li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My Post</a></li>--}}
                    {{--<li><a href="{{url('/owner/my_post', Auth::user()->id )}}">Available Post</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/show_all_rented')}}">For Rent</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_sale')}}">For Sale</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/owner/show_all_rented_billboard')}}">Rented</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_sale_billboard')}}">Sold</a></li>--}}
                    {{--<li><a href="{{url('/owner/show_all_reserve_billboard')}}">Reserved</a></li>--}}

                {{--@endif--}}

                {{--@if(Auth::user()->role_id == 2)--}}
                    {{--<li><a href="{{url('/client/show/profile')}}">Show Profile</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/client/available_post')}}">Available Ad Spaces</a></li>--}}
                    {{--<li><a href="{{url('/client/show_available_rent')}}">For Rent</a></li>--}}
                    {{--<li><a href="{{url('/client/show_available_sales')}}">For Sale</a></li>--}}

                    {{--<hr>--}}

                    {{--<li><a href="{{url('/client/show_my_all_rent')}}">My Rental</a></li>--}}
                    {{--<li><a href="{{url('/client/show_my_all_sale')}}">My Sales</a></li>--}}
                    {{--<li><a href="{{url('/client/show_my_all_reserve')}}">My Reservation</a></li>--}}
                {{--@endif--}}
                {{--<li>--}}

                    {{--<hr>--}}

                    {{--<a href="{{ url('/logout') }}"--}}
                       {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                        {{--Logout--}}
                    {{--</a>--}}

                    {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                        {{--{{ csrf_field() }}--}}
                    {{--</form>--}}
                {{--</li>--}}


            {{--</ul>--}}
        {{--</li>--}}
    {{--@endif--}}
@endsection

@section('content')

    <section id="error" class="container text-center">
        <h1>404, Page not found</h1>
        <p>The Page you are looking for doesn't exist or an other error occurred.</p>
        <a class="btn btn-primary" href="{{url('/')}}">GO BACK TO THE HOMEPAGE</a>
    </section><!--/#error-->

@endsection