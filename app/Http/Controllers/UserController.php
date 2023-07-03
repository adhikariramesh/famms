<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe;

class UserController extends Controller
{
    public function subscribe(Request $reqest){
            $subscribe = new Subscribe;
            $subscribe->email = $reqest->email;
            $subscribe->save();
            return redirect()->back()->with('message','you are subscribe successfully');
    }
}
