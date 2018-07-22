<?php

namespace Category\Service\Factory;

use Category\Service\CategoryManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * This is the factory for CategoryManager. Its purpose is to instantiate the
 * service.
 */
class CategorytManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        // Instantiate the service and inject dependencies
        return new CategoryManager($entityManager);
    }
}
