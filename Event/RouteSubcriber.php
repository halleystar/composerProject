<?php
namespace Maqiang\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Maqiang\Controller\MyController;

class RouteSubcriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [
                [
                    'onKernelRequest',
                    10
                ]
            ],
            KernelEvents::CONTROLLER => [
                [
                    'onKernelController',
                    10
                ]
            ]
        ];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $uri = $request->getPathInfo();
        $uri = explode('/', $uri);
        $controller = ucfirst($uri[1]);
        $action = $uri[2];
        $request->attributes->set('_controller', 'Maqiang\\Controller\\' . $controller . '::' . $action);
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller =  $event->getController();
        if ($controller[0] instanceof MyController) {
            echo '123';
        }
        if (trim($controller[1]) == 'testDb') {
            echo 'hahaha';
        }
    }
}