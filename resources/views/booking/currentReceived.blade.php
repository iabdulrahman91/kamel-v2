@extends('layouts.mainContent')
@section('content')
    <div class="row justify-content-center">
        <!-- Nested Row within Card Body -->
        <div class="col m-md-auto">
            <div class="card o-hidden border-0 shadow-lg m-lg-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Current Bookings</h6>
                </div>
                <div class="card-body p-0">
                    @if (count($active))
                        <div class="table-responsive">
                            <table class="table table-bordered text-center m-0" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>item name</th>
                                    <th>Renter</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Price</th>
                                    <th>Location</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($active as $b)
                                    <tr>
                                        <th>{{$b->listing->item}}</th>
                                        <td>{{$b->user->fname}}</td>
                                        <td>{{$b->start}}</td>
                                        <td>{{$b->end}}</td>
                                        <td>SAR {{$b->price}}</td>
                                        <td>{{$b->listing->location}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="jumbotron text-center bg-light m-0">
                            <div class="jumbotron-heading h1">
                                No current bookings
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>


@endsection

