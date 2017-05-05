<?php

namespace App\Models\Promotions;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('weight', 'desc');
    }

    public function isParentCategory()
    {
        return is_null($this->parent_id);
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function parentCategoryPromotions()
    {
        return $this->hasManyThrough(
          Promotion::class, Category::class,
          'parent_id', 'category_id', 'id'
        );
    }
}
