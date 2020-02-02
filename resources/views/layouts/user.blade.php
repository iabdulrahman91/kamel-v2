{{--container for main body for  auth user--}}
@extends('layouts.master')
@section('page')

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            @yield('mainContent')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


@endsection
