<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getSearchProducts(array $filters)
    {
        $query = Product::query();

        if (isset($filters['name']) && !empty($filters['name'])) {
            $query->where('product_name', 'like', '%' . $filters['name'] . '%');
        }
        if (isset($filters['price']) && !empty($filters['price'])) {
            $query->where('price', 'like', '%' . $filters['price'] . '%');
        }
        return $query->orderBy('id', 'desc')->paginate(10);
    }
}
