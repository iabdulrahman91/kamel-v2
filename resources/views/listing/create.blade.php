@extends('layouts.mainContent')
@section('content')
    <div class="row justify-content-center">
        <!-- Nested Row within Card Body -->
        <div class="col m-md-auto">
            <div class="card o-hidden border-0 shadow-lg m-lg-3">
                <div class="card-header text-center">
                    Add New Listing
                </div>
                <div class="card-body">
                    <form class="user justify-content-center text-center" method="POST" action="/listings">
                        {{ csrf_field() }}
                        {{--item--}}
                        <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }} ">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <input id="item" type="text" class="form-control form-control-user text-center"
                                           name="item"
                                           placeholder="item"
                                           value="{{ old('item') }}" required autofocus>

                                    @if ($errors->has('item'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('item') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--Location--}}
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control form-control-user text-center"
                                           name="location"
                                           placeholder="location"
                                           value="{{ old('location') }}" required>

                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--price--}}
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control form-control-user text-center"
                                           name="price"
                                           placeholder="price in SAR"
                                           value="{{ old('price') | '0'}}" required>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{--Start--}}


                        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="label">
                                        Start date:
                                    </div>
                                    <input id="start" type="date" class="form-control form-control-user text-center"
                                           name="start"
                                           placeholder="start date"
                                           value="{{ old('start') }}" required>

                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        {{--End--}}
                        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <div class="label">
                                        End date:
                                    </div>
                                    <input id="end" type="date" class="form-control form-control-user text-center"
                                           name="end"
                                           placeholder="end date"
                                           value="{{ old('end') }}" required>

                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row justify-content-md-center">
                                <div class="col-md-6">
                                    <input class="btn btn-primary btn-user btn-block" type="submit"
                                           value="List this Item">
                                    <input class="btn btn-outline-danger btn-user btn-block" type="reset" value="Reset">
                                    <a class="btn btn-light btn-user btn-block"
                                       href="{{ redirect()->back()->getTargetUrl() }}"
                                       role="button">Cancel</a>

                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
