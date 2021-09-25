<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $guarded = [];
    public function userFrom(){
        return $this->belongsTo('App\Models\User','from','id');
    }
    public function userTo(){
        return $this->belongsTo('App\Models\User','to','id');
    }
}
