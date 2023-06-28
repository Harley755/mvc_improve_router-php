<?php

namespace Tests\Unit;

use Router\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /** @test */
    public function it_registers_routes(): void
    {
        $router = new Router();
        $router->register('/', ['Controllers\HomeController', 'index']);

        // $this->assertTrue(true);
        $this->assertEquals(
            ['/' => ['Controllers\HomeController', 'index']],
            $router->getRoutes()
        );
    }

    /** @test */
    public function it_doesnt_have_any_routes_before_registering_routes(): void
    {
        $router = new Router();

        $router = new Router();

        $this->assertEmpty($router->getRoutes());
    }
}
