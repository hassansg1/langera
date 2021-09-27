<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'to_do_list';

    public static function addNew($title)
    {
        $obj = new ToDoList();
        $obj->title = $title;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        return $obj;
    }
}
