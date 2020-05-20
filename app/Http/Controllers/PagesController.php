<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PagesController extends Controller
{
    //
    public function root()
    {
//        dump(Crypt::decryptString(Auth::User()->password));
        return view('pages.root');
    }
}
