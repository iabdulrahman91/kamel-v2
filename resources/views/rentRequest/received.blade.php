@extends('layouts.mainContent')
@section('content')
    @if (count($result))

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">item</th>
                <th scope="col">requester</th>
                <th scope="col">Start</th>
                <th scope="col">End</th>
                <th scope="col">price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $r)
                <tr>
                    <th scope="row">{{$r['item']}}</th>
                    <td>{{$r['requester_name']}}</td>
                    <td>{{$r['start']}}</td>
                    <td>{{$r['end']}}</td>
                    <td>SAR {{$r['price']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else

        <div class="jumbotron text-center bg-light">
            <div class="jumbotron-heading h1">
                No Received Requests
            </div>
        </div>
    @endif

@endsection