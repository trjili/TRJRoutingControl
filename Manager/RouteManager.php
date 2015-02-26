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

class RouteManager
{

    protected $router;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @return null|RouteCollection
     */
    public function getRoutes()
    {
         return $this->router->getRouteCollection();
    }
} 