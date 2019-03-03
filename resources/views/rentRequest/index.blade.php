@extends('layouts.mainContent')
@section('content')
    @if (count($result))

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">item name</th>
                <th scope="col">requester</th>
                <th scope="col">owener</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">cost</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $r)
                <tr>
                    <th scope="row">{{$r['item']}}</th>
                    <td>{{$r['renter']}}</td>
                    <td>{{$r['owner']}}</td>
                    <td>{{$r['start']}}</td>
                    <td>{{$r['end']}}</td>
                    <td>SAR {{$r['cost']}}</td>
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
