<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Category;
use App\Models\Promotions\Promotion;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $subcategories = $category->subcategories;

        if ($category->isParentCategory()) {
          $promotions = $category->parentCategoryPromotions()
            ->with('images')
            ->with('mediumImage')
            ->with('category')
            ->latest()
            ->simplePaginate(9);
        } else {
          $promotions = $category->promotions()
            ->with('images')
            ->with('mediumImage')
            ->with('category')
            ->latest()
            ->simplePaginate(9);
        }

        return view('category.show', compact('category', 'subcategories', 'promotions'));
    }
}
