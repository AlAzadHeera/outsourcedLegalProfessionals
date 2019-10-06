<?php

namespace App\Http\Controllers\Admin;

use App\GeneralUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutocompleteController extends Controller
{

    public function search(Request $request){
        return GeneralUser::all();
    }
}
