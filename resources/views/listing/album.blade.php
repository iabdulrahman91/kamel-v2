@if (count($listings))
    <div class="container">
        <div class="row">
            @foreach($listings as $l)
                <div class="col-md-4 mb-5">
                    <div class="card m-100">
                        <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{$l->item}}</h4>
                            <div class="list-group">
                                <div class="list-group-item d-flex justify-content-between align-items-center border-0 p-0 ml-2">{{$l->location}}
                                    <span class="badge badge-primary badge-pill">SAR {{$l->price}} / day</span>
                                </div>
                                <div class="list-group-item border-0">{{$l->start}}</div>
                                <div class="list-group-item border-0">{{$l->end}}</div>

                            </div>
                        </div>
                        <div class="card-footer text-center">
                            @if(auth()->user())
                                <a href="/listings/{{$l->id}}" class="btn btn-success">Rent me</a>
                            @else
                                <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-primary">See
                                    Details!</a>
                            @endif
                        </div>
                    </div>
                </div>


            @endforeach
        </div>

    </div>

@else
    <h1>Empty listing</h1>
@endif

