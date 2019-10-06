<?php

namespace App\Http\Controllers;

use App\Notifications\UserMessageNotification;
use App\User;
use App\UserMessage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fName'   => 'required',
            'lName'   => 'required',
            'email'   => 'required',
            'message' => 'required'
        ]);

        $message = new UserMessage();
        $message->fName = $request->fName;
        $message->lName = $request->lName;
        $message->email = $request->email;
        $message->subject = $request->suject;
        $message->message = $request->message;
        $message->save();

        $users = User::all();
        foreach ($users as $user)
            $user->notify(new UserMessageNotification());

        Toastr::success('Message Sent Successfully!!!','Success',['positionClass'=>'toast-top-right']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
