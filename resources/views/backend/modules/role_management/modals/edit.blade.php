<form class="ajax-form" method="post" action="{{ route('role.add') }}">
    <div class="modal-header">
        <h4>Edit {{ $role->name }} Role</h4>
    </div>
    <div class="modal-body">
        <div class="card bg-secondary border-0 mb-0">
            <div class="card-body">
                <div class="form-group mb-3">
                    <div class="row">
                        <!-- Role Name Start -->
                        <div class="col-md-6">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                                </div>
                                <input class="form-control" placeholder="Role Name" type="text" name="name"
                                    value="{{ $role->name }}">
                            </div>
                        </div>
                        <!-- Role Name End -->

                        <!-- Role Status Start -->
                        <div class="col-md-6">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-check-bold"></i></span>
                                </div>
                                <select class="form-control">
                                    @if ($role->is_active == 1)
                                        <option value="{{ $role->is_active }}" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    @else
                                    <option value="{{ $role->is_active }}">Inactive</option>
                                    <option value="1">Active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- Role Status End -->
                    </div>
                </div>
                <h5>Select Modules To The {{ $role->name }} Role</h5>
                {{-- Show Available Roles Start --}}
                <div class="row">
                    @foreach( App\Models\Module::orderBy('id','desc')->get() as $module )
                    @foreach( $module->permission as $module_permission )
                    @if($module->key == $module_permission->key )
                    <div class="col-lg-6 col-md-6">
                        <button type="button" class="permission-block">
                            <div class="row">
                                <label>
                                    <input type="checkbox" class="module_check" name="permission[]"
                                        value="{{ $module_permission->id }}" 
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach( $role->permission as $role_permission )
                                            @if( $role_permission->id == $module_permission->id )
                                                {{ $i++ }}
                                            @endif
                                        @endforeach
                                        @if( $i != 0 )
                                            checked
                                        @endif
                                        />
                                    <span>{{ $module->name }}</span>
                                </label>
                            </div>

                            @foreach( $module->permission as $sub_module_permission )
                            @if( $sub_module_permission->key != $module->key )
                            <div class="sub_module_block">
                                <label>
                                    <input type="checkbox" class="sub_module_check" name="permission[]" disabled
                                        value="{{ $sub_module_permission->id }}" 
                                        @php
                                            $j = 0;
                                        @endphp
                                        @foreach( $role->permission as $role_permission )
                                            @if( $role_permission->id == $sub_module_permission->id )
                                                    {{ $j++ }}
                                            @endif
                                        @endforeach
                                        @if( $i == 0 )
                                            disabled
                                        @endif
                                        @if( $j > 0 )
                                        checked
                                        @endif
                                        />
                                    <span>{{ $sub_module_permission->display_name }}</span>
                                </label>
                            </div>
                            @endif
                            @endforeach
                        </button>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
                {{-- Show Available Roles End --}}
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>


<script>
    $(".module_check").click(function (e) {
        let $this = $(this);
        console.log(e.target.checked)
        if (e.target.checked == true) {
            $this.closest(".permission-block").find(".sub_module_block").find(".sub_module_check").removeAttr(
                "disabled")
        } else {
            $this.closest(".permission-block").find(".sub_module_block").find(".sub_module_check").attr(
                "disabled", "disabled")
        }
    })

</script>
