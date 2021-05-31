<?php

namespace App\Models;

class Product
{
    const TYPE_DEFAULT = 1;

    protected float $id;

    protected float $price;

    protected float $weight;

    protected float $width;

    protected float $height;

    protected float $depth;

    protected ?int $type;

    /**
     * Product constructor.
     *
     * @param float $price
     * @param float $weight
     * @param float $width
     * @param float $height
     * @param float $depth
     * @param int|null $type
     */
    public function __construct(float $price, float $weight, float $width, float $height, float $depth, ?int $type = null)
    {
        $this->price = $price;
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->type = $type;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @param float $depth
     */
    public function setDepth(float $depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getDepth(): float
    {
        return $this->depth;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type ?: self::TYPE_DEFAULT;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }
}
