<?php

namespace Tests\Unit\Models;

use App\Helpers\FakeHelper;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected Product $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = FakeHelper::createProduct();
    }

    public function test_set_weight()
    {
        $this->product->setWeight(1);

        $this->assertEquals(1, $this->product->getWeight());
    }

    public function test_set_height()
    {
        $this->product->setHeight(1);

        $this->assertEquals(1, $this->product->getHeight());
    }

    public function test_set_depth()
    {
        $this->product->setDepth(1);

        $this->assertEquals(1, $this->product->getDepth());
    }

    public function test_set_price()
    {
        $this->product->setPrice(1);

        $this->assertEquals(1, $this->product->getPrice());
    }

    public function test_set_type()
    {
        $this->product->setType(1);

        $this->assertEquals(1, $this->product->getType());
    }

    public function test_set_width()
    {
        $this->product->setWidth(1);

        $this->assertEquals(1, $this->product->getWidth());
    }
}
