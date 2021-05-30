<?php

namespace App\Services;

use App\Contracts\Services\CalculatorShippingFeeTypeServiceInterface;

class CalculatorShippingFeeTypeService
    extends CalculatorShippingFeeService
    implements CalculatorShippingFeeTypeServiceInterface
{
    /**
     * Calculate Fee By Product Type
     * Fee = Product Weight * Product Type * weightCoefficient
     *
     * @return float
     */
    public function getFreeByProductType(): float
    {
        return $this->product->getWeight() * $this->product->getType() * $this->weightCoefficient;
    }

    /**
     * Calculate Fee By Product Type
     * Take the maximum value of Fee By Dimension, Fee By Weight, Fee By Product Type
     *
     * @return float
     */
    public function getShoppingFee(): float
    {
        return max($this->getFeeByDimension(), $this->getFeeByWeight(), $this->getFreeByProductType());
    }
}
