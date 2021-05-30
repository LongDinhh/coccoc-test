<?php

namespace Tests\Unit\Services;

use App\Constants\CoefficientConstant;
use App\Contracts\Services\CalculatorShippingFeeTypeServiceInterface;
use App\Helpers\FakeHelper;
use App\Models\Product;
use App\Services\CalculatorShippingFeeTypeService;
use Mockery\MockInterface;
use Mockery;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class CalculatorShippingFreeTypeServiceTest extends TestCase
{
    protected MockObject $calculatorShippingFeeTypeService;

    protected MockInterface $calculatorShippingFeeServiceInterface;

    protected MockInterface $calculatorShippingFeeTypeServiceInterface;

    protected $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Mockery::mock(Product::class);
        $this->calculatorShippingFeeTypeServiceInterface = Mockery::mock(CalculatorShippingFeeTypeServiceInterface::class);

        $this->calculatorShippingFeeTypeService = $this->getMockBuilder(CalculatorShippingFeeTypeService::class)
            ->setConstructorArgs([
                FakeHelper::createProduct(),
                CoefficientConstant::WEIGHT_COEFFICIENT,
                CoefficientConstant::DIMENSION_COEFFICIENT,
            ])
            ->onlyMethods(['__construct'])
            ->getMock();
    }

    public function test_get_product_type()
    {
        $this->product
            ->shouldReceive('getWeight', 'getType')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeTypeService->getFreeByProductType();

        $this->assertIsFloat($response);
    }

    public function test_get_shopping_fee()
    {
        $this->calculatorShippingFeeTypeServiceInterface
            ->shouldReceive('getFeeByDimension', 'getFeeByWeight', 'getFreeByProductType')
            ->once()
            ->andReturn((float) mt_rand());

        $response = $this->calculatorShippingFeeTypeService->getShoppingFee();

        $this->assertIsFloat($response);
    }
}
