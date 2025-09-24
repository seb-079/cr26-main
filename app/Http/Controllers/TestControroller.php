<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestControroller extends Controller
{
    //
}

use Illuminate\View\View;
class TestController extends Controller
{
    function index()
    {
        return view('test2.index');
    }
}
