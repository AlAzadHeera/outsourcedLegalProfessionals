<?php

namespace App\Http\Controllers;

use App\File;
use App\Notifications\FileSendNotification;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileShareController extends Controller
{
    public function index(){
        if (session()->has("name")){
            $userName = session()->get('name');
            $userID = session()->get('userID');

            $files = DB::table('files')
                ->where('userID', $userID)
                ->orderBy('id','DESC')
                ->get();

            return view('Frontend Pages.inbox',compact('userName','userID','files'));
        }else{
            return view('Frontend Pages.loginPage');
        }
    }

    public function fileStore(Request $request){
        $sender = $request->sender;
        $userID = $request->userID;
        $name = $request->name;
        $note = $request->note;

        $files = $request->file('file');

        if ($files){
            foreach ($files as $file){
                File::create([
                    'sender' =>  $sender,
                    'userID' => $userID,
                    'userName' =>$name,
                    'note' => $note,
                    'fileName' => $file->getClientOriginalName(),
                    'path' => $file->store('public/storage')
                ]);
            }
        }else{
            File::create([
                'sender' =>  $sender,
                'userID' => $userID,
                'userName' =>$name,
                'note' => $note
            ]);
        }

        $users = User::all();
        foreach ($users as $user)
            $user->notify(new FileSendNotification());

        Toastr::success('success','File Sent',['positionClass'=>'toast-top-right']);
        return redirect()->route('inbox');
    }

}
