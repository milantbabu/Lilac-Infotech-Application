@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-toggle-2.2.2/css/bootstrap-toggle.min.css') }}">
@endsection
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4">Edit Profile</h1>
        <div class="row">
            <div class="col-lg-12">
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                    </div>
                    <div class="card-body">
                        <form id="profile_form" method="post" action="#">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name <i class="asterisk">*</i></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$profile->name}}" placeholder=" Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email ID <i class="asterisk">*</i></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email" value="{{$profile->email}}" aria-describedby="basic-addon1" placeholder="Email ID">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label for="user_password">Password <i class="asterisk">*</i></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="user_password" id="user_password" aria-describedby="basic-addon1" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="confirm_password">Confirm Password <i class="asterisk">*</i></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" aria-describedby="basic-addon1" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="change_password">Change Password</label>
                                    <div class="col-xl-8">
                                      <input data-toggle="toggle" id="change_password" name="change_password" data-on="Yes" data-off="No" type="checkbox">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success btn-icon-split float-right" id="company_profile_btn">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Update</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    let saveURL = "{{route('saveProfile')}}";
</script>
<script src="{{ asset('assets/js/jquery-validation-1.19.1/dist/jquery.validate.min.js')}}"></script>

<script src="{{ asset('assets/js/jquery-validation-1.19.1/dist/additional-methods.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-toggle-2.2.2/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/js/profile.js') }}"></script>
@endsection
