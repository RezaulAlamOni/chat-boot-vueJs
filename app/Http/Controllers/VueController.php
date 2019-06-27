<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function AllUsers(){
        $users = User::where('id','!=',auth()->id())->get();
        return response()->json(['users'=>$users,'auth'=>auth()->user()],200);
    }
}
