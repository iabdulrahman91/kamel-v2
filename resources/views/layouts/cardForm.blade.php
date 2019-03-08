@extends('layouts.mainContent')
@section('content')
    <div class="row justify-content-center">
        <!-- Nested Row within Card Body -->
        <div class="col px-5 py-3">
            <div class="card o-hidden border-0 shadow-lg ">
                @yield('cardContent')
            </div>
        </div>
    </div>
@endsection