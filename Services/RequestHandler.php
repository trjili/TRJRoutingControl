<?php
/**
 * Created by PhpStorm.
 * User: tarek
 * Date: 2/20/15
 * Time: 4:23 PM
 */
namespace TRJ\RoutingControlBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use TRJ\RoutingControlBundle\Configurator\Configurator;

class RequestHandler
{
    /** @var  Configurator */
    protected $configurator;

    /**
     * @param Configurator $configurator
     */
    public function __construct(Configurator $configurator)
    {
        $this->configurator = $configurator;
    }

    /**
     * @param Request $request
     */
    public function handle(Request $request)
    {
        $routeRequested = $request->attributes->get('_route');
        $routes = $this->getBlackListRoutes();
        if (array_key_exists($routeRequested, $routes)) {
            $routeResponseConfig = $routes[$routeRequested];
            $request->attributes->set('_route', $routeResponseConfig['target']['_route']);
            $request->attributes->set('_controller', $routeResponseConfig['target']['_controller']);
        }
    }

    /**
     * @return array
     */
    private function getBlackListRoutes()
    {
        return $this->configurator->getRoutes();
    }
} 