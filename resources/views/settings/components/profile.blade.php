<div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <h5 class="card-title">Update Name and Email</h5>
            <form action="/settings" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group row justify-content-md-center">
                    <label for="name" class="col-md-auto col-form-label">Name</label>
                    <div class="col col-md-auto">
                        <input type="text" id="name" name="name" class="form-control" placeholder="{{ $user->name }}" value="">
                    </div>
                </div>
                <div class="form-group row justify-content-md-center">
                    <label for="email" class="col-md-auto col-form-label">Email</label>
                    <div class="col col-md-auto">
                        <input type="email" id="email" name="email" class="form-control" placeholder="{{ $user->email }}" value="">
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