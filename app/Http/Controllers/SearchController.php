<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions\Promotion;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;
        $promotions = Promotion::where('company', 'like', "%{$query}%")
          ->orWhere('promotionname', 'like', "%{$query}%")
          ->orWhere('promotiondesc', 'like', "%{$query}%")
          ->get();
        return view('search.index', compact('promotions', 'query'));
    }
}
