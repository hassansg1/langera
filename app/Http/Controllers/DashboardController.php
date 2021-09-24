<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->usertype_id == 2)
            return view('dashboard.index');

        return redirect('/course');
    }
}
