{{--@extends('layouts.master')--}}
{{--@section('user')--}}
{{--<section class="jumbotron text-center">--}}
{{--<div class="container">--}}
{{--<h1 class="jumbotron-heading">Welcome to Kamel</h1>--}}
{{--<p class="lead text-muted">Kamel allows you to rent product that might be not necessary to buy.--}}
{{--Nevertheless, Kamel make it easy for you to make money be lending your--}}
{{--item to others while you don't use them.</p>--}}
{{--<p>--}}
{{--<a href="#" class="btn btn-primary my-2">Main call to action</a>--}}
{{--<a href="/logout" class="btn btn-secondary my-2">Logout2</a>--}}
{{--</p>--}}
{{--</div>--}}
{{--</section>--}}
{{--@include('listing.album')--}}
{{--@endsection--}}

@extends('layouts.master')
@section('page')

    <!-- Navigation -->
    @include('guest.topbar')

    <!-- Header -->
    {{--<body id="page-top">--}}
    <header class="bg-primary py-5 mb-5">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <h1 class="display-4 text-white mt-5 mb-2">Welcome to {{ config('app.name', 'Kamel') }}</h1>
                    <p class="lead mb-5 text-white-50">
                        Kamel allows you to rent product that might be not necessary to buy.
                        Nevertheless, Kamel make it easy for you to make money be lending your
                        item to others while you don't use them.
                    </p>
                    <a href="/login" class="btn btn-warning btn-lg my-2"> Login </a>
                    <a href="/register" class="btn btn-warning btn-lg my-2">New User</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->

        @include('listing.album')

    <!-- /.container -->

    <!-- Footer -->
    @include('layouts.footer')
    {{--</body>--}}


@endsection

