<?php

namespace Tests\Unit\Http\Controllers;

use App\Contracts\Services\ShippingServiceInterface;
use App\Http\Controllers\ShippingController;
use Mockery;
use Tests\TestCase;

class ShippingControllerTest extends TestCase
{
    protected $shippingController;
    protected $shippingService;

    public function setUp(): void
    {
        parent::setUp();

        $this->shippingService = Mockery::mock(ShippingServiceInterface::class);

        $this->shippingController = $this->getMockBuilder(ShippingController::class)
            ->setConstructorArgs([
                $this->shippingService,
            ])
            ->onlyMethods(['__construct'])
            ->getMock();
    }

    public function test_get_gross_price()
    {
        $this->shippingService->shouldReceive('getGrossPrice')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->shippingController->getGrossPrice();

        $this->assertIsFloat($response);
    }
}
