@extends('layouts.app')
@section('title')
  Users 
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-4.0.12/dist/css/select2.min.css') }}">
@endsection
   
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4">Users</h1>
    <div class="row">
        <div class="col-lg-12">
            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-header-button">
                
                    <a href="javascript:void(0);" class="{!!config('buttons.add-class')!!}" title="Add"
                        data-toggle="modal" data-target="#myModal">
                        {!!config('buttons.add-icon')!!}
                    </a>
                </div>
                <div class="card-body">
                     <div class="user-management">
                        <div class="mb-4">
                            <label for="inputSearch" class="form-label h5">Search</label>
                            <input type="search" class="form-control" placeholder="Search name/designation/department" id="inputSearch" />
                        </div>
                        <div class="row user-details">
                            
                        </div>
                        <div class="pagination"></div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="user_form" method="post" action="#">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-4"> Name <i class="asterisk">*</i> </label>
                        <div class="col-xl-8">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-4"> Department <i class="asterisk">*</i> </label>
                        <div class="col-xl-8">
                          <select class="form-control select2" name="department_id" id="department_id"  style="width: 100%;">
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-xl-4"> Designation <i class="asterisk">*</i> </label>
                        <div class="col-xl-8">
                          <select class="form-control select2" name="designation_id" id="designation_id"  style="width: 100%;">
                          </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="submit" id="form_submit" class="btn btn-success btn-icon-split float-right">
                        <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Save</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@section('scripts')
  <script>
    let getUserURL = "{{ route('getUsers') }}";
    let getDepartmentsURL = "{{ route('getUserDepartments') }}";
    let getDesignationsURL = "{{ route('getUserDesignations') }}";
    let saveURL = "{{ route('saveUser') }}";
  </script>
  @include('layouts.data_table_scripts')
  <script src="{{asset('assets/js/jquery-validation-1.19.1/dist/jquery.validate.min.js')}}"></script>
  <script src="{{ asset('assets/plugins/select2-4.0.12/dist/js/select2.min.js') }}"></script>

  <script src="{{ asset('assets/js/user.js') }}"></script>
@endsection