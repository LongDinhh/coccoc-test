<?php

namespace Tests\Unit\Services;

use App\Constants\CoefficientConstant;
use App\Contracts\Services\CalculatorShippingFeeServiceInterface;
use App\Helpers\FakeHelper;
use App\Models\Product;
use App\Services\CalculatorShippingFeeService;
use Mockery\MockInterface;
use Mockery;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class CalculatorShippingFreeServiceTest extends TestCase
{
    protected MockObject $calculatorShippingFeeService;
    protected MockInterface $calculatorShippingFeeServiceInterface;

    protected Product $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Mockery::mock(Product::class);
        $this->calculatorShippingFeeServiceInterface = Mockery::mock(CalculatorShippingFeeServiceInterface::class);

        $this->calculatorShippingFeeService = $this->getMockBuilder(CalculatorShippingFeeService::class)
            ->setConstructorArgs([
                FakeHelper::createProduct(),
                CoefficientConstant::WEIGHT_COEFFICIENT,
                CoefficientConstant::DIMENSION_COEFFICIENT,
            ])
            ->onlyMethods(['__construct'])
            ->getMock();
    }

    public function test_get_fee_by_weight()
    {
        $this->product
            ->shouldReceive('getWeight')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeService->getFeeByWeight();

        $this->assertIsFloat($response);
    }

    public function test_get_fee_by_dimension()
    {
        $this->product
            ->shouldReceive('getWidth', 'getHeight', 'getDepth')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeService->getFeeByDimension();

        $this->assertIsFloat($response);
    }

    public function test_get_shopping_fee()
    {
        $this->calculatorShippingFeeServiceInterface
            ->shouldReceive('getFeeByDimension', 'getFeeByWeight')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeService->getShoppingFee();

        $this->assertIsFloat($response);
    }

    public function test_get_total_price()
    {
        $this->product
            ->shouldReceive('getPrice')
            ->once()
            ->andReturn((float) mt_rand());

        $this->calculatorShippingFeeServiceInterface
            ->shouldReceive('getShoppingFee')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeService->getShoppingFee();

        $this->assertIsFloat($response);
    }
}
