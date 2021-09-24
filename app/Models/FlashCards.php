<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FlashCards extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function addNew($topic, $answer)
    {
        $obj = new FlashCards();
        $obj->topic = $topic;
        $obj->answer = $answer;
        $obj->user_id = Auth::user()->id;
        $obj->save();

        return $obj;
    }
}
