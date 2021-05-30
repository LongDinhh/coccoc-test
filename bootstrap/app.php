<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Container\Container;
use App\Contracts\Services\ShippingServiceInterface;
use App\Http\Controllers\ShippingController;
use App\Services\ShippingService;

$container = new Container();

// Bind Interface with class Implementation
$container->bind(ShippingServiceInterface::class, ShippingService::class);

$shippingController = $container->make(ShippingController::class);
 $shippingController->getGrossPrice();
