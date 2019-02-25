@if (count($listings))

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Owner</th>
            <th scope="col">Item</th>
            <th scope="col">Location</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        @foreach($listings as $listing)
            <tr>
                <th scope="row">{{$listing->user->fname}}</th>
                <td>{{$listing->item}}</td>
                <td>{{$listing->location}}</td>
                <td>{{$listing->start}}</td>
                <td>{{$listing->end}}</td>
                <td>{{$listing->price}}</td>
                <td> <a href="/listings/{{$listing->id}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">View</a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else

    <div class="jumbotron text-center bg-light">
        <div class="jumbotron-heading h1">
            No item listed
        </div>
    </div>
@endif
