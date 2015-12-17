<?php
namespace Maqiang\Action\AcmeListener;

use Symfony\Component\EventDispatcher\Event;

class FilterOrderEvent extends Event
{

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }
}
