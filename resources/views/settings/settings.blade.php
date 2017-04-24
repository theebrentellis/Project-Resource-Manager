@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fw fa-btn fa-cog"></i>Settings
                </div>
            
                <div class="card-block">
                    <ul class="nav nav-tabs settings" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-user"></i>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" class="nav-link" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-key"></i>Password</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            Profile
                        </div>
                        <div class="card-block">
                            <h5 class="card-title">Update Name and Email</h5>
                            <form action="/settings/{id}/updateNameEmail" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group row justify-content-md-center">
                                    <label for="name" class="col-1 col-form-label">Name</label>
                                    <div class="col col-md-auto">
                                        <input type="text" id="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="email" class="col-1 col-form-label">Email</label>
                                    <div class="col col-md-auto">
                                        <input type="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <div class="col col-md-auto">
                                        <input type="submit" class="btn btn-info" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="password" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            Password
                        </div>
                        <div class="card-block">
                            <h5 class="card-title">Update Password</h5>
                            <form action="/settings/{id}/updatePassword" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group row justify-content-md-center">
                                    <label for="currentPassword" class="col-4 col-form-label">Current Password</label>
                                    <div class="col col-auto">
                                        <input type="password" id="currentPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="newPassword" class="col-4 col-form-label">New Password</label>
                                    <div class="col col-md-auto">
                                        <input type="password" id="newPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <label for="confirmNewPassword" class="col-4 col-form-label">Confirm New Password</label>
                                    <div class="col col-md-auto">
                                        <input type="password" id="confirmNewPassword" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-md-center">
                                    <div class="col col-md-auto">
                                        <input type="submit" class="btn btn-info" value="Update Password">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>


@endsection