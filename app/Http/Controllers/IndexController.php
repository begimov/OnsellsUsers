<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Category;

class IndexController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        $categories = Category::all();
        return view('index', compact('promotions', 'categories'));
    }
}
