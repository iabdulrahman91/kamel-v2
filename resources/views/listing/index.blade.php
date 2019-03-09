@extends('layouts.mainContent')
@section('content')


    <div class="container my-2">
        <div class="card m-0">
            <div class="card-body border-bottom-success d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0 m-md-auto text-gray-800">Listings</h1>
                <a href="/listings/create" class="d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i class="fas fa-plus-circle fa-sm "></i> List an Item here</a>
            </div>
        </div>

        {{--<div class="form">--}}
            {{--<div class="form-row">--}}
                {{--<div class="form-group col-md-3">--}}
                    {{--<select id="inputState" class="form-control">--}}
                        {{--<option selected>State...</option>--}}
                        {{--<option>...</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-3">--}}
                    {{--<select id="inputState" class="form-control">--}}
                        {{--<option selected>State...</option>--}}
                        {{--<option>...</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-3">--}}
                    {{--<select id="inputState" class="form-control">--}}
                        {{--<option selected>State...</option>--}}
                        {{--<option>...</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group col-md-auto">--}}
                    {{--<input class="btn btn-primary btn-user btn-block" type="submit" type="submit"--}}
                           {{--value="Search">--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
        {{--<a href="" class=" btn btn-user bg-success text-white"><strong>List an Item here</strong></a>--}}
    </div>


    @include('listing.album')
@endsection