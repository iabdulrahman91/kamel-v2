@extends('layouts.mainContent')
@section('content')
    <div class="container">
        <div class="card m-5">
            <div class="card-body">
                <img class="card-img-top p-3" src="http://placehold.it/300x200" alt="">
                <h4 class="card-title">{{$listing->item}}</h4>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 ml-2">{{$listing->location}}
                        <span class="badge badge-primary badge-pill">SAR {{$listing->price}} / day</span>
                    </div>
                    <div class="list-group-item border-0">{{$listing->start}}</div>
                    <div class="list-group-item border-0">{{$listing->end}}</div>

                </div>
            </div>
            <div class="card-footer text-center">
                <form method="get" action="/rentRequests/create">
                    <input type="hidden" value={{$listing->id}} name='id'>
                    <input class="btn btn-success btn-lg col-md-6 " type="submit" value="Rent">
                </form>
            </div>
        </div>
    </div>

@endsection
