<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Category;

class IndexController extends Controller
{
    public function index()
    {
      // TODO: active 1
        $promotions = Promotion::where('active', 0)->latest()->simplePaginate(1);
        return view('index', compact('promotions', 'categories'));
    }
}
