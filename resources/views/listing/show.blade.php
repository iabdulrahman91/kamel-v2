@extends('layouts.user')
@section('content')
    <div class="list-group">
        <div class="list-group-item">
            {{$listing->item}}
        </div>
        <div class="list-group-item">
            {{$listing->location}}
        </div>
        <div class="list-group-item">
            {{$listing->start}}
        </div>
        <div class="list-group-item">
            {{$listing->end}}
        </div>
        <div class="list-group-item">
            {{$listing->price}}
        </div>

        <div class="list-group-item">
            <form method="get" action="/rentRequests/create">
                <input type="hidden" value={{$listing->id}} name='id'>
                <input class="btn btn-info btn-sm btn-block" type="submit" value="Rent">

            </form>
        </div>

    </div>
@endsection
