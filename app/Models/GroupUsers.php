<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUsers extends Model
{
    use HasFactory;
    protected $table = 'group_user';
    protected $guarded=[];

    public function group(){
        return $this->belongsTo('App\Models\Groups','group_id','id');
    }
}
