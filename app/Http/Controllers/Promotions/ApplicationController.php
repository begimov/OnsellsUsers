<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Promotion $promotion)
    {
        return redirect()->route('promotion.show', [
            'id' => $promotion->id
        ])->with('status', 'Заявка получена. Можно воспользоваться скидкой.');
    }
}
