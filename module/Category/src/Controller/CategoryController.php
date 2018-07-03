<?php

namespace Category\Controller;

use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Service\EntityManagerFactory;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\ViewModel;
use Category\Model\Category as CategoryModel;
class CategoryController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new ViewModel();
        return new $viewModel;
    }

    public function newAction()
    {
        $serviceManager = new ServiceManager();
        $categoryModel = new CategoryModel();
        //$categoryModel->getCategories($serviceManager->get(EntityManager::class));
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
