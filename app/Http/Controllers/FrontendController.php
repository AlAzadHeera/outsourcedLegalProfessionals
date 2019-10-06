<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function about(){
        return view('Frontend Pages.about');
    }

    public function service(){
        return view('Frontend Pages.service');
    }

    public function contact(){
        return view('Frontend Pages.contact');
    }
}
