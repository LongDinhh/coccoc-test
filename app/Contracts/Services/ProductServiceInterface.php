<?php

namespace App\Contracts\Services;

use App\Models\Product;

interface ProductServiceInterface
{
    public function getTotalPrice(Product $product): float;
}
