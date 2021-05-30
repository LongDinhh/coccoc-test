<?php

namespace App\Services;

use App\Contracts\Services\{
    ProductServiceInterface,
    ShippingServiceInterface,
};
use App\Helpers\FakeHelper;
use App\Models\Product;

class ShippingService implements ShippingServiceInterface
{
    protected ProductServiceInterface $productService;

    /**
     * ShippingService constructor.
     * @param ProductServiceInterface $productService
     */
    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Calculate Gross Price
     * Sum list products in order
     *
     * @return float
     */
    public function getGrossPrice(): float
    {
        // Fake list products of order (4 items)
        $products = FakeHelper::createProducts(4);

        // Calculate Gross Price
        return array_reduce($products, function (float $price, Product $product) {
            $price += $this->productService->getTotalPrice($product);

            return $price;
        }, 0);
    }
}
