<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['name'];

    public function toDoList()
    {
        return $this->hasMany(ToDoList::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function ideas()
    {
        return $this->hasMany(UserIdea::class,'user_id');
    }

    public function flashCards()
    {
        return $this->hasMany(FlashCards::class,'user_id');
    }

    public function quickLinks()
    {
        return $this->hasMany(QuickLink::class,'user_id');
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return ucfirst($this->first_name) . " " . ucfirst($this->last_name);
    }

    public $rules =
        [
            'first_name' => 'required | max:255',
            'email' => 'required | email',
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
        if (isset($request->first_name)) $item->first_name = $request->first_name;
        if (isset($request->last_name)) $item->last_name = $request->last_name;
        if (isset($request->mobile_no)) $item->mobile_no = $request->mobile_no;
        if (isset($request->email)) $item->email = $request->email;
        if (isset($request->password)) $item->password = Hash::make($request->password);
        if (isset($request->dob)) $item->dob = Hash::make($request->dob);
        if (isset($request->roles)) {
            $item->syncRoles($request->roles);
        }
        if (isset($request->permissions)) {
            $item->syncPermissions($request->permissions);
        }

        $item->save();
        return $item;
    }
}
