<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class QuickLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function addNew($title, $link)
    {
        $obj = new QuickLink();
        $obj->title = $title;
        $obj->link = $link;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        return $obj;
    }
}
