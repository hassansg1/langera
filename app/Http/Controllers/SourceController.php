<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleSource;
use App\Models\UserIdea;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $articelId = $request->articleId;
        return response()->json([
            'html' => view('ajax.add_new_source')->with(compact('articelId'))->render()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($request->file('source_file'))
        {
            $image = $request->file('source_file');
            $imageName = $image->getClientOriginalName();
            $name = rand(1000000, 10000000) . $imageName;
            $image->move(public_path('images'), $name);
        }

        $source = ArticleSource::addNew($request->article_id, $request->source_type, $request->source_title, $request->source_link, $name ?? '');
        return response()->json([
            'html' => view('article.partials.researching.item')->with('item', $source)->render()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addToArticle(Request $request)
    {
        $articleId = $request->article_id;
        if (!$articleId || $articleId == '')
            $articleId = Article::create([])->id;

        $article = Article::addUpdate($articleId, $request->id);

        return response()->json([
            'status' => true,
            'article_id' => $article->id,
        ]);
    }
}
