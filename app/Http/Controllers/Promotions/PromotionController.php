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
      return view('promotion.show', compact('promotion', 'applied'));
    }
}
