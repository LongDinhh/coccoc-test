<?php

namespace App\Services;

use App\Contracts\Services\CalculatorShippingFeeServiceInterface;
use App\Models\Product;

class CalculatorShippingFeeService implements CalculatorShippingFeeServiceInterface
{
    protected Product $product;

    protected float $weightCoefficient;

    protected float $dimensionCoefficient;

    /**
     * CalculatorShippingFeeService constructor.
     * @param Product $product
     * @param float $weightCoefficient
     * @param float $dimensionCoefficient
     */
    public function __construct(Product $product, float $weightCoefficient, float $dimensionCoefficient)
    {
        $this->product = $product;
        $this->weightCoefficient = $weightCoefficient;
        $this->dimensionCoefficient = $dimensionCoefficient;
    }

    /**
     * Calculate Fee By Weight
     * Fee By Weight = Product Weight * Weight Coefficient
     *
     * @return float
     */
    public function getFeeByWeight(): float
    {
        return $this->product->getWeight() * $this->weightCoefficient;
    }

    /**
     * Calculate Fee By Dimension
     * Fee By Dimension = Width * Height * Depth * Dimension Coefficient
     *
     * @return float
     */
    public function getFeeByDimension(): float
    {
        return $this->product->getWidth()
            * $this->product->getHeight()
            * $this->product->getDepth()
            * $this->dimensionCoefficient;
    }

    /**
     * Calculate Shopping Fee
     * Take the maximum value of Fee By Dimension, Fee By Weight
     *
     * @return float
     */
    public function getShoppingFee(): float
    {
        return max($this->getFeeByDimension(), $this->getFeeByWeight());
    }

    /**
     * Calculate Total Price of product
     * Total Price = Product Price * Shopping Fee
     *
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->product->getPrice() * $this->getShoppingFee();
    }
}
