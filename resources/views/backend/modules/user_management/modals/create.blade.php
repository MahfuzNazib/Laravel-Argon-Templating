<div class="modal-header">
    <h4>Add New User</h4>
</div>
<div class="modal-body">
    <div class="card bg-secondary border-0 mb-0">
        <div class="card-body">
            <form class="ajax-form" method="post" action="{{ route('user.add') }}">
                {{-- Name --}}
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input class="form-control" placeholder="User Full Name" type="text">
                    </div>
                </div>
                {{-- Email --}}
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control" placeholder="Email" type="email">
                    </div>
                </div>
                {{-- Phone No --}}
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-tablet-button"></i></i></span>
                        </div>
                        <input class="form-control" placeholder="Phone No" type="text">
                    </div>
                </div>
                {{-- Role --}}
                <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                        </div>
                        <select class="form-control">
                            <option selected disabled>Select User Role</option>
                            <option>Admin</option>
                            <option>Manager</option>
                            <option>User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" type="password">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <div class="row">
        <div class="col-md-12">
            <div id="prefixes" class="card bg-secondary border-0 mb-0">
                <div class="card-content">
                    <form class="ajax-form" method="post" action="{{ route('user.add') }}">
@csrf
<div class="form-group mb-3">
    <div class="input-group input-group-alternative">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
        </div>
        <input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}"
            required autofocus>
    </div>
</div>
</form>
</div>
</div>
</div>
</div> --}}

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save</button>
</div>
