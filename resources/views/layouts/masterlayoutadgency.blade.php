<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') | Adgency</title>

    <!-- core CSS -->
    <link href="{{asset('adgencystyles/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adgencystyles/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('adgencystyles/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('adgencystyles/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('adgencystyles/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('adgencystyles/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('adgencystyles/js/html5shiv.js')}}"></script>
    <script src="{{asset('adgencystyles/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('adgencystyles/images/ico/favicon2.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('adgencystyles/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('adgencystyles/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('adgencystyles/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('adgencystyles/images/ico/apple-touch-icon-57-precomposed.png')}}">



    <style type="text/css">


        .hover-item {
            background-color: gold;
        }

        .hover-item:hover {
            background-color: inherit;
        }



        .single-blog {
            margin-bottom: 30px;
            background-color: #F7F7F7;
            padding: 25px;
            transition: all 1s ease 0s;
            -moz-transition: all 1s ease 0s;
            -webkit-transition: all 1s ease 0s;
            -o-transition: all 1s ease 0s;
            -webkit-box-shadow: 0 2px 0 0 #ddd;
            box-shadow: 0 2px 0 0 #ddd;
        }

        .single-blog:hover {
            background-color: #43484E;
            color: #fff
        }

        .single-blog:hover.single-blog h2 {
            color: #fff
        }

        .single-blog:hover.single-blog .btn-primary {
            background-color: #fc7700;
            color: #fff;
            border-color: #fff;
            transition: all 0.9s ease 0s;
            -moz-transition: all 0.9s ease 0s;
            -webkit-transition: all 0.9s ease 0s;
            -o-transition: all 0.9s ease 0s;
        }

        .single-blog img {
            width: 100%;
            margin-bottom: 20px
        }

        .single-blog h2 {
            color: #43484E;
            font-size: 24px;
        }

        .single-blog h2 {
            margin: 0;
            margin-bottom: 15px;
        }

        .single-blog ul {
            padding: 0;
            overflow: hidden;
        }

        .single-blog ul li {
            border-right: 2px solid #999999;
            float: left;
            line-height: 10px;
            list-style: none;
            margin-right: 10px;
            padding-right: 10px;
            font-size: 12px;
            color: #999;
        }

        .single-blog ul li:last-child {
            border: none;
        }

        .single-blog .btn-primary {
            text-transform: uppercase;
            border: 1px solid #fc7700;
            color: #686868;
            background-color: rgba(255, 255, 255, 0);
            border-color: #fc7700;
        }

        .single-blog:hover.single-blog .btn-primary:hover {
            background-color: #fc7700;
            color: #fff;
        }


        .search_box input {
            background: #F0F0E9;
            border: medium none;
            color: #B2B2B2;
            font-family: 'roboto';
            font-size: 12px;
            font-weight: 300;
            height: 35px;
            outline: medium none;
            padding-left: 10px;
            width: 155px;
            background-image: url({{asset('adgencystyles/images/home/searchicon.png')}});

            background-repeat: no-repeat;
            background-position: 130px;
        }


        .mainmenu ul li a:hover, .mainmenu ul li a.active,  .shop-menu ul li a.active{
            background:none;
            color:#c52d2f;
        }

        .picPost{
            height: 210px;
            width: 320px;
        }

        .single-blog a.btn.btn-primary:hover
        {
            background-color: #c52d2f!important;
        }

        .single-blog button.btn.btn-primary:hover
        {
            background-color: #c52d2f!important;
        }

        /*.btn .badge {*/
        /*position: relative;*/
        /*top: -15px;*/
        /*}*/
        /*.badge {*/
        /*background-color: #c52d2f;*/
        /*border-radius: 5px;*/
        /*color: #fff;*/
        /*padding: 8px;*/
        /*position: relative;*/
        /*left: -34px;*/
        /*top: -18px;*/
        /*font-weight: normal;*/
        /*}*/

    </style>

</head><!--/head-->

<body class="homepage">

<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>  +63 9321 786 301</p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="https://www.facebook.com/Adgency-272101273221324/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('adgencystyles/images/logo1.png')}}" alt="logo"></a>
                <!--<a class="navbar-brand" href="index.html">AdGency</a>-->
            </div>


            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
                    @yield('nav')
                </ul>
            </div>

        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->

@yield('content')
<section id="bottom">
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">We are hiring</a></li>
                        <li><a href="#">Meet the team</a></li>
                        <li><a href="#">Copyright</a></li>
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Faq</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Refund policy</a></li>
                        <li><a href="#">Ticket system</a></li>
                        <li><a href="#">Billing system</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Developers</h3>
                    <ul>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">SEO Marketing</a></li>
                        <li><a href="#">Theme</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Email Marketing</a></li>
                        <li><a href="#">Plugin Development</a></li>
                        <li><a href="#">Article Writing</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>Our Partners</h3>
                    <ul>
                        <li><a href="#">Adipisicing Elit</a></li>
                        <li><a href="#">Eiusmod</a></li>
                        <li><a href="#">Tempor</a></li>
                        <li><a href="#">Veniam</a></li>
                        <li><a href="#">Exercitation</a></li>
                        <li><a href="#">Ullamco</a></li>
                        <li><a href="#">Laboris</a></li>
                    </ul>
                </div>
            </div><!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 <a target="_blank" href="http://adgency.dev/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">AdGency</a>. All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

@yield('jss')

<script src="{{asset('adgencystyles/js/jquery.js')}}"></script>
<script src="{{asset('adgencystyles/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adgencystyles/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('adgencystyles/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('adgencystyles/js/main.js')}}"></script>
<script src="{{asset('adgencystyles/js/wow.min.js')}}"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showimages').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#inputimages").change(function () {
        readURL(this);
    });


//    rents

    @if(Auth::check())
        @if(Auth::user()->role_id == 2)
            @if(count($rents_client))
                @if($is_notify_client_is_seen)
                $('#isActive').removeClass('active');
                @else
                    @if(count($rents_client) && $is_notify_client)
                    $('#isActive').addClass('active');
                    $('#btnCLick').click(function () {
                    $('#isActive').removeClass('active');
                    <?php $rent_client_seen = \App\Rent::where('client_id', Auth::user()->id)->update(['is_seen_client'=> 1]);?>
        //            $(this).addClass('dropdown');
        //            $('#message_reserve').text("Hello world!");
                    });
                    @endif
                @endif
            @endif
        @endif
    @endif


    //    owner notification
    @if(Auth::check())

            @if(Auth::user()->role_id == 3)

                @if(count($rents) && $is_notify_owner)

                $('#isActive').addClass('active');

                $('#btnCLick').click(function () {
                    $('#isActive').removeClass('active');
        //            $(this).addClass('dropdown');
        //            $('#message_reserve').text("Hello world!");
                });

                @endif
            @endif
    @endif


//    sales

    @if(Auth::check())
        @if(Auth::user()->role_id == 2)
            @if(count($sales_client))
                @if($is_notify_sales_client_is_seen)
                 $('#isActive').removeClass('active');
                @else
                    @if(count($sales_client) && $is_notify_sales_client)
                        $('#isActive').addClass('active');
                        $('#btnCLick').click(function () {
                            $('#isActive').removeClass('active');
                            <?php \App\Sale::where('client_id', Auth::user()->id)->update(['is_seen_client'=> 1]);?>
            //            $(this).addClass('dropdown');
            //            $('#message_reserve').text("Hello world!");
                        });
                    @endif
                @endif
            @endif
        @endif
    @endif


        //    owner notification
        @if(Auth::check())

            @if(Auth::user()->role_id == 3)

                @if(count($sales) && $is_notify_owner_sales)

                    $('#isActive').addClass('active');

                    $('#btnCLick').click(function () {
                        $('#isActive').removeClass('active');
            //            $(this).addClass('dropdown');
            //            $('#message_reserve').text("Hello world!");
                    });

                @endif
            @endif
        @endif



    //    reservation

        @if(Auth::check())
            @if(Auth::user()->role_id == 2)
                @if(count($reserves_client))
                    @if($is_notify_reserve_client_is_seen)
                    $('#isActive').removeClass('active');
                    @else
                        @if(count($reserves_client) && $is_notify_reserve_client)
                        $('#isActive').addClass('active');
                        $('#btnCLick').click(function () {
                        $('#isActive').removeClass('active');
                        <?php \App\Reservation::where('client_id', Auth::user()->id)->update(['is_seen_client'=> 1]);?>
            //            $(this).addClass('dropdown');
            //            $('#message_reserve').text("Hello world!");
                        });

                        @endif
                    @endif
                @endif
            @endif
        @endif

        //    owner notification
        @if(Auth::check())

            @if(Auth::user()->role_id == 3)

                @if(count($reserves) && $is_notify_owner_reserves)

                    $('#isActive').addClass('active');

                    $('#btnCLick').click(function () {
                        $('#isActive').removeClass('active');
            //            $(this).addClass('dropdown');
            //            $('#message_reserve').text("Hello world!");
                    });

                @endif
            @endif
        @endif



        {{--@if(Auth::user()->role_id == 3) // check if owner--}}

        {{--@if($ok == "ok")--}}

        {{--$('#isActive').addClass('active');--}}

        {{--$('#isActive').click(function () {--}}
        {{--$(this).removeClass('active');--}}
        {{--//            $(this).addClass('dropdown');--}}
        {{--//            $('#message_reserve').text("Hello world!");--}}
        {{--});--}}

        {{--@endif--}}
        {{--@endif--}}

    </script>

    <script type="text/javascript">
        $(document).ready(function(){ //Make script DOM ready
            $('#role').change(function() { //jQuery Change Function
                var opval = $(this).val(); //Get value from select element
                if(opval=="3"){ //Compare it and if true
                    $('#gridSystemModal').modal("show"); //Open Modal
                }
            });
        });
    </script>

<script type="text/javascript">
    $(function(){
        //initially hide the textbox
        $("#other_reason").hide();
        $('#i_n_r_reason').change(function() {
            if($(this).find('option:selected').val() == "Other"){
                $("#other_reason").show();
            }else{
                $("#other_reason").hide();
            }
        });
        $("#other_reason").keyup(function(ev){
            var othersOption = $('#i_n_r_reason').find('option:selected');
            if(othersOption.val() == "Other")
            {
                ev.preventDefault();
                //change the selected drop down text
                $(othersOption).html($("#other_reason").val());
            }
        });
        $('#form_id').submit(function() {
            var othersOption = $('#i_n_r_reason').find('option:selected');
            if(othersOption.val() == "Other")
            {
                // replace select value with text field value
                othersOption.val($("#other_reason").val());
            }
        });
    });
</script>

    </body>
    </html>