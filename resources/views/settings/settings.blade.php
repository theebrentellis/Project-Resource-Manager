@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6">
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach($errors->all() as $error)
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{session('status')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-fw fa-btn fa-cog"></i>Settings
                </div>
                <div class="card-body">
                    <ul class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-user"></i>Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#password" class="nav-link" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-key"></i>Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="#admin" class="nav-link" data-toggle="tab" role="tab"><i class="fa fa-fw fa-btn fa-lock"></i>Admin Panel</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="profile" role="tabpanel">
                    @include('settings.components.profile')
                <div class="tab-pane" id="password" role="tabpanel">
                    @include('settings.components.password')
                </div>
                <div class="tab-pane" id="admin" role="tabpanel">
                    @include('settings.components.admin')
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection