<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->

    <link href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this Admin Panel  -->
    <link href="{{ asset('assets/css/admin-panel-min.css') }}" rel="stylesheet">
    <!-- Main styles for this Admin Panel -->

    <!-- Custom styles for this Admin Panel-->
    <link href="{{ asset('assets/css/admin-panel-custom.css') }}" rel="stylesheet">
    <!-- Custom styles for this Admin Panel Ends-->
    
    <!-- Custom styles for this Admin Panel-->
    <link href="{{ asset('assets/css/admin-panel-responsive.css') }}" rel="stylesheet">
    <!-- Custom styles for this Admin Panel Ends-->

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <!-- Custom CSS Ends-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    @yield('styles')

</head>
