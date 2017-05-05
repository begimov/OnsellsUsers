<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

class PromotionController extends Controller
{
    public function show(Promotion $promotion)
    {
      return view('promotion.show', compact('promotion'));
    }
}
