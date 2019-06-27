<?php

namespace App\Http\Controllers;

use App\User;
use http\Message;
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
    public function userChatData(Request $request){
        $id = $request->id;
        $users = User::where('id',$id)->first();

        $message = [];
        return response()->json(['user'=>$users,'message'=>$message],200);

    }
}
