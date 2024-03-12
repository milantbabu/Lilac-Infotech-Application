@php
    $current_route = Request::route()->getName();
    // echo $current_route;
@endphp
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{\Carbon\Carbon::now()->format('Y')}} {{Config('app.name')}}</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="logout-modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <form action="{{ route('logout') }}" method="GET">
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" value='Logout'>
                        Logout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
{{-- Comment the below script if using any vue component in the page using @if(!in_array($current_route, ['routeNameHere'])) --}}
{{-- @if(!in_array($current_route,[])) --}}
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- @endif --}}

<!-- Core plugin JavaScript -->
<script src="{{ asset('assets/plugins/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Main scripts for all pages -->
<script src="{{ asset('assets/js/admin-panel-min.js') }}"></script>
<!-- Main scripts for all pages Ends -->


<!-- Custom Scripts for Admin Panel -->
<script src="{{ asset('assets/js/admin-panel-custom.js') }}"></script>
<!-- Custom Scripts for Admin Panel Ends -->

<!-- Select2 JS -->
<script src="{{ asset('assets/plugins/select2-4.0.12/dist/js/select2.min.js') }}"></script>
<!-- Select2 JS Ends -->

<!-- Sweet Alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Sweet Alert 2 Ends -->

<!--  Toastr JS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--  Toastr JS Ends -->

@yield('scripts')
