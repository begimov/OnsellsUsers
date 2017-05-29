<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Category;
use App\Models\Promotions\Promotion;
use App\Traits\AjaxPaginationResponse;

class CategoryController extends Controller
{
    use AjaxPaginationResponse;

    public function show(Request $request, Category $category)
    {
        $subcategories = $category->subcategories;

        if ($category->isParentCategory()) {
          $promotions = $category->parentCategoryPromotions()
            ->with('images')
            ->with('mediumImage')
            ->with('category')
            ->latest()
            ->paginate(9);
        } else {
          $promotions = $category->promotions()
            ->with('images')
            ->with('mediumImage')
            ->with('category')
            ->latest()
            ->paginate(9);
        }

        if ($request->ajax()) {
            return $this->ajaxNextPageResponse($promotions);
        }

        return view('category.show', compact('category', 'subcategories', 'promotions'));
    }
}
