<?php

namespace App\Http\Controllers;

use App\Parsers\MyCourseParser;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    //
    /**
     * @var MyCourseParser
     */
    protected $courseParser;

    public function __construct(MyCourseParser $courseParser)
    {
        $this->courseParser = $courseParser;
    }

    public function index($id)
    {
        $data = $this->courseParser->parse($id);

        return view('my_course.index')->with($data);
    }
}
