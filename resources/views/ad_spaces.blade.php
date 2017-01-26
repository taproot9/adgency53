@extends('layouts.masterlayoutadgency')

@section('title')
    AdSpaces
@endsection


@section('nav')

    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active"><a href="{{url('/ad_spaces')}}">AdSpaces</a></li>
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

                    <li><a href="#">My Post</a></li>
                    <li><a href="{{url('/owner/create_posts')}}">Add Post</a></li>
                    <li><a href="#">Subscription</a></li>
                    <li><a href="#">General</a></li>

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

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/bus.jpg')}}" alt=""/>
                <h2>Type: Bus</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary">Interested</a>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/lmpost.jpg')}}" alt=""/>
                <h2>Type: Lamp Post</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-two">Read More</a>
            </div>
            <div class="modal fade" id="blog-two" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <img src="{{asset('/adgencystyles/images/blog/3.jpg')}}" alt=""/>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/LED.jpg')}}" alt=""/>
                <h2>Type: LED</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-three">Read More</a>
            </div>
            <div class="modal fade" id="blog-three" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <img src="{{asset('adgencystyles/images/blog/3.jpg')}}" alt=""/>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/jeep.jpg')}}" alt=""/>
                <h2>Type: Jeep</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-four">Read More</a>
            </div>
            <div class="modal fade" id="blog-four" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <img src="{{asset('adgencystyles/images/blog/3.jpg')}}" alt=""/>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/taxi.jpg')}}" alt=""/>
                <h2>Type: Taxi</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-five">Read More</a>
            </div>
            <div class="modal fade" id="blog-five" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <img src="{{asset('adgencystyles/images/blog/3.jpg')}}" alt=""/>
                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="single-blog">
                <img class="picPost" src="{{asset('adgencystyles/images/blog/billboard.jpg')}}" alt=""/>
                <h2>Type: Billboard</h2>
                <p>Size: 55x40</p>
                <p>Location: R. Landon St. Cebu City</p>
                <p>Price: &#8369; 1000.00</p>
                <p>Rent Price: &#8369; 100.00</p>

                <ul class="post-meta">
                    <li><i class="fa fa-pencil-square-o"></i><strong> Posted By:</strong> John</li>
                    <li><i class="fa fa-clock-o"></i><strong> Posted On:</strong> Apr 15 2014</li>
                </ul>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#blog-six">Read More</a>
            </div>
            <div class="modal fade" id="blog-six" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <img src="{{asset('adgencystyles/images/blog/3.jpg')}}" alt=""/>

                            <h2>Lorem ipsum dolor sit amet</h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                                tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                                magna aliquam erat volutpat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                                sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                volutpat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
@endsection