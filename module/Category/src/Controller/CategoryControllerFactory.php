<?php
/**
 * Created by PhpStorm.
 * User: camelcase
 * Date: 7/4/18
 * Time: 12:43 PM
 */

namespace Category\Controller;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class CategoryControllerFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {


//        $entityManager = $container->get('doctrine.entitymanager.orm_default');
//        var_dump(get_class($entityManager));exit;
        // Instantiate the controller and inject dependencies
        return new CategoryController($container);
//        $service = (null === $options) ? new $requestedName : new $requestedName($options);
//        return $service->setServiceManager($container);

    }
}