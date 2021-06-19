<form class="ajax-form" method="post" action="#">
    <div class="modal-header">
        <h4>Edit <span class="text-bold text-danger">Nazib</span>, Information</h4>
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
                        <input class="form-control" placeholder="User Full Name" type="text" name="name">
                    </div>
                </div>
                <!-- Name End -->

                <!-- Email Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                </div>
                <!-- Email End -->

                <!-- Phone No Start -->
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></i></span>
                        </div>
                        <input class="form-control" placeholder="Phone No" type="text" name="phone">
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
                            <option selected disabled>Select User Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Role End -->

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

                <!-- Password Start -->
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Set Password" type="password" name="password">
                    </div>
                </div>
                <!-- Password End -->
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
