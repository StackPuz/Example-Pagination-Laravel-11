<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController {

    public function index()
    {
        $size = request()->input('size') ?? 10;
        $order = request()->input('order') ?? 'id';
        $direction = request()->input('direction') ?? 'asc';
        $query = Product::query()
            ->select('id', 'name', 'price')
            ->orderBy($order, $direction);
        $products = $query->paginate($size);
        return $products->items();
    }
}