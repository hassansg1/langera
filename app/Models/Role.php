<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Role extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];


    public $rules =
        [
            'name' => 'required | max:255',
        ];


    public function parentName()
    {
        return '';
    }

    /**
     * @param $item
     * @param $request
     * @return mixed
     */
    public function saveFormData($item, $request)
    {
        if (isset($request->name)) $item->name = $request->name;
        $item->guard_name = 'web';
        $item->save();
        $role = \Spatie\Permission\Models\Role::findByName($item->name);
        if (isset($request->permissions)) $role->syncPermissions($request->permissions);
        return $item;
    }
}
