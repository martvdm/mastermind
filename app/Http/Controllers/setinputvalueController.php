<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class setinputvalueController extends Controller
{


    public function index(Request $request)
    {
       $selectedcolorsession = Session::get('selectedcolor');
        $selectedcolorrequest = $request->selectedcolor;
        if (isset($selectedcolorrequest)) {
            Session::put('selectedcolor' , $selectedcolorrequest);
            $selectedcolor = $selectedcolorrequest;
        } elseif (isset($selectedcolorsession)) {

            $selectedcolor = Session::get('selectedcolor');

        } else {
            $selectedcolor = '';
        }
  return view('mastermind.gameinput', ['selectedcolor' => $selectedcolor]);
    }

}
//{
////$selectedcolorrequest = $request->selectedcolor;
////$selectedcolorsession = Session::get('selectedcolor');
////if (isset($selectedcolorsession)) {
////$selectedcolor = $selectedcolorsession;
////} else {
////    $selectedcolor = $selectedcolorrequest;
////    Session::put('selectedcolor', $selectedcolorrequest);
////}
////return view('mastermind.gameinput', ['selectedcolor' => $selectedcolor]);
////}
