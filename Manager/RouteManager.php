<?php
/**
 * Created by PhpStorm.
 * User: tarek rjili
 * Date: 2/26/15
 * Time: 13:30 AM
 */
namespace TRJ\RoutingControlBundle\Manager;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\RouteCollection;
use TRJ\RoutingControlBundle\Configurator\Configurator;
use TRJ\RoutingControlBundle\Model\RouteControl;

class RouteManager
{

    /** @var  Router */
    protected $router;

    /** @var  Configurator */
    protected $configurator;

    /**
     * @param Router $router
     * @param Configurator $configurator
     */
    public function __construct(Router $router, Configurator $configurator)
    {
        $this->router = $router;
        $this->configurator = $configurator;
    }

    /**
     * @return null|RouteCollection
     */
    public function getRoutes()
    {
         return $this->router->getRouteCollection();
    }

    /**
     * @param RouteControl $routeControl
     */
    public function createRouteControl(RouteControl $routeControl)
    {
        $parameters = array(
            'target' => $routeControl->getTarget(),
            'enabled' => $routeControl->isEnabled(),
            'enabled_from' => $routeControl->getEnabledFrom(),
            'enabled_to' => $routeControl->getEnabledTo()
        );
        $this->configurator->mergeRoutes(
            array('name' => $parameters)
        );
    }

    /**
     * @param $name
     * @return RouteControl
     */
    public function findRouteControl($name)
    {
        $routesControl = $this->configurator->getRoutes();
        $routeControlParams = $routesControl[$name];
        $routeControl = new RouteControl();
        $routeControl->setName($name);
        $routeControl->setTarget($routeControlParams['target']);
        $routeControl->setEnabled($routeControlParams['enabled']);
        $routeControl->setEnabledFrom($routeControlParams['enabled_from']);
        $routeControl->setEnabledTo($routeControlParams['enabled_to']);

        return $routeControl;
    }
} 