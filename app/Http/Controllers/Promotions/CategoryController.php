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

        $promotions = Promotion::all();
        return view('category.show', compact('category', 'subcategories', 'promotions'));
    }
}
