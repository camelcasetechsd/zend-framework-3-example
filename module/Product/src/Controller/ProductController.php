<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Product\Repository\ProductRepository;
use Category\Repository\CategoryRepository;

class ProductController extends AbstractActionController
{

  private $entityManager;

  public function __construct($serviceManager)
  {
     $this->entityManager = $serviceManager->get(EntityManager::class);
  }

  public function indexAction()
  {
      $products = new ProductRepository($this->entityManager);
      $data = $products->findAll();
      return new ViewModel(['products' => $data]);
  }

  public function addAction()
  {
      $categories = new CategoryRepository($this->entityManager);
      return new ViewModel(['categories' => $categories->findAll()]);
  }

  public function addAjaxAction()
  {
      if($this->getRequest()->isPost()) {
         $product = new ProductRepository($this->entityManager);
         // Fill in the form with POST data
         $data = $this->params()->fromPost();
         //var_dump($data); die;
         $product->create($data);
      }
      die;
  }

  public function editAction()
  {
    // Get post ID.
      $id = (int)$this->params()->fromRoute('id', -1);
      $product = new ProductRepository($this->entityManager);
      $data = $product->find($id);
      $categories = new CategoryRepository($this->entityManager);
      return new ViewModel(['product' => $data,'categories' => $categories->findAll()]);
  }

  public function updateAjaxAction()
  {
      if($this->getRequest()->isPost()) {
         $product = new ProductRepository($this->entityManager);
         // Fill in the form with POST data
         $data = $this->params()->fromPost();
         $product->update($data);
      }
      die;
  }

  public function deleteAjaxAction()
  {
      if($this->getRequest()->isPost()) {
         $product = new ProductRepository($this->entityManager);
         $data = $this->params()->fromPost();
         $product->delete($data);
      }
      // echo $id;
      die;
  }
}
