<?php

namespace Category\Controller\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Category\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = NULL)
    {

        // Get Doctrine entity manager
        $categoryService = $container->get('Category\Service\CategoryService');
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        return new IndexController($categoryService,$entityManager);
    }
}
