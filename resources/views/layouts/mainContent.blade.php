@extends('layouts.user')
@section('mainContent')

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        @include('layouts.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

            @yield('content')

        <!-- End Page Content -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- End of Footer -->

@endsection