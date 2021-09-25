<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function updateProfile(Request $request, $id)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],

        ]);
        if($validator->fails()){

            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->about = $request->get('about');
//        $user->dob = date('Y-m-d', strtotime($request->get('dob')));

        if ($request->file('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
//            if (file_exists(public_path($user->avatar))) {
//                unlink(public_path($user->avatar));
//            }
            $user->avatar = '/images/' . $avatarName;
        }
        $user->update();
        if ($user) {
            Session::flash('message', 'User Details Updated successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
//            return response()->json([
//                'isSuccess' => true,
//                'Message' => "User Details Updated successfully!"
//            ], 200); // Status code here
        } else {
            Session::flash('message', 'Something went wrong!');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
//            return response()->json([
//                'isSuccess' => true,
//                'Message' => "Something went wrong!"
//            ], 200); // Status code here
        }
    }

    public function updatePassword(Request $request, $id)
    {

       $data = $request->all();
        $validator = Validator::make($data, [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        if($validator->fails()){
            Session::flash('message', 'Password is required , minimum 6 character, password and confirm password must match');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {

            Session::flash('message', 'Your Current password does not matches with the password you provided. Please try again.');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
//            return response()->json([
//                'isSuccess' => false,
//                'Message' => "Your Current password does not matches with the password you provided. Please try again."
//            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return redirect()->back();
//                return response()->json([
//                    'isSuccess' => true,
//                    'Message' => "Password updated successfully!"
//                ], 200); // Status code here
            } else {
Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');

                return redirect()->back();
//                return response()->json([
//                    'isSuccess' => true,
//                    'Message' => "Something went wrong!"
//                ], 200); // Status code here
            }
            }
    }

    public function clearSession(Request $request)
    {
        Session::forget('message');
    }
}
