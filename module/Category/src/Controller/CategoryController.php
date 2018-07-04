<?php

namespace Category\Controller;

use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Service\EntityManagerFactory;
use Psr\Container\ContainerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\ViewModel;
use Category\Model\Category as CategoryModel;
class CategoryController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }
    public function indexAction()
    {
        $viewModel = new ViewModel();
        return new $viewModel;
    }

    public function newAction()
    {
        $categoryModel = new CategoryModel();
        $categoryModel->getCategories($this->entityManager);

        return new ViewModel();
    }
    public function editAction()
    {
        return new ViewModel();
    }
    public function showAction()
    {
        return new ViewModel();
    }
    public function deleteAction()
    {
        return new ViewModel();
    }
}
