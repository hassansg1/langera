<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FlashCards;
use App\Models\QuickLink;
use App\Models\UserIdea;
use Illuminate\Http\Request;

class QuickLinkController extends Controller
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
    public function create()
    {
        return response()->json([
            'html' => view('ajax.add_new_quick_link')->render()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $item = QuickLink::addNew($request->title, $request->link);
        return response()->json([
            'html' => view('my_course.quick_links.item')->with('item', $item)->render()
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
