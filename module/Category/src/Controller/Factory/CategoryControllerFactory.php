<?php

namespace Category\Controller\Factory;

use Category\Controller\CategoryController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Get Doctrine entity manager
        $categoryService = $container->get('Category\Service\CategoryManager');
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new CategoryController($categoryService, $entityManager);
    }
}
