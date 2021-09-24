@include('components.form_errors')
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ isset($clone) && $clone ? '' : (isset($item) ? $item->id : '') }}">

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ $heading }} Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}first_name" class="form-label required">First
                                Name</label>
                            <input type="text" value="{{ isset($item) ? $item->first_name:old('first_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}first_name"
                                   name="first_name" required>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}last_name" class="form-label required">Last
                                Name</label>
                            <input type="text" value="{{ isset($item) ? $item->last_name:old('last_name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}last_name"
                                   name="last_name" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}email"
                                   class="form-label required">Email</label>
                            <input type="email" value="{{ isset($item) ? $item->email:old('email') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}email" name="email"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}password" class="form-label">Password</label>
                            <input type="password" value=""
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}password" name="password">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}password_confirmation" class="form-label">Password
                                Confirmation</label>
                            <input type="password"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}password_confirmation"
                                   name="password_confirmation">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Roles / Permissions Information</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Select Role(s)</label>
                            <select name="roles[]" class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose ...">
                                @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                    <option
                                        {{ isset($item) && $item->hasRole($role) ? 'selected' : '' }}
                                        value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label class="form-label">Select Permission(s) - Other than the role's permissions</label>
                            <select name="permissions[]" class="select2 form-control select2-multiple" multiple="multiple"
                                    data-placeholder="Choose ...">
                                @foreach(getGroupedPermissions() as $permissionGroup => $permissions)
                                    <optgroup label="{{ ucwords($permissionGroup) }}">
                                        @foreach($permissions as $id => $permission)
                                            <option
                                                {{ isset($item) && $item->hasPermissionTo($permission) ? 'selected' : '' }}
                                                value="{{ $permission }}">{{ ucwords($permission) }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
