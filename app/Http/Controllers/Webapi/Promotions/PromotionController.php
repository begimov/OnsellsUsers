<?php

namespace App\Http\Controllers\Webapi\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->searchQuery;
        
        $promotions = Promotion::where('company', 'like', "%{$query}%")
            ->orWhere('promotionname', 'like', "%{$query}%")
            ->orWhere('promotiondesc', 'like', "%{$query}%")
            ->with(['category', 'images', 'mediumImage', 'locations', 'applications'])
            ->latest()
            ->limit(100)
            ->get();

        if ($promotions->isEmpty()) {
            Storage::prepend('NoResultSearchQueries.log', $query);
        }

        return response()->json([
            'promotions' => $promotions,
        ]);
    }
}
