<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FlashCards;
use App\Models\ToDoList;
use App\Models\UserIdea;
use Illuminate\Http\Request;

class ToDoListController extends Controller
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
            'html' => view('ajax.to_do_list')->render()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $item = ToDoList::addNew($request->title);
        return response()->json([
            'html' => view('ajax.to_do_list_item')->with('item', $item)->render()
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

    public function toggleCheckValue(Request $request)
    {
        $item = ToDoList::find($request->id);
        $item->checked = $request->value == 'true' ? 1 : 0;
        $item->save();

        return response()->json([
            'status' => true
        ]);
    }
}
