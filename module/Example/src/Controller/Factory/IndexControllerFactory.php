<?php

namespace Example\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Example\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {
        $exampleService = $container->get('Example\Service\ExampleService');

        return new IndexController($exampleService);
    }
}
