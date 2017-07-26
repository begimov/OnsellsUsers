<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

class ApplicationController extends Controller
{
    public function create(Promotion $promotion)
    {
        echo $promotion->promotionname;
    }
}
