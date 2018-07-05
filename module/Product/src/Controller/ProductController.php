<?php

namespace Product\Controller;

use Category\Model\Category as CategoryModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Product\model\Product as ProductModel;
class ProductController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($serviceManager)
    {
        $this->entityManager = $serviceManager->get(EntityManager::class);
    }
    public function indexAction()
    {
        $productModel = new ProductModel($this->entityManager);
        $products = $productModel->getProducts();
        return new ViewModel(["products"=>$products]);
    }

    public function newAction()
    {
        if ($this->getRequest()->isPost()){
            $data = $this->params()->fromPost();
            $productModel = new ProductModel($this->entityManager);
            $productModel->createProduct($data["name"], $data["description"], $data["price"], $data["category"]);
            $this->redirect()->toUrl("/products");
        }
        $categoryModel = new CategoryModel($this->entityManager);
        return new ViewModel(["categories" => $categoryModel->getCategories()]);
    }
    public function editAction()
    {
        $id = $this->params("id");
        $productModel = new ProductModel($this->entityManager);
        $productEntity = $productModel->getProduct($id);
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $productModel->editProduct($id, $data["name"], $data["description"], $data["price"], $data["category"]);
            $this->redirect()->toUrl("/products");
        }
        $categoryModel = new CategoryModel($this->entityManager);
        return new ViewModel([
            "product"=>$productEntity,
            "categories" => $categoryModel->getCategories()]);
    }
    public function showAction()
    {
        $id = $this->params("id");

        $productModel = new ProductModel($this->entityManager);
        $productEntity = $productModel->getProduct($id);

        return new ViewModel(["product"=>$productEntity]);
    }
    public function deleteAction()
    {
        $id = $this->params("id");

        $productModel = new ProductModel($this->entityManager);
        $productEntity = $productModel->deleteProduct($id);

        $this->redirect()->toUrl("/products");
    }
}
