<?php

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\ClassLoader\Psr4ClassLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\HttpKernel;
use Maqiang\Event\RouteSubcriber;

require 'vendor/autoload.php';

$loader = new Psr4ClassLoader();
$loader->addPrefix('Maqiang\\Controller\\',  __DIR__.'/Controller');
$loader->addPrefix('Maqiang\\Event\\',  __DIR__.'/Event');
// $loader->addPrefix('Maqiang\\Model\\',  __DIR__.'/Model');
$loader->register();


// $order = new Order();
// $filterOrderEvent  =  new FilterOrderEvent($order);
// $listener  =new  EventDispatcher();

// $acmeListener  = new AcmeListener();

// $listener->addListener('maqiang.order', array($acmeListener, 'onFooAction'));

// $listener->dispatch('maqiang.order', $filterOrderEvent);

$request = Request::createFromGlobals();

$dispatcher = new EventDispatcher();

$subscriber = new RouteSubcriber();

$dispatcher->addSubscriber($subscriber);

$resolver = new ControllerResolver();

$kernel  =  new HttpKernel($dispatcher, $resolver);

$response  =  $kernel->handle($request);

$response->send();