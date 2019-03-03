@extends('layouts.mainContent')

@section('content')
    <div class="form mx-md-5">
        <div class="form-row m-3">
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control">
                    <option selected>State...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control">
                    <option selected>State...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <select id="inputState" class="form-control">
                    <option selected>State...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-auto">
                <input class="btn btn-primary btn-user btn-block" type="submit" type="submit"
                       value="List this Item">
            </div>

        </div>
        <hr>
    </div>
    <div class="col mt-2">
        @include('listing.album')

    </div>
@endsection
