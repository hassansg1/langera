<?php

use App\Models\Conversations;
use App\Models\GroupUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

if (!function_exists('getLang')) {
    function getLang($key)
    {
        $lang = __($key);

        if ($lang == $key)
            $lang = str_replace('_', ' ', $lang);
        return $lang;
    }
}

if (!function_exists('universalDateFormatter')) {
    function universalDateFormatter($date)
    {
        return $date ? $date->format('Y/m/d h:i:s') : '';
    }
}

if (!function_exists('flashSession')) {
    function flashSession($message, $type = 'success')
    {
        Session::flash('message', $message);
        Session::flash('alert-class', 'alert-' . $type);
    }
}

if (!function_exists('flashSuccess')) {
    function flashSuccess($message)
    {
        flashSession($message);
    }
}
if (!function_exists('flashError')) {
    function flashError($message)
    {
        flashSession($message, 'error');
    }
}
if (!function_exists('flashInfo')) {
    function flashInfo($message)
    {
        flashSession($message, 'info');
    }
}
if (!function_exists('flashWarning')) {
    function flashWarning($message)
    {
        flashSession($message, 'warning');
    }
}
if (!function_exists('getUnit')) {
    function getUnit()
    {
        return \App\Models\Unit::all();
    }
}
if (!function_exists('getCompanies')) {
    function getCompanies()
    {
        return \App\Models\Company::all();
    }
}
if (!function_exists('getProducts')) {
    function getProducts()
    {
        return \App\Models\Product::all();
    }
}
if (!function_exists('getServices')) {
    function getServices()
    {
        return \App\Models\Service::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('getBranches')) {
    function getBranches()
    {
        return \App\Models\Branch::all();
    }
}
if (!function_exists('getReferrals')) {
    function getReferrals()
    {
        return \App\Models\Client::all();
    }
}
if (!function_exists('lgUId')) {
    function lgUId(): int
    {
        return \Illuminate\Support\Facades\Auth::user()->id ?? 0;
    }
}
if (!function_exists('getGroupedPermissions')) {
    function getGroupedPermissions()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();
        return $permissions->mapToGroups(function ($item, $key) {
            return [$item['group'] => $item['name']];
        });

    }
}
if (!function_exists('loggedInUserId')) {
    function loggedInUserId()
    {
        return \Illuminate\Support\Facades\Auth::user()->id;

    }
}
function currentUser()
{
    return \Illuminate\Support\Facades\Auth::user();

}
function getUserCourses()
{
    return \Illuminate\Support\Facades\Auth::user()->courses;
}

function getConversation($from,$to){
   $chat = \App\Models\Conversations::with('userTo','userFrom')->whereNull('group_id')->where(['from'=>$from , 'to'=>$to])
       ->orWhere(function ($query) use($from,$to){
           $query->where(['from'=>$to , 'to'=>$from]);
       })->get();
   return \Illuminate\Support\Facades\View::make('chat.chatModel.chat')->with(['chat'=>$chat,'to'=>$to])->render();
}
function getGroupMessages($groupId){
   $chat = \App\Models\Conversations::with('userFrom')->where('group_id', '=',$groupId)->get();
    return \Illuminate\Support\Facades\View::make('chat.chatModel.groupChat')->with(['chat'=>$chat])->render();
}
function userChat (){

    $chats =  Conversations::with('userFrom','userTo')->where('group_id', '=',null)->where('from',Auth::id())->orWhere('to',Auth::id())
        ->groupBy(['from','to'])->get();
    return \Illuminate\Support\Facades\View::make('chat.chatModel.chatUser')->with(['chats'=>$chats])->render();

}
function chatGroups(){
    $groups = GroupUsers::with('group')->where('user_id',Auth::id())->groupBy('group_id')->get();
    return $groups;
}
