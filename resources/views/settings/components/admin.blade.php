<div class="card">
    <div class="card-header">
        <h5>Admin Panel</h5>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($users as $user)
                <div class="col">
                    <label><strong>{{ $user->name }}</strong></label>
                    @foreach($roles as $role)
                        @if($user->hasRole($role))
                            <form action="/settings" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <div class="form-check">
                                    <label class="form-check-label" for="">
                                        <input class="form-check-input" type="checkbox" id="" name="{{ $user->id }}" value="{{ $role }}" onChange="submit();" checked> {{ $role->label }}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="remove_role_id" value="{{ $role->id }}">
                                    </label>
                                </div>
                                </form>
                        @else
                            <form action="/settings" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                                <div class="form-check">
                                    <label class="form-check-label" for="">
                                        <input class="form-check-input" type="checkbox" id="" name="" value="" onChange="submit();"> {{ $role->label }}
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="add_role_id" value="{{ $role->id }}">
                                    </label>
                                </div>
                            </form>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>