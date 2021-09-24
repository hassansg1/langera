<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function idea()
    {
        return $this->belongsTo(UserIdea::class, 'idea_id', 'id');
    }

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->idea->idea;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(File::class, 'filesable')->orderBy('id','desc');
    }

    public function sources()
    {
        return $this->hasMany(ArticleSource::class, 'article_id');
    }

    public static function addUpdate($id, $idea_id = null, $course_id = null, $outline = null, $writing = null)
    {
        $article = self::find($id);
        if ($course_id) $article->course_id = $course_id;
        if ($idea_id) $article->idea_id = $idea_id;
        if ($outline) $article->outline = $outline;
        if ($writing) $article->writing = $writing;
        $article->user_id = loggedInUserId();
        $article->save();

        return $article;
    }
}
