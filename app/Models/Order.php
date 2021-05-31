<?php

namespace App\Models;

class Order
{
    protected int $id;

    protected int $productId;

    protected float $grossPrince;

    protected float $weightCoefficient;

    protected float $dimensionCoefficient;

    /**
     * @param int $weightCoefficient
     */
    public function setWeightCoefficient(int $weightCoefficient): void
    {
        $this->weightCoefficient = $weightCoefficient;
    }

    /**
     * @param int $dimensionCoefficient
     */
    public function setDimensionCoefficient(int $dimensionCoefficient): void
    {
        $this->dimensionCoefficient = $dimensionCoefficient;
    }

    /**
     * @return int
     */
    public function getWeightCoefficient(): int
    {
        return $this->weightCoefficient;
    }

    /**
     * @return int
     */
    public function getDimensionCoefficient(): int
    {
        return $this->dimensionCoefficient;
    }

    /**
     * @return int
     */
    public function getGrossPrince(): int
    {
        return $this->grossPrince;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $grossPrince
     */
    public function setGrossPrince(int $grossPrince): void
    {
        $this->grossPrince = $grossPrince;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }
}
