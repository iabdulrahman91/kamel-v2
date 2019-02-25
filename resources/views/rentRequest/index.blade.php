@extends('layouts.user')
@section('content')
    @if (count($rentRequests))

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">requester</th>
                <th scope="col">list id</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rentRequests as $listing)
                <tr>
                    <th scope="row">{{$listing->user_id}}</th>
                    <td>{{$listing->listing_id}}</td>
                    <td>{{$listing->start}}</td>
                    <td>{{$listing->end}}</td>
                    <td>{{$listing->price}}</td>
                    {{--<td> <a href="/listings/{{$listing->id}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">View</a> </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    @else

        <div class="jumbotron text-center bg-light">
            <div class="jumbotron-heading h1">
                No Requests found
            </div>
        </div>
    @endif

@endsection
