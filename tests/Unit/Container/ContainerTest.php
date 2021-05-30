<?php

namespace Tests\Unit\Container;

use App\Container\Container;
use Tests\TestCase;

class ContainerTest extends TestCase
{
    protected Container $container;

    public function setUp(): void
    {
        parent::setUp();

        $this->container = new Container();
    }

    public function test_closure_resolution()
    {
        $this->container->bind('name', function () {
            return 'You';
        });

        $this->assertSame('You', $this->container->make('name'));
    }
}
