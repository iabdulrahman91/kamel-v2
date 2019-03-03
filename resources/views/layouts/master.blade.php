<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- my title --}}
    <title>{{ config('app.name', 'Kamel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('customized/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('customized/css/sb-admin-2.min.css') }}" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>


<body id="page-top">



@yield('page')



<!-- Scroll to Top Button-->
@include('layouts.toTop')

<!-- Logout Modal-->
@include('layouts.logoutModal')
<!-- Scripts -->
@include('layouts.scripts.mainScript')


</body>
</html>
