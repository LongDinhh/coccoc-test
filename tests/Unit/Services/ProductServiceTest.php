<?php

namespace Tests\Unit\Services;

use App\Helpers\FakeHelper;
use App\Services\ProductService;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    protected $productService;

    public function setUp(): void
    {
        parent::setUp();

        $this->productService = $this->createMock(ProductService::class);
    }

    public function test_get_total_price()
    {
        $product = FakeHelper::createProduct();

        $response = $this->productService->getTotalPrice($product);

        $this->assertIsFloat($response);
    }
}
