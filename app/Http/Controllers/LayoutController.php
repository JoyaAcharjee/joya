<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function home(){
        return view('admin.pages.home');
    }
    public function about(){
        return view('admin.pages.about');
    }
    public function service(){
        return view('admin.pages.service');
    }
    public function contact(){
        return view('admin.pages.contact');
    }


}
