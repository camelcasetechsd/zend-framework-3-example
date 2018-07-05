<?php

namespace Category\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Category\Repository\CategoryRepository;

class CategoryController extends AbstractActionController
{
    private $entityManager;

    public function __construct($serviceManager)
    {
       $this->entityManager = $serviceManager->get(EntityManager::class);
    }

    public function indexAction()
    {
        $categories = new CategoryRepository($this->entityManager);
        $data = $categories->findAll();
        return new ViewModel(['categories' => $data]);
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function addAjaxAction()
    {
        if($this->getRequest()->isPost()) {
           $category = new CategoryRepository($this->entityManager);
           // Fill in the form with POST data
           $data = $this->params()->fromPost();
           // var_dump($data);
           $category->save($data);
        }
        die;
    }

    public function editAction()
    {
        return new ViewModel();
    }
}
