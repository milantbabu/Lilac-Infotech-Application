<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/fav.ico') }}" type="image/x-icon">

    <title>{{Config('app.name')}} - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this Admin Panel  -->
    <link href="{{ asset('assets/css/admin-panel-min.css') }}" rel="stylesheet">
    <!-- Main styles for this Admin Panel -->

    <!-- Custom styles for this Admin Panel-->
    <link href="{{ asset('assets/css/admin-panel-custom.css') }}" rel="stylesheet">
    <!-- Custom styles for this Admin Panel Ends-->


</head>

<body>

<!-- preloader start -->

<div id="loader">
    <div class="loader-inner">
        <div class='preloader'>
            <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>
        </div>
    </div>
</div>
<!-- /.end preloader -->

<section class="login-page-outer">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 login-card-outer">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('authenticateUser')}}">

                                        @foreach($errors->all() as $message)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-dismissible alert-danger fade show">
                                                        <button type="button" class="close" data-dismiss="alert">×
                                                        </button>
                                                        {!! $message !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user"
                                                   id="email" placeholder="Email/Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                   class="form-control form-control-user" id="password"
                                                   placeholder="Password">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" value="1"
                                                       name="remember_me" id="remember_me">
                                                <label class="custom-control-label" for="remember_me">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->

                                        <button type="submit" class="btn btn-primary btn-user btn-block" onClick=""
                                                value='Login'>
                                            Login
                                        </button>

                                        <!-- <hr>

                                        <button type="button" class="btn btn-google btn-user btn-block" onClick="location.href='index.html'" value='click here'>
                                          <i class="fab fa-google fa-fw"></i>Login with Google
                                        </button>

                                        <button type="button" class="btn btn-facebook btn-user btn-block" onClick="location.href='index.html'" value='click here'>
                                          <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </button> -->
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                      <a class="small" href="javascript::void(0)">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                      <a class="small" href="javascript::void(0)">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Main scripts for all pages -->
<script src="{{ asset('assets/js/admin-panel-min.js') }}"></script>
<!-- Main scripts for all pages Ends -->

<!-- Custom Scripts for Admin Panel -->
<script src="{{ asset('assets/js/admin-panel-custom.js') }}"></script>
<!-- Custom Scripts for Admin Panel Ends -->


</body>

</html>

