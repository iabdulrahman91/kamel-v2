@extends('layouts.mainContent')
@section('content')
    <div class="row justify-content-center">
        <!-- Nested Row within Card Body -->
        <div class="col m-md-auto">
            <div class="card o-hidden border-0 shadow-lg m-lg-3">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Received Rent Requests</h6>
                </div>
                <div class="card-body p-0">
                    @if (count($active))
                        <div class="table-responsive">
                            <table class="table table-bordered text-center m-0" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>item</th>
                                    <th>requester</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($active as $r)
                                    <tr>
                                        <th>{{$r['item']}}</th>
                                        <td>{{$r['requester_name']}}</td>
                                        <td>{{$r['start']}}</td>
                                        <td>{{$r['end']}}</td>
                                        <td>SAR {{$r['price']}}</td>
                                        <td>
                                            <div class="row p-1">
                                                <form class="user justify-content-center text-center" method="POST"
                                                      action="/bookings">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="rentRequest_id"
                                                           value="{{$r['rentRequest_id']}}">
                                                    <input href="#" class="col btn btn-success btn-sm btn-circle"
                                                           type="submit"
                                                           value="OK">
                                                </form>
                                                <form class="user justify-content-center text-center" method="POST"
                                                      action="/rentRequests/{{$r['rentRequest_id']}}">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                    <input href="#" class="col btn btn-danger btn-sm btn-circle"
                                                           type="submit"
                                                           value="X">
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="jumbotron text-center bg-light m-0">
                            <div class="jumbotron-heading h1">
                                No Received Requests
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (count($inActive))
        <div class="row justify-content-center">
            <!-- Nested Row within Card Body -->
            <div class="col m-md-auto">
                <div class="card o-hidden border-0 shadow-lg m-lg-3">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-secondary">Rejected Rent Requests</h6>
                    </div>
                    <div class="card-body p-0">

                        <div class="table-responsive">
                            <table class="table table-bordered text-center m-0" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>item</th>
                                    <th>requester</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>price</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($inActive as $r)
                                    <tr>
                                        <th>{{$r['item']}}</th>
                                        <td>{{$r['requester_name']}}</td>
                                        <td>{{$r['start']}}</td>
                                        <td>{{$r['end']}}</td>
                                        <td>SAR {{$r['price']}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('layouts.scripts.tableScript')
@endsection


