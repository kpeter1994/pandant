<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function paxError(){
        return view('pages.tools.pax-error');
    }
}
