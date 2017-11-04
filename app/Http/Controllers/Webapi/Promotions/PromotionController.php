<?php

namespace App\Http\Controllers\Webapi\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->searchQuery;
        
        $promotions = Promotion::where('company', 'like', "%{$query}%")
        ->orWhere('promotionname', 'like', "%{$query}%")
        ->orWhere('promotiondesc', 'like', "%{$query}%")
        ->with(['category', 'images', 'mediumImage', 'locations', 'applications'])
        ->get()
        ->sortBy(function($promotion)
        {
            return $promotion->applications->count();
        })->slice(0, 100);

        return response()->json([
            'promotions' => $promotions,
        ]);
    }
}
