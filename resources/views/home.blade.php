@extends('layouts.mainContent')
@section('content')
    <div class="container my-2">
        <a href="/listings/create" class=" btn btn-user bg-success text-white"><strong>List an Item here</strong></a>
    </div>
    @include('listing.album')
@endsection