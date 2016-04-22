<?php

/**
 * @group Core
 * @group Core\Router
 */
class RouterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function itResolvesAValidRoute()
    {
        $router = new App\Core\Router();
        $resolution = $router->resolve('/');

        $this->assertTrue($resolution);
        $this->assertEquals('UserController', $router->getController());
        $this->assertEquals('index', $router->getAction());
    }

    /**
     * @test
     * @expectedException App\Exceptions\UndefinedRouteException
     */
    public function itThrowsUndefinedRouteException()
    {
        $router = new App\Core\Router();
        $router->resolve('/idontexist');
    }

    /**
     * @test
     * @expectedException App\Exceptions\InvalidRouteFormatException
     */
    public function itThrowsInvalidRouteFormatException()
    {
        $router = new App\Core\Router();
        $router->addRoute('/cheese', 'TheBeez-->Knees!!');
        $router->resolve('/cheese');
    }

    /**
     * @test
     * @expectedException App\Exceptions\InvalidRouteFormatException
     */
    public function itThrowsInvalidRouteResolution()
    {
        $router = new App\Core\Router();
        $router->addRoute('/cheese', 'TheLittlestController@YEEEHAAAAA');
        $router->resolve('/cheese');
    }
}