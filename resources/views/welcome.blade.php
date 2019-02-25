@extends('layouts.user')
@section('content')
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Welcome to Kamel</h1>
                <p class="lead text-muted">Kamel allows you to rent product that might be not necessary to buy.
                    Nevertheless, Kamel make it easy for you to make money be lending your
                    item to others while you don't use them.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </section>
        @include('listing.album')
@endsection
