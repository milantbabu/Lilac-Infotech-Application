<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body id="page-top">


    <!-- preloader start -->

  <div id="loader">
      <div class="loader-inner">
          <div class='preloader'>
              <span class="cssload-loader"><span class="cssload-loader-inner"></span></span>
          </div>
      </div>
  </div>
    <!-- /.end preloader -->

    {{-- semi-transparent background when the form submits --}}
    <div id="cover-spin"></div>

    <div class="art-bg">
      <!-- <img src="{{ asset('assets/img/art1.svg') }}" alt="" class="art-img light-img"> -->
    </div>

    <!-- Page Wrapper -->
    <div class="dashboard-outer" id="wrapper">
        @include('layouts.sidemenu')
        <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            @include('layouts.topbar')

            @yield('content')

        </div>
        <!-- End of Main Content -->


    @include('layouts.footer')
</body>

</html>
