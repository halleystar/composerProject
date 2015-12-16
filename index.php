<?php
require 'vendor/autoload.php';
use Symfony\Component\EventDispatcher\EventDispatcher;
use Maqiang\Action\AcmeListener\AcmeListener;
use Maqiang\Action\AcmeListener\Order;
use Maqiang\Action\AcmeListener\FilterOrderEvent;
use Symfony\Component\ClassLoader\Psr4ClassLoader;

$loader = new Psr4ClassLoader();
$loader->addPrefix('Maqiang\\Action\\AcmeListener\\',  __DIR__.'/abc');
$loader->register();

$order = new Order();
$filterOrderEvent  =  new FilterOrderEvent($order);
$listener  =new  EventDispatcher();

$acmeListener  = new AcmeListener();

$listener->addListener('maqiang.order', array($acmeListener, 'onFooAction'));

$listener->dispatch('maqiang.order', $filterOrderEvent);