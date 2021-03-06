<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Adgency Admin Home</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Ryan">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="{{asset('admin_style/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_style/css/bootstrap-responsive.min.css/')}}" rel="stylesheet">
    <link id="base-style" href="{{asset('admin_style/css/style.css')}}" rel="stylesheet">
    <link id="base-style-responsive" href="{{asset('admin_style/css/style-responsive.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="{{asset('admin_style/css/ie.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="{{asset('admin_style/css/ie9.css')}}" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="{{asset('admin_style/img/favicon.ico')}}">
    <!-- end: Favicon -->




</head>

<body>
<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <!--<a class="brand" href="index.html"><span>AdGency</span></a>-->
            <a class="brand" href="{{url('/admin_home')}}"><img src="{{asset('admin_style/img/logo1.png')}}" alt="logo"></a>

            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    {{--<li class="dropdown hidden-phone">--}}
                        {{--<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">--}}
                            {{--<i class="icon-bell"></i>--}}
                            {{--<span class="badge red">--}}
								{{--7 </span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu notifications">--}}
                            {{--<li class="dropdown-menu-title">--}}
                                {{--<span>You have 11 notifications</span>--}}
                                {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon blue"><i class="icon-user"></i></span>--}}
                                    {{--<span class="message">New user registration</span>--}}
                                    {{--<span class="time">1 min</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
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
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon green"><i class="icon-comment-alt"></i></span>--}}
                                    {{--<span class="message">New comment</span>--}}
                                    {{--<span class="time">16 min</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon blue"><i class="icon-user"></i></span>--}}
                                    {{--<span class="message">New user registration</span>--}}
                                    {{--<span class="time">36 min</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon yellow"><i class="icon-shopping-cart"></i></span>--}}
                                    {{--<span class="message">2 items sold</span>--}}
                                    {{--<span class="time">1 hour</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="warning">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon red"><i class="icon-user"></i></span>--}}
                                    {{--<span class="message">User deleted account</span>--}}
                                    {{--<span class="time">2 hour</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="warning">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon red"><i class="icon-shopping-cart"></i></span>--}}
                                    {{--<span class="message">New comment</span>--}}
                                    {{--<span class="time">6 hour</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon green"><i class="icon-comment-alt"></i></span>--}}
                                    {{--<span class="message">New comment</span>--}}
                                    {{--<span class="time">yesterday</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="icon blue"><i class="icon-user"></i></span>--}}
                                    {{--<span class="message">New user registration</span>--}}
                                    {{--<span class="time">yesterday</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown-menu-sub-footer">--}}
                                {{--<a>View all notifications</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- start: Notifications Dropdown -->--}}
                    {{--<li class="dropdown hidden-phone">--}}
                        {{--<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">--}}
                            {{--<i class="icon-calendar"></i>--}}
                            {{--<span class="badge red">--}}
								{{--5 </span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu tasks">--}}
                            {{--<li class="dropdown-menu-title">--}}
                                {{--<span>You have 17 tasks in progress</span>--}}
                                {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
										{{--<span class="header">--}}
											{{--<span class="title">iOS Development</span>--}}
											{{--<span class="percent"></span>--}}
										{{--</span>--}}
                                    {{--<div class="taskProgress progressSlim red">80</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
										{{--<span class="header">--}}
											{{--<span class="title">Android Development</span>--}}
											{{--<span class="percent"></span>--}}
										{{--</span>--}}
                                    {{--<div class="taskProgress progressSlim green">47</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
										{{--<span class="header">--}}
											{{--<span class="title">ARM Development</span>--}}
											{{--<span class="percent"></span>--}}
										{{--</span>--}}
                                    {{--<div class="taskProgress progressSlim yellow">32</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
										{{--<span class="header">--}}
											{{--<span class="title">ARM Development</span>--}}
											{{--<span class="percent"></span>--}}
										{{--</span>--}}
                                    {{--<div class="taskProgress progressSlim greenLight">63</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
										{{--<span class="header">--}}
											{{--<span class="title">ARM Development</span>--}}
											{{--<span class="percent"></span>--}}
										{{--</span>--}}
                                    {{--<div class="taskProgress progressSlim orange">80</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a class="dropdown-menu-sub-footer">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- end: Notifications Dropdown -->--}}
                    {{--<!-- start: Message Dropdown -->--}}
                    {{--<li class="dropdown hidden-phone">--}}
                        {{--<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">--}}
                            {{--<i class="icon-envelope"></i>--}}
                            {{--<span class="badge red">--}}
								{{--4 </span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu messages">--}}
                            {{--<li class="dropdown-menu-title">--}}
                                {{--<span>You have 9 messages</span>--}}
                                {{--<a href="#refresh"><i class="icon-repeat"></i></a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="avatar"><img src="{{asset('admin_style/img/avatar.jpg')}}" alt="Avatar"></span>--}}
                                    {{--<span class="header">--}}
											{{--<span class="from">--}}
										    	{{--Dennis Ji--}}
										     {{--</span>--}}
											{{--<span class="time">--}}
										    	{{--6 min--}}
										    {{--</span>--}}
										{{--</span>--}}
                                    {{--<span class="message">--}}
                                            {{--Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="avatar"><img src="{{asset('admin_style/img/avatar.jpg')}}" alt="Avatar"></span>--}}
                                    {{--<span class="header">--}}
											{{--<span class="from">--}}
										    	{{--Dennis Ji--}}
										     {{--</span>--}}
											{{--<span class="time">--}}
										    	{{--56 min--}}
										    {{--</span>--}}
										{{--</span>--}}
                                    {{--<span class="message">--}}
                                            {{--Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="avatar"><img src="{{asset('admin_style/img/avatar.jpg')}}" alt="Avatar"></span>--}}
                                    {{--<span class="header">--}}
											{{--<span class="from">--}}
										    	{{--Dennis Ji--}}
										     {{--</span>--}}
											{{--<span class="time">--}}
										    	{{--3 hours--}}
										    {{--</span>--}}
										{{--</span>--}}
                                    {{--<span class="message">--}}
                                            {{--Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="avatar"><img src="{{asset('admin_style/img/avatar.jpg')}}" alt="Avatar"></span>--}}
                                    {{--<span class="header">--}}
											{{--<span class="from">--}}
										    	{{--Dennis Ji--}}
										     {{--</span>--}}
											{{--<span class="time">--}}
										    	{{--yesterday--}}
										    {{--</span>--}}
										{{--</span>--}}
                                    {{--<span class="message">--}}
                                            {{--Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<span class="avatar"><img src="{{asset('admin_style/img/avatar.jpg')}}" alt="Avatar"></span>--}}
                                    {{--<span class="header">--}}
											{{--<span class="from">--}}
										    	{{--Dennis Ji--}}
										     {{--</span>--}}
											{{--<span class="time">--}}
										    	{{--Jul 25, 2012--}}
										    {{--</span>--}}
										{{--</span>--}}
                                    {{--<span class="message">--}}
                                            {{--Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore--}}
                                        {{--</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a class="dropdown-menu-sub-footer">View all messages</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> {{Auth::guard('admin')->user()->name}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                <span>Account Settings</span>
                            </li>
                            <li><a href="{{url('admin_show_profile')}}"><i class="halflings-icon user"></i> Profile</a></li>
                            {{--<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>--}}

                            <li>
                                <a href="{{ url('/admin_logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="halflings-icon off"></i>
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/admin_logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>


                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="{{url('admin_home')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>


                    <li><a href="{{url('admin/subscription')}}"><i class="icon-star"></i><span class="hidden-tablet"> Subscription</span></a></li>
                    <li><a href="{{url('admin/users_account')}}"><i class="icon-user"></i><span class="hidden-tablet"> Account</span></a></li>
                    <li><a href="{{url('admin/all_adspace')}}"><i class="icon-road"></i><span class="hidden-tablet"> Adspace</span></a></li>
                    <li><a href="{{url('admin/rental')}}"><i class="icon-hdd"></i><span class="hidden-tablet"> Rental</span></a></li>
                    <li><a href="{{url('admin/sale')}}"><i class="icon-th"></i><span class="hidden-tablet"> Sales</span></a></li>
                    <li><a href="{{url('admin/reserve')}}"><i class="icon-bookmark"></i><span class="hidden-tablet"> Reservation</span></a></li>

                    <!--<li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>-->
                    <!--<li><a href="tasks.html"><i class="icon-tasks"></i><span class="hidden-tablet"> Tasks</span></a></li>-->
                    <!--<li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>-->
                    <!--<li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>-->
                    <!--<li>-->
                    <!--<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>-->
                    <!--<ul>-->
                    <!--<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>-->
                    <!--<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>-->
                    <!--<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>-->
                    <!--</ul>	-->
                    <!--</li>-->
                    <!--<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>-->
                    <!--<li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>-->
                    <!--<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>-->
                    <!--<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>-->
                    <!--<li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>-->
                    <!--<li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>-->
                    <!--<li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>-->
                    <!--<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>-->
                    <!--<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>-->
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="{{url('admin_home')}}">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="{{url('admin_home')}}">Dashboard</a></li>
            </ul>

            <div class="row-fluid">

                <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
                    <?php $subsss = \App\Subscription::count();?>
                    <div class="number">{{$subsss}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Subscriptions</div>
                    <div class="footer">
                        <a href="{{url('admin/subscription')}}"> read full report</a>
                    </div>
                </div>
                <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">1,2,3,4,0,8,2,4,5,3,1,7,5</div>
                    <div class="number">{{$users}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Accounts</div>
                    <div class="footer">
                        <a href="{{url('admin/users_account')}}"> read full report</a>
                    </div>
                </div>
                <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
                    <div class="number">{{$ad_spaces}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Adspaces</div>
                    <div class="footer">
                        <a href="{{url('admin/all_adspace')}}"> read full report</a>
                    </div>
                </div>

                <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
                    <?php $adspace = App\Adspace::where('advertising_type', 'rent')->where('status', 0)->get() ?>
                    <div class="number">{{$adspace->count()}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Rental</div>
                    <div class="footer">
                        <a href="{{url('admin/rental')}}"> read full report</a>
                    </div>
                </div>


            </div>

            <div class="row-fluid">
                <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
                    <?php $adspace = App\Adspace::where('advertising_type', 'sale')->where('status', 0)->get() ?>
                    <div class="number">{{$adspace->count()}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Sale</div>
                    <div class="footer">
                        <a href="{{url('admin/sale')}}"> read full report</a>
                    </div>
                </div>

                <div class="span3 statbox blue" onTablet="span6" onDesktop="span3">
                    <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
                    <?php $reservation = App\Reservation::where('is_seen', 1)->get() ?>
                    <div class="number">{{$reservation->count()}}<i class="icon-arrow-up"></i></div>
                    <div class="title">Reservations</div>
                    <div class="footer">
                        <a href="{{url('admin/reserve')}}"> read full report</a>
                    </div>
                </div>
            </div>



        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Settings</h3>
    </div>
    <div class="modal-body">
        <p>Here settings can be configured...</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div>

<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <ul class="list-inline item-details">
            <li><a href="http://themifycloud.com">Admin templates</a></li>
            <li><a href="http://themescloud.org">Bootstrap themes</a></li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>

<footer>

    <p>
        <span style="text-align:left;float:left">&copy; 2016 <a href="#" alt="AdGency">AdGency</a></span>

    </p>

</footer>

<!-- start: JavaScript-->

<script src="{{asset('admin_style/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('admin_style/js/jquery-migrate-1.0.0.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery-ui-1.10.0.custom.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.ui.touch-punch.js')}}"></script>

<script src="{{asset('admin_style/js/modernizr.js')}}"></script>

<script src="{{asset('admin_style/js/bootstrap.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.cookie.js')}}"></script>

<script src='{{asset('admin_style/js/fullcalendar.min.js')}}'></script>

<script src='{{asset('admin_style/js/jquery.dataTables.min.js')}}'></script>

<script src="{{asset('admin_style/js/excanvas.js')}}"></script>
<script src="{{asset('admin_style/js/jquery.flot.js')}}"></script>
<script src="{{asset('admin_style/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin_style/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('admin_style/js/jquery.flot.resize.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.chosen.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.uniform.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.cleditor.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.noty.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.elfinder.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.raty.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.iphone.toggle.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.uploadify-3.1.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.gritter.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.imagesloaded.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.masonry.min.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.knob.modified.js')}}"></script>

<script src="{{asset('admin_style/js/jquery.sparkline.min.js')}}"></script>

<script src="{{asset('admin_style/js/counter.js')}}"></script>

<script src="{{asset('admin_style/js/retina.js')}}"></script>

<script src="{{asset('admin_style/js/custom.js')}}"></script>
<!-- end: JavaScript-->

</body>
</html>
