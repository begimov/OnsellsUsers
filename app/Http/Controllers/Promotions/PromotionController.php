<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    public function show(Promotion $promotion)
    {
        if (Auth::check()) {
            $applied = Auth::user()->appliedForPromotion($promotion->id);
        } else {
            $applied = false;
        }
        $promotions = Promotion::inRandomOrder()
            ->where('id', '!=', $promotion->id)
            ->with('images')
            ->with('mediumImage')
            ->take(2)
            ->get();
        return view('promotion.show', compact('promotion', 'applied', 'promotions'));
    }
}
