@extends('layouts.masterlayoutadgency')

@section('title')
    My Profile
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
                        <span class="message">No Notification</span>
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
        <li class="active"><a href="{{url('/login')}}">Login</a></li>
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
                    <li><a href="{{url('/owner/my_all_post', Auth::user()->id )}}">My All Post</a></li>
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
        <div class="panel-group"
             style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="panel panel-primary">
                <div class="panel-heading" style="background-color: #191919">
                    <h2 style=" color: white; text-shadow: 2px 2px 4px #000000;">Edit Profile</h2>
                </div>
                <div class="panel-body">


                    {{--$table->string('first_name');--}}
                    {{--$table->string('last_name');--}}
                    {{--$table->string('email')->unique();--}}
                    {{--$table->string('address');--}}
                    {{--$table->string('contact');--}}
                    {{--$table->integer('role_id');--}}
                    {{--$table->integer('user_status_id')->default(1);--}}
                    {{--$table->string('password');--}}
                    {{--$table->string('photo_name');--}}
                    {{--$table->rememberToken();--}}
                    {{--$table->timestamps();--}}
                    <div class="control-group">
                        {{--<!--<img id ="showimages" class="img-responsive img-rounded" src="{{$ad_space->photo_name ? $ad_space->photo_name : 'http://placehold.it/400x400'}}" alt="">-->--}}
                        <img height="150px" width="150px" id ="showimages" class="img-responsive img-rounded" src="{{$user->photo_name ? $user->photo_name : 'http://placehold.it/400x400'}}" alt="">

                    </div>
                    {!! Form::model($user,['method'=>'PATCH', 'action'=>['OwnerController@owner_update_profile', $user->id],'files' => true],['class'=>'form-horizontal']) !!}

                    {{csrf_field()}}

                    {{--owner image--}}
                    <div class="control-group">
                        {!! Form::label('photo_name', ' Photo', ['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::file('photo_name', ['id'=>'inputimages'],['class'=>'input-file uniform_on']) !!}
                        </div>
                    </div>

                    {{--first name--}}
                    <div class="control-group">
                        {!! Form::label('first_name', 'First Name',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--lastname name--}}
                    <div class="control-group">
                        {!! Form::label('last_name', 'Last Name',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--email--}}
                    <div class="control-group">
                        {!! Form::label('email', 'Email',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('email', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--address--}}
                    <div class="control-group">
                        {!! Form::label('address', 'Address',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('address', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--contact--}}
                    <div class="control-group">
                        {!! Form::label('contact', 'Contact',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::text('contact', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--role_id--}}
                    {{--<div class="control-group">--}}
                    {{--{!! Form::label('role_id', 'Role',['class'=>'control-label']) !!}--}}
                    {{--<div class="controls">--}}
                    {{--{!! Form::select('role_id', ['2' => 'Client', '3' => 'Owner'], $user->role_id,['class'=>'form-control']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}


                    {{--passwordfield--}}
                    <div class="control-group">
                        {!! Form::label('password', 'Old Password',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::password('password',['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--passwordfield--}}
                    <div class="control-group">
                        {!! Form::label('newpassword', 'New Password',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::password('newpassword',['class'=>'form-control']) !!}
                        </div>

                    </div>

                    {{--passwordfield--}}
                    <div class="control-group">
                        {!! Form::label('confirmpassword', 'Confirm Password',['class'=>'control-label']) !!}
                        <div class="controls">
                            {!! Form::password('confirmpassword',['class'=>'form-control']) !!}
                        </div>

                    </div>

                    <div class="control-group">
                        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}




























                    {{--<form method="post" action="{{url('/register')}}">--}}

                    {{--{{csrf_field()}}--}}

                    {{--<div class="form-group">--}}
                    {{--<!--firstname-->--}}
                    {{--<label for="firstname"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-user"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="text" class="form-control" name="first_name" id="firstname"--}}
                    {{--placeholder="First Name" required>--}}
                    {{--</div>--}}

                    {{--<!--lastname-->--}}
                    {{--<label for="lastname"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-user"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="text" name="last_name" class="form-control" id="lastname"--}}
                    {{--placeholder="Last Name" required>--}}
                    {{--</div>--}}

                    {{--<!--email-->--}}
                    {{--<label for="email"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-envelope"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="email" name="email" class="form-control" id="email" placeholder="Email"--}}
                    {{--required>--}}
                    {{--</div>--}}

                    {{--<!--address-->--}}
                    {{--<label for="address"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-map-marker"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="text" name="address" class="form-control" id="address"--}}
                    {{--placeholder="Address" required>--}}
                    {{--</div>--}}

                    {{--<!--contact-->--}}
                    {{--<label for="contact"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-mobile"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="text" name="contact" class="form-control" id="contact"--}}
                    {{--placeholder="Contact" required>--}}
                    {{--</div>--}}

                    {{--<br>--}}

                    {{--<!--role-->--}}
                    {{--<label for="sel1">Select Role</label>--}}
                    {{--<div class="input-group">--}}

                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-users"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<select class="form-control" id="sel1" name="role_id">--}}
                    {{--<option value="2">Client</option>--}}
                    {{--<option value="3">Owner</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}

                    {{--<!--password-->--}}
                    {{--<label for="password"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-lock"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="password" name="password" class="form-control" id="password"--}}
                    {{--placeholder="Password" required>--}}
                    {{--@if ($errors->has('password'))--}}
                    {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                    {{--</span>--}}
                    {{--@endif--}}
                    {{--</div>--}}

                    {{--<!--confirm password-->--}}
                    {{--<label for="password-confirm"></label>--}}
                    {{--<div class="input-group">--}}
                    {{--<div class="input-group-addon"><i style="width: 30px" class="fa fa-lock"--}}
                    {{--aria-hidden="true"></i></div>--}}
                    {{--<input type="password" class="form-control" id="password-confirm"--}}
                    {{--name="password_confirmation" placeholder="Confirm Password" required>--}}
                    {{--</div>--}}


                    {{--</div>--}}

                    {{--<div class="row">--}}


                    {{--<button type="submit" class="btn btn-primary btn-md pull-right active"--}}
                    {{--style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">--}}
                    {{--Submit--}}
                    {{--</button>--}}

                    {{--</div>--}}

                    {{--</form>--}}



                </div>
            </div>



        </div>

    </div>
    @if(session('wrong_old_pass'))
        <div class="alert alert-danger">
            <ul>
                <li>{{session('wrong_old_pass')}}</li>
            </ul>
        </div>
    @endif

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
@endsection