<?php
/**
 * Created by PhpStorm.
 * User: tarek rjili
 * Date: 2/24/15
 * Time: 12:45 PM
 */

namespace TRJ\RoutingControlBundle\Tests\Handler;

use TRJ\RoutingControlBundle\Configurator\Configurator;
use TRJ\RoutingControlBundle\Services\RequestHandler;


class RequestHandlerTest
{
    private $handler;
    public function setUp()
    {
        $configurator = new Configurator('/tmp/routing_control.yml');
        $this->handler = new RequestHandler($configurator);
    }
}
