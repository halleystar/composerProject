<?php
use Symfony\Component\ClassLoader\Psr4ClassLoader;
use Maqiang\Action\AcmeListener\Order;
require '../vendor/autoload.php';

$loader = new Psr4ClassLoader();
$loader->addPrefix('Maqiang\\Action\\AcmeListener\\',  __DIR__);
$loader->register();

$order = new Order();

$order->getMessage();
