@extends('layouts.user')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col">
                <div class="panel panel-default ">
                    <div class="panel-heading">New Listing</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/listings">

                            {{ csrf_field() }}

                            {{--item--}}
                            <div class="form-group{{ $errors->has('item') ? ' has-error' : '' }}">
                                <label for="item" class="col-md-4 control-label">Item</label>

                                <div class="col-md-6">
                                    <input id="item" type="text" class="form-control" name="item"
                                           value="{{ old('item') }}" required autofocus>

                                    @if ($errors->has('item'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('item') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Location--}}
                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                <label for="location" class="col-md-4 control-label">Location</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control" name="location"
                                           value="{{ old('location') }}" required>

                                    @if ($errors->has('location'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--price--}}
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">Price per day</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control" name="price"
                                           value="{{ old('price') | '0'}}" required>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Start--}}


                            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                <label for="start" class="col-md-4 control-label">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start" type="date" class="form-control" name="start"
                                           value="{{ old('start') }}" required>

                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            {{--End--}}
                            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                <label for="end" class="col-md-4 control-label">End Date</label>

                                <div class="col-md-6">
                                    <input id="end" type="date" class="form-control" name="end"
                                           value="{{ old('end') }}" required>

                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6">
                                    <input class="btn btn-success btn-lg btn-block" type="submit" type="submit" value="List this Item">

                                    <input class="btn btn-info btn-sm btn-block" type="reset" value="Reset">

                                    {{-- cancel btn--}}
                                    <a class="btn btn-danger btn-block" href="/listings" role="button">Cancel</a>

                                </div>
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
