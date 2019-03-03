@extends('layouts.master')
@section('page')
    <body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        {{--Names row--}}
                                        <div class="form-group{{ $errors->has('fname','lname') ? ' has-error' : '' }} row">

                                            {{--First name--}}
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                       id="fname" name="fname"
                                                       placeholder="First Name"
                                                       value="{{ old('fname') }}" required autofocus>
                                            </div>

                                            {{--Last name--}}
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                       id="lname" name="lname"
                                                       placeholder="Last Name"
                                                       value="{{ old('lname') }}" required>

                                            </div>
                                            @if ($errors->has('lname'))
                                                <span class="help-block ml-3">
                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                </span>
                                            @elseif($errors->has('fname'))
                                                <span class="help-block ml-3">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        {{--Email--}}
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="col-md-0">
                                                <input type="email" class="form-control form-control-user"
                                                       id="email" name="email"
                                                       placeholder="Email Address"
                                                       value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block ml-3">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        {{--Phone--}}
                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <div class="col-md-0">
                                                <input type="tel" class="form-control form-control-user"
                                                       id="phone" name="phone"
                                                       placeholder="Phone Number"
                                                       value="{{ old('phone') }}" required>

                                                @if ($errors->has('phone'))
                                                    <span class="help-block ml-3">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{--Password row--}}
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">

                                            {{--Password--}}
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                       id="password" name="password"
                                                       placeholder="Password" required>

                                            </div>

                                            {{--password confirm--}}
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                       id="password-confirm" name="password_confirmation"
                                                       placeholder="Repeat Password" required>


                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block ml-3">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-0">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    Register
                                                </button>
                                            </div>
                                        </div>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    </body>
@endsection
