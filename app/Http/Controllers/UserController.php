<?php

namespace App\Http\Controllers;

use App\GeneralUser;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        if (session()->has("name")){
            return redirect()->route('Home');
        }else{
            return view('Frontend Pages.loginPage');
        }
        //return view('Frontend Pages.loginPage');
    }

    // Store New General User Information

    public function store(request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:general_users',
            'password' => 'required|string|min:6',
        ]);

        $user = new GeneralUser();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        Toastr::success('Data Added Successfully!!!','Success',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }

    // Authenticating a User

    public function authenticate(request $request){
        $this->validate($request,[
            'email'           => 'required',
            'password'        => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = GeneralUser::where('email', '=', $email)->first();

        if ($user){
            $hashedPassword = $user->password;
            if (Hash::check($password,$hashedPassword)) {
                session ( [
                    'name'      => $user->fname." ". $user->lname,
                ] );
                session ( [
                    'userID'   => $user->id
                ] );
                Session::flash ( 'successMessage', "Welcome! You are logged in." );
                //return redirect()->route('officer.dashboard',compact('user'));
                return redirect()->route('Home');
            }
            else{
                Session::flash ( 'message', "Invalid Password , Please try again." );
                return redirect()->back();
            }
        }
        else{
            Session::flash ( 'message', "Invalid Email , Please try again." );
            return redirect()->back();
        }
    }

    //Logout An User

    public function logOut(){
        Session::flush();
        Session::forget('email');
        return redirect()->back();
    }
}
