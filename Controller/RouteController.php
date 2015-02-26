<?php

namespace TRJ\RoutingControlBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RouteController extends Controller
{
    /**
     * @return Response
     */
    public function listAction()
    {
        $routes = $this->get('trj_routing_control.route.manager')->getRoutes();

        return $this->render('TRJRoutingControlBundle:Route:list.html.twig',
            array(
                'routes' => $routes,
                'layout' => 'TRJRoutingControlBundle:Route:list.html.twig'
            )
        );
    }
}
