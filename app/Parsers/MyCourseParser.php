<?php

namespace App\Parsers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class MyCourseParser
{
    public function parse($courseId)
    {
        return array_merge(
            ['courseId' => $courseId],
            $this->setArticles($courseId)
        );
    }

    public function setArticles($courseId)
    {
        Article::where('idea_id', null)->where('user_id', loggedInUserId())->where('course_id', $courseId)->delete();

        return ['articles' => Article::where('user_id', loggedInUserId())->where('course_id', $courseId)->get()];
    }
}
