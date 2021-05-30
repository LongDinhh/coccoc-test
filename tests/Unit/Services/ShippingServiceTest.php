<?php

namespace Tests\Unit\Services;

use App\Services\ShippingService;
use Mockery\MockInterface;
use App\Contracts\Services\ProductServiceInterface;
use Mockery;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class ShippingServiceTest extends TestCase
{
    protected MockObject $shippingService;

    protected MockInterface $productService;

    public function setUp(): void
    {
        parent::setUp();

        $this->productService = Mockery::mock(ProductServiceInterface::class);

        $this->shippingService = $this->getMockBuilder(ShippingService::class)
            ->setConstructorArgs([
                $this->productService,
            ])
            ->onlyMethods(['__construct'])
            ->getMock();
    }

    public function test_gross_prince()
    {
        $this->productService
            ->shouldReceive('getTotalPrice')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->shippingService->getGrossPrice();

        $this->assertIsFloat($response);
    }
}
