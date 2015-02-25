<?php

namespace TRJ\RoutingControlBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use TRJ\RoutingControlBundle\Services\RequestHandler;

class RequestListener
{
    /** @var RequestHandler */
    protected $requestHandler;

    /**
     * @param RequestHandler $requestHandler
     */
    public function __construct(RequestHandler $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        try {
            $this->requestHandler->handle($event->getRequest());
        } catch(\Exception $e) {

        }
    }
}
