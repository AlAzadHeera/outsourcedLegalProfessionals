<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\GeneralUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GeneralUserController extends Controller
{
    public function index(){
        $generalUsers = GeneralUser::all();
        return view('Backend Pages.GeneralUsers.index',compact('generalUsers'));
    }

    public function deleteUser($id){
        $user = GeneralUser::find($id);

        $files = DB::table('files')
            ->where('userID','=',$id)
            ->get();

        foreach ($files as $file){
            Storage::delete($file->path);
            $deleteFile = DB::table('files')
                ->where('userID','=',$id)
                ->delete();
        }

        $user->delete();
        Toastr::success('success','User Deleted',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }

    public function allFileDelete($id){
        $files = DB::table('files')
            ->where('userID','=',$id)
            ->get();

        foreach ($files as $file){
            Storage::delete($file->path);
            $deleteFile = DB::table('files')
                ->where('userID','=',$id)
                ->delete();
        }

        Toastr::success('success','File(s) Deleted',['positionClass'=>'toast-top-right']);
        return redirect()->route('shareFile.index');

    }

}
