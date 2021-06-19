<form class="ajax-form" method="post" action="{{ route('user.update', $user->id) }}">
    <div class="modal-header">
        <h4>Edit <span class="text-bold text-danger">{{ $user->name }}</span>, Information</h4>
    </div>
    <div class="modal-body">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body">
                <!-- Name Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input class="form-control" placeholder="User Full Name" type="text" name="name" value="{{ $user->name }}">
                    </div>
                </div>
                <!-- Name End -->

                <!-- Email Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email" value="{{ $user->email }}">
                    </div>
                </div>
                <!-- Email End -->

                <!-- Phone No Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></i></span>
                        </div>
                        <input class="form-control" placeholder="Phone No" type="text" name="phone" value="{{ $user->phone }}">
                    </div>
                </div>
                <!-- Phone No End -->

                <!-- Role Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                        </div>
                        <select class="form-control" name="role_id">
                            @foreach($roles as $role)
                            <option 
                                value="{{ $role->id }}"
                                @if ($role->id == $user->role_id)
                                selected
                                @endif
                            >{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Role End -->

                <!-- User Status Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-active-40"></i></span>
                        </div>
                        <select class="form-control" name="is_active">
                            @if ($user->is_active == 1)
                                <option value="{{ $user->is_active }} selected">Active</option>
                                <option value="0">Inactive</option>
                            @else
                                <option value="0" selected>Inactive</option>
                                <option value="1">Active</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- User Status End -->

                <!-- Profile Picture Start -->
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input class="form-control" placeholder="Select Profile Picture" type="file" name="image">
                    </div>
                </div>
                <!-- Profile Picture End -->
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
