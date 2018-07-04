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
        //echo 'ok'; die;
        $categories = new CategoryRepository($this->entityManager);

        $data = $categories->findAll();
        // $products = $this->entityManager;
        return new ViewModel(['categories' => $data]);
    }

    public function addAction()
    {
        return new ViewModel();
    }

    public function editAction()
    {
        return new ViewModel();
    }
}
