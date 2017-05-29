<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotions\Promotion;
use App\Traits\AjaxPaginationResponse;

class SearchController extends Controller
{
    use AjaxPaginationResponse;

    public function index(Request $request)
    {
        $query = $request->q;
        $promotions = Promotion::with('images')
          ->with('mediumImage')
          ->with('category')
          ->where('company', 'like', "%{$query}%")
          ->orWhere('promotionname', 'like', "%{$query}%")
          ->orWhere('promotiondesc', 'like', "%{$query}%")
          ->latest()
          ->paginate(9);

        if ($request->ajax()) {
            return $this->ajaxNextPageResponse($promotions);
        }
        return view('search.index', compact('promotions'));
    }
}
