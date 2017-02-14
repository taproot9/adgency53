@extends('layouts.masterlayoutadgency')

@section('title')
    Home
@endsection

@section('nav')

    <li class="active"><a href="{{url('/')}}">Home</a></li>
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
        <li><a href="{{url('/register')}}">SignUp</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">

                @if(Auth::user()->role_id == 3)

                    <li><a href="{{url('/owner/show/profile')}}">Show Profile</a></li>
                    <li><a href="{{url('/owner/my_post', Auth::user()->id )}}">My Available Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My All Post</a></li>
                    <li><a href="{{url('/show_all_rented')}}">Rented</a></li>

                @endif

                @if(Auth::user()->role_id == 2)
                    <li><a href="{{url('/client/show/profile')}}">Show Profile</a></li>
                    <li><a href="{{url('/client/available_post')}}">Available Billboard</a></li>
                    <li><a href="{{url('/client/show_available_rent')}}">Show Available Rent</a></li>
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
    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner text-center">

                <div class="item active"
                     style="background-image: url({{asset('adgencystyles/images/slider/bus6edit.jpg')}})">
                    <div class="container">
                        <div class="row slide-margin">

                            <div class="carousel-content t">
                                <h1 class="animation animated-item-1"><strong>Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit</strong></h1>
                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem
                                    aperiam, eaque ipsa...</h2>
                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                            </div>


                            <!--<div class="col-sm-6 hidden-xs animation animated-item-4">-->
                            <!--<div class="slider-img">-->
                            <!--<img src="images/slider/img1.png" class="img-responsive">-->
                            <!--</div>-->
                            <!--</div>-->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url({{asset('adgencystyles/images/slider/bg2.jpg')}})">
                    <div class="container">
                        <div class="row slide-margin">

                            <div class="carousel-content">
                                <h1 class="animation animated-item-1"><strong>Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit</strong></h1>
                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem
                                    aperiam, eaque ipsa...</h2>
                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                            </div>


                            <!--<div class="col-sm-6 hidden-xs animation animated-item-4">-->
                            <!--<div class="slider-img">-->
                            <!--<img src="images/slider/img2.png" class="img-responsive">-->
                            <!--</div>-->
                            <!--</div>-->

                        </div>
                    </div>
                </div><!--/.item-->

                <div class="item" style="background-image: url({{asset('adgencystyles/images/slider/bg3.jpg')}})">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h1 class="animation animated-item-1">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit</h1>
                                    <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem
                                        aperiam, eaque ipsa...</h2>
                                    <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                                </div>
                            </div>
                            <!--<div class="col-sm-6 hidden-xs animation animated-item-4">-->
                            <!--<div class="slider-img">-->
                            <!--<img src="images/slider/img3.png" class="img-responsive">-->
                            <!--</div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>
    </section><!--/#main-slider-->
@endsection