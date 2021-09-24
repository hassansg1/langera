<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserIdea extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function addNew($idea, $notes)
    {
        $obj = new UserIdea();
        $obj->idea = $idea;
        $obj->notes = $notes;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        return $obj;
    }
}
