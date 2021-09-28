<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Course;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\IOFactory;

class AjaxController extends Controller
{
    //

    public function getCoursesDropdown()
    {
        return response()->json([
            'html' => view('ajax.course_drop_down_modal')->render()
        ]);
    }

    public function saveUserCourses(Request $request)
    {
        foreach ($request->courses as $course) {
            DB::table('course_user')->where([
                'course_id' => $course,
                'user_id' => Auth::user()->id,
            ])->delete();

            DB::table('course_user')->insert([
                'course_id' => $course,
                'user_id' => Auth::user()->id,
            ]);
        }

        flashSuccess('Success...!!!');
        return true;
    }

    public function saveWriting(Request $request)
    {
        $article = Article::find($request->article_id);
        $article->writing = trim(stripslashes(htmlspecialchars($request->writing)));
        $article->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function saveOutlining(Request $request)
    {
        $article = Article::find($request->article_id);
        $article->outlining = trim(stripslashes(htmlspecialchars($request->outlining)));
        $article->save();

        return response()->json([
            'status' => true
        ]);
    }

    public function pdfOutlining(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $article = Article::find($request->article_id);
        $content = $article->outlining;

        $pdf = $pdf->loadView('pdf.pdf', compact('content'));
        $fileName = "Outlining";
        return $pdf->download($fileName . '.pdf');

    }

    public function pdfWriting(Request $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $article = Article::find($request->article_id);
        $content = $article->writing;

        $pdf = $pdf->loadView('pdf.pdf', compact('content'));
        $fileName = "Writing";
        return $pdf->download($fileName . '.pdf');

    }

    public function wordOutlining(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $article = Article::find($request->article_id);;
        $content = $article->writing;

        $data = View::make('word.word')->with(['content' => $content])->render();
        $doc = new \DOMDocument();
        $doc->loadHTML($data);
        Html::addHtml($section, $doc->saveXML(), true);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $file_name = 'Outlining' . '-' . now()->toDateString() . '.doc';
        $name = 'word/' . $file_name;
        $objWriter->save(public_path($name));
        return response()->json([
            'path' => $file_name
        ]);

    }
}
