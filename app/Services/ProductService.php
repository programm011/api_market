<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public function list()
    {
        $products = Product::active()->with('category')
            ->whereRelation('category','is_active','=',true)->paginate();
        return $products;
    }
}
