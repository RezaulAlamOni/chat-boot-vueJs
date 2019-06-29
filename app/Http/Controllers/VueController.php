<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class VueController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function AllUsers(){
        $user = auth()->user();
        $user->status = 1;
        $user->save();
        $users = User::where('id','!=',auth()->id())->get();
        return response()->json(['users'=>$users,'auth'=>auth()->user()],200);
    }
    public function userChatData(Request $request){
        $id = $request->id;
        $users = User::where('id',$id)->first();

        $message = Message::where('sender',auth()->id())->Where('receiver',$id)
            ->orWhere('receiver',auth()->id())->Where('sender',$id)
            ->orderBy('id','asc')->get();

        return response()->json(['user'=>$users,'msg'=>$message],200);

    }
    public function UpdateStatus(Request $request){
        $id = $request->id;
        $user = User::where('id',$id)->first();
        $user->status = 0;
        $user->save();
        return response()->json(['status'=>'success'],200);

    }
    public function messageSend(Request $request){
        $receiver = $request->sendTo;
        $sender = $request->sendFrom;
        $text = $request->text;

        $message = New Message();
        $message->sender = $sender;
        $message->receiver = $receiver;
        $message->message = $text;
        $message->save();
        return response()->json(['status'=>'success'],200);

    }
    public function UploadPhoto(){
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "image/".$_FILES['file']['name'])) {

            return response()->json('success',200);
        }else{
            return response()->json('failed',500);
        }
    }
}
