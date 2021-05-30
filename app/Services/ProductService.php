<?php

namespace App\Services;

use App\Constants\CoefficientConstant;
use App\Contracts\Services\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    /**
     * Get Total Price Product
     *
     * @param Product $product
     * @return float
     */
    public function getTotalPrice(Product $product): float
    {
        // Create Calculator Shipping Fee Service with product
        $shippingFee = new CalculatorShippingFeeService(
            $product,
            CoefficientConstant::WEIGHT_COEFFICIENT,
            CoefficientConstant::DIMENSION_COEFFICIENT
        );

        // Total price of product
        return $shippingFee->getTotalPrice();
    }
}
