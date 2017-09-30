<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        // TODO: SWITCH to /
        return view('v2.index');
    }
}
