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
                            <label for="{{ isset($item) ? $item->id:'' }}name" class="form-label required">Name</label>
                            <input type="text" value="{{ isset($item) ? $item->name:old('name') ?? ''  }}"
                                   class="form-control" id="{{ isset($item) ? $item->id:'' }}name" name="name"
                                   required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="{{ isset($item) ? $item->id:'' }}permissions"
                                   class="form-label required">Select Permissions</label>
                            @foreach(getGroupedPermissions() as $permissionGroup => $permissions)
                                <h6>{{ ucwords($permissionGroup) }}:</h6>
                                <div class="form-check form-check-inline mb-3">
                                    <input
                                        onclick="$('.{{ isset($item) ? $item->id:'' }}{{ $permissionGroup }}').attr('checked',true)"
                                        class="form-check-input" type="checkbox"
                                        id="{{ isset($item) ? $item->id:'' }}{{ $permissionGroup }}">
                                    <label style="font-weight: bolder" class="form-check-label bold"
                                           for="{{ isset($item) ? $item->id:'' }}{{ $permissionGroup }}">
                                        Select all
                                    </label>
                                </div>
                                @foreach($permissions as $id => $permission)
                                    <div class="form-check form-check-inline mb-3">
                                        <input
                                            class="form-check-input {{ isset($item) ? $item->id:'' }}{{ $permissionGroup }}"
                                            type="checkbox"
                                            name="permissions[]"
                                            value="{{ $permission }}"
                                            {{ isset($item) && \Spatie\Permission\Models\Role::findByName($item->name)->hasPermissionTo($permission) ? 'checked' : '' }}

                                            id="{{ isset($item) ? $item->id:'' }}{{ $permission }}">
                                        <label class="form-check-label"
                                               for="{{ isset($item) ? $item->id:'' }}{{ $permission }}">
                                            {{ ucwords(str_replace($permissionGroup,'',$permission)) }}
                                        </label>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
