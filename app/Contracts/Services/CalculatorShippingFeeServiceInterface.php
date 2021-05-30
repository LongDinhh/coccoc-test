<?php

namespace App\Contracts\Services;

interface CalculatorShippingFeeServiceInterface
{
    public function getFeeByDimension(): float;

    public function getFeeByWeight(): float;

    public function getShoppingFee(): float;

    public function getTotalPrice(): float;
}
