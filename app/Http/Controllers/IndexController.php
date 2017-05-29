<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Category;
use App\Traits\AjaxPaginationResponse;

class IndexController extends Controller
{
    use AjaxPaginationResponse;

    public function index(Request $request)
    {
        $promotions = Promotion::with('images')
          ->with('mediumImage')
          ->with('category')
          ->latest()
          ->paginate(9);

        if ($request->ajax()) {
            return $this->ajaxNextPageResponse($promotions);
        }
        return view('index', compact('promotions'));
    }
}
