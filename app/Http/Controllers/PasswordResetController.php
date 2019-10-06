<?php

namespace App\Http\Controllers;

use App\GeneralUser;
use App\Notifications\ResetPassword;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use http\Encoding\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class PasswordResetController extends Controller
{
    public function showForm(){
        return view('Frontend Pages.resetPassword');
    }

    public function sendPasswordResetToken(Request $request){
        $user = GeneralUser::where ('email', $request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user.
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => uniqid('tokenID'),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        $token = $tokenData->token;
        $email = $request->email;

        Notification::route('mail',$email)
            ->notify(new ResetPassword($tokenData));

        Toastr::success('Check Your Email','Success',['positionClass'=>'toast-top-right']);
        return redirect()->route('Home');

    }

    public function showPasswordResetForm($token){
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        if ( !$tokenData ) {
            Toastr::success('Check Your Email','Success',['positionClass'=>'toast-top-right']);
            return redirect()->to('home');
        }else{
            return view('Frontend Pages.passwordResetForm',compact('tokenData'));
        }
    }

    public function resetPassword(Request $request, $token) {
        //some validation

        //return $request->all();

        $this->validate($request, [
            'password' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirmPassword' => 'required|same:password',
        ]);



        $password = $request->password;
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        $user = GeneralUser::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->to('home'); //or wherever you want

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();


        // If the user shouldn't reuse the token later, delete the token
        DB::table('password_resets')->where('email', $user->email)->delete();

        Toastr::success('Password Reset. User Your new password to login','Success',['positionClass'=>'toast-top-right']);

        return redirect()->route('loginPage');
 }
}
