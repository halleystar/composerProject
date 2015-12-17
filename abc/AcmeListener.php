<?php
namespace Maqiang\Action\AcmeListener;
use Symfony\Component\EventDispatcher\Event;

class AcmeListener
{

    public function onFooAction(Event $event)
    {
           $event->getOrder()->getMessage();
    }
}