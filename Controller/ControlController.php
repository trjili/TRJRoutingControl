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
     * @return Response
     */
    public function showAction($name)
    {
        /** @var RouteManager $routeManager */
        $routeManager = $this->get('trj_routing_control.route.manager');
        $routeControl = $routeManager->findRouteControl($name);

        return $this->render('TRJRoutingControlBundle:Control:show.html.twig', array(
            'routeControl' => $routeControl
        ));
    }

    /**
     * @param $name
     * @return RedirectResponse
     */
    public function createAction($name)
    {
        /** @var RouteManager $routeManager */
        $routeManager = $this->get('trj_routing_control.route.manager');
        /** @var RouteCollection $routes */
        $routes = $routeManager->getRoutes();
        $route = $routes->get($name);
        $routeControl = new RouteControl();
        $routeControl->setName($route);
        $routeControl->setEnabled(true);
        $routeControl->setTarget('target');
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
