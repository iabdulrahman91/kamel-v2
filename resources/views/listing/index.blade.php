@extends('layouts.user')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="row">
                    <form class="form-inline">
                        <div class="form-group">
                            @include('menus.searchDropDown', ['name' => 'city','items' => ['one', 'two', 'three']])
                        </div>
                        <div class="form-group">
                            @include('menus.searchDropDown', ['name' => 'city','items' => ['one', 'two', 'three']])
                        </div>
                        <div class="form-group">
                            @include('menus.searchDropDown', ['name' => 'city','items' => ['one', 'two', 'three']])
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">
                <form class="form-inline my-2 my-lg-0" method="get" action="/listings/create">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">List an Item</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                @include('listing.table')
            </div>

        </div>

    </div>

@endsection
