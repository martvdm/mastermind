<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OptionsController extends Controller
{


    public function store(Request $request) {
        $lang = $request->lang;
        Session::put('lang', $lang);
        return back();
    }



}
