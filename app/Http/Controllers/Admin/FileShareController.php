<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\GeneralUser;
use App\Notifications\UserNotification;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = DB::table('files')
            ->orderBy('id','DESC')
            ->get();
        return view('Backend Pages.FileShare.inbox',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend Pages.FileShare.sendFile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

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

        $user = GeneralUser::find($userID);
        $user->notify(new UserNotification());

        Toastr::success('success','File Sent',['positionClass'=>'toast-top-right']);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return Storage::download($file->path,$file->fileName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return $id;

        $files = DB::table('files')
            ->where('userID', $id)
            ->orderBy('id','DESC')
            ->get();

        $user = DB::table('files')
            ->where('userID', $id)
            ->orderBy('created_at','DESC')
            ->get()
            ->first();

        //return $files;
        //return $user->userName;

        return view('Backend Pages.FileShare.singleUserInbox',compact('files','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = DB::table('files')
            ->where('id','=',$id)
            ->get()
            ->first();

        $userName =  $file->userName;

        $fileCount = DB::table('files')
            ->where('userName','=',$userName)
            ->get()
            ->count();

        if ($fileCount > 1){
            $del = File::find($id);

            Storage::delete($del->path);
            $del->delete();
            Toastr::success('success','File Deleted',['positionClass'=>'toast-top-right']);
            return redirect()->back();
        }else{
            $del = File::find($id);

            Storage::delete($del->path);
            $del->delete();
            Toastr::success('success','File Deleted',['positionClass'=>'toast-top-right']);
            return redirect()->route('shareFile.index');
        }


    }
}
