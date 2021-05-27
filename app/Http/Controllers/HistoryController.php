<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function history($c)
    {
        $dec='lorem ipsum lorem ipsum';
        $emps=array('abc','def','ghi');
        return view('history', compact('dec','c','emps'));
    }
}
