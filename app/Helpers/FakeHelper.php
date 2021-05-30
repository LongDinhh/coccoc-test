<?php

namespace App\Helpers;

use App\Models\Product;

class FakeHelper
{
    /**
     * Create product
     *
     * @param bool $type
     * @return Product
     */
    public static function createProduct(bool $type = false): Product
    {
        return new Product(
            mt_rand(1, 100), // $price
            mt_rand(1, 100), // $weight
            mt_rand(1, 100), // $width
            mt_rand(1, 100), // $height
            mt_rand(1, 100), // $depth
            $type ? mt_rand(1, 10) : null, // $type
        );
    }

    /**
     * Create Many Products
     *
     * @param int $length
     * @param bool $type
     * @return array
     */
    public static function createProducts(int $length, bool $type = false): array
    {
        $products = [];

        for ($i = 0; $i < $length; $i++) {
            $products[] = self::createProduct($type);
        }

        return $products;
    }
}
