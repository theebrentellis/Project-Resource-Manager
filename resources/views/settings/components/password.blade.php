<div class="card">
    <div class="card-header">
        Password
    </div>
    <div class="card-body">
        <h5 class="card-title">Update Password</h5>
        <form action="/settings" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
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