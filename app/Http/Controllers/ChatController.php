<?php

namespace App\Http\Controllers;

use App\Models\Conversations;
use App\Models\Groups;
use App\Models\GroupUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::where('usertype_id','2')->where('id','!=', Auth::id())->get();
        $chats =  Conversations::with('userFrom','userTo')->where('group_id', '=',null)->where('from',Auth::id())->orWhere('to',Auth::id())
            ->groupBy(['from','to'])->get();
        $groups = GroupUsers::with('group')->where('user_id',Auth::id())->groupBy('group_id')->get();
        return view('chat.index')->with(['users'=>$users,'chats'=>$chats,'groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $convesation = new Conversations();
        $convesation->from = Auth::id();
        $convesation->to = $request->userId;
        $convesation->message = $request->message;
        $convesation->save();
        $convesationData = getConversation(Auth::id(),$request->userId);
        if($convesation){
            return response()->json(['success'=>1,'conversation'=>$convesationData]);

        }
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
    public function chatData(Request $request)
    {
        $convesationData = getConversation(Auth::id(),$request->userId);
        if ($convesationData){
            return response()->json(['success'=>1,'conversation'=>$convesationData,'user'=>$request->userId,'auth'=>Auth::id()]);
        }
    }
    public function createGroup(Request $request){
//        dd($request->all());
        $group= new Groups();
        $group->name= $request->groupName;
        $group->owner_id= Auth::id();
        $group->status = '1';
        $group->save();
        if($group){
            foreach ($request->groupUser as $user){
                $groupUser = new GroupUsers();
                $groupUser->group_id = $group->id;
                $groupUser->user_id = $user;
                $groupUser->save();
                }

            return redirect()->back()->with(['success'=>'Group created successfully']);
        }
        return redirect()->back()->with(['error'=>'Something went wrong']);
    }
    public function addGroupMessages(Request $request){

        $convesation = new Conversations();
        $convesation->from = Auth::id();
        $convesation->group_id = $request->groupId;
        $convesation->message = $request->message;
        $convesation->save();
        $convesationData =   getGroupMessages($request->groupId);
        if($convesation){
            return response()->json(['success'=>1,'conversation'=>$convesationData]);

        }
    }
    public function groupMessages(Request $request){
        $convesationData =   getGroupMessages($request->groupId);
        if ($convesationData){
            return response()->json(['success'=>1,'conversation'=>$convesationData,]);
        }

    }
}
