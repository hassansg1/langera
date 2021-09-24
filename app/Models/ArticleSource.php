<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ArticleSource extends Model
{
    use HasFactory;

    public static function addNew($articleId, $type, $title, $link, $document)
    {
        $obj = new ArticleSource();
        $obj->article_id = $articleId;
        $obj->type = $type;
        $obj->title = $title;
        $obj->link = $link;
        $obj->document = $document;
        $obj->document_path = public_path('images') . $document;
        $obj->save();

        return $obj;
    }
}
