@extends('layouts.cardForm')
@section('content')
    <!-- DataTales Example -->
    <div class="container mx-2">
        jumb to section
    </div>
    <div class="card shadow m-1">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Approved Requests</h6>
        </div>
        <div class="card-body p-0">
            @if (count($active))
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>item name</th>
                            <th>owener</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($active as $r)
                            <tr>
                                <th>{{$r['item']}}</th>
                                <td>{{$r['owner']}}</td>
                                <td>{{$r['start']}}</td>
                                <td>{{$r['end']}}</td>
                                <td>SAR {{$r['price']}}</td>
                                <td>
                                    <form class="user justify-content-center text-center" method="POST"
                                          action="/rentRequests/{{$r['rentRequest_id']}}">
                                        {{ csrf_field() }}
                                        {{method_field('DELETE')}}
                                        <input href="#" class="col btn btn-danger btn-sm btn-circle" type="submit"
                                               value="X">
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @else
                <div class="jumbotron text-center bg-light m-0">
                    <div class="jumbotron-heading h1">
                        No Requests approved yet
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

