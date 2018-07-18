<?php

namespace Product\Controller\Factory;

use Product\Service\ProductManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Product\Controller\ProductController;

class ProductControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {

        // Get Doctrine entity manager
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
//        $productService = $container->get('Product\Service\ProductService');
        $productManager = $container->get(ProductManager::class);
        return new ProductController($productManager,$entityManager);
    }
}
