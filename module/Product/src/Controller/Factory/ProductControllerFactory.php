<?php

namespace Product\Controller\Factory;

use Interop\Container\ContainerInterface;
use Product\Controller\ProductController;
use Product\Service\ProductManager;
use Zend\ServiceManager\Factory\FactoryInterface;

class ProductControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Get Doctrine entity manager
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $productManager = $container->get(ProductManager::class);
        return new ProductController($productManager, $entityManager);
    }
}
