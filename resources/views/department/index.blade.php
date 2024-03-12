@extends('layouts.app')
@section('title')
  Departments 
@endsection

@section('styles')
    @include('layouts.data_table_styles')
@endsection

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4">Departments</h1>

    <div class="row">

        <div class="col-lg-12">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Departments | List</h6>
                </div>
                <div class="card-header-button">
                
                    <a href="javascript:void(0);" class="{!!config('buttons.add-class')!!}" title="Add"
                        data-toggle="modal" data-target="#myModal">
                        {!!config('buttons.add-icon')!!}
                    </a>
                    
                </div>
                <div class="card-body">
                    <div class="table-list">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="department_table" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
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
            <form id="department_form" method="post" action="#">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-xl-4">Department Name <i class="asterisk">*</i> </label>
                        <div class="col-xl-8">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Department Name">
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
        let tableURL = "{{ route('departments') }}";
        let saveURL = "{{ route('saveDepartment') }}";
        let getURL = "{{ route('getDepartment') }}"; 
        let deleteURL = "{{ route('deleteDepartment') }}";
    </script>
    @include('layouts.data_table_scripts')
    <script src="{{asset('assets/js/jquery-validation-1.19.1/dist/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/js/department.js') }}"></script>
@endsection

