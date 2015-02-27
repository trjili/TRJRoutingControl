<?php

namespace TRJ\RoutingControlBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use TRJ\RoutingControlBundle\Model\RouteControl;
use TRJ\RoutingControlBundle\Manager\RouteManager;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ControlController extends Controller
{
    /**
     * @param $name
     * @return RedirectResponse
     */
    public function newAction($name)
    {
        /** @var RouteManager $routeManager */
        $routeManager = $this->get('trj_routing_control.route.manager');
        /** @var RouteCollection $routes */
        $routes = $routeManager->getRoutes();
        $route = $routes->get($name);
        $routeControl = new RouteControl();
        $routeControl->setRouteName($route);
        $routeControl->setEnabled(true);
        $routeControl->setRouteTargetName('target');
        $routeManager->createRouteControl($routeControl);

        return $this->redirect($this->generateUrl('trj_routing_control.route_list'));
    }

    /**
     * @param Request $request
     */
    public function updateAction(Request $request)
    {

    }

    /**
     * @param Request $request
     */
    public function deleteAction(Request $request)
    {

    }
}
