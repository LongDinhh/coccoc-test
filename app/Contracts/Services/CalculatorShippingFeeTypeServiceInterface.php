<?php

namespace App\Contracts\Services;

interface CalculatorShippingFeeTypeServiceInterface
{
    public function getFreeByProductType(): float;
}
