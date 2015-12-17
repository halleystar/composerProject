<?php
use Symfony\Component\ClassLoader\Psr4ClassLoader;
use Maqiang\Action\AcmeListener\Order;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
require '../vendor/autoload.php';

// $loader = new Psr4ClassLoader();
// $loader->addPrefix('Maqiang\\Action\\AcmeListener\\', __DIR__);
// $loader->register();

// $route = new Route('/abc/routeTest', array('controller'=> 'MyController', 'var'=>'abc'));

// $route = new Route('/abc/routeTest.php/{month}', array(
//     'controller' => 'MyController'
// ), array('month'=> '[0-9]{4}-[0-9]{2}'));

$route = new Route(
    '/abc/{suffix}',
    array('suffix' => ''),
    array('suffix' => '.*')
);

$routes = new RouteCollection();

$routes->add('route_name', $route);

$context = new RequestContext('/');

$matcher = new UrlMatcher($routes, $context);

$parameters = $matcher->match('/abc/routeTest.php');
var_dump($parameters);

