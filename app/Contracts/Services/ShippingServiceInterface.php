<?php

namespace App\Contracts\Services;

interface ShippingServiceInterface
{
    public function getGrossPrice(): float;
}
