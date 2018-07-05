<?php

namespace Category\Controller;

use Category\Model\Category;
use Doctrine\ORM\EntityManager;
use Product\model\Product as ProductModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Category\Model\Category as CategoryModel;
class CategoryController extends AbstractActionController
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
        $categoryModel = new CategoryModel($this->entityManager);
        $categories = $categoryModel->getCategories();
        return new ViewModel(["categories"=>$categories]);
    }

    public function newAction()
    {
        if ($this->getRequest()->isPost()){
            $data = $this->params()->fromPost();
            $categoryModel = new CategoryModel($this->entityManager);
            $categoryModel->createCategory($data["name"], $data["description"]);
            $this->redirect()->toUrl("/categories");
        }

        return new ViewModel();
    }
    public function editAction()
    {
        $id = $this->params("id");
        $categoryModel = new CategoryModel($this->entityManager);
        $categoryEntity = $categoryModel->getCategory($id);
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $categoryModel->editCategory($id, $data["name"], $data["description"]);
            $this->redirect()->toUrl("/categories");
        }
        return new ViewModel(["category"=>$categoryEntity]);
    }
    public function showAction()
    {
        $id = $this->params("id");

        $categoryModel = new CategoryModel($this->entityManager);
        $productModel = new ProductModel($this->entityManager);

        $categoryEntity = $categoryModel->getCategory($id);
        $productEntities = $productModel->getProductsByCategory($id);

        return new ViewModel(["category"=>$categoryEntity, "products"=>$productEntities]);
    }
    public function deleteAction()
    {
        $id = $this->params("id");

        $categoryModel = new CategoryModel($this->entityManager);
        $categoryEntity = $categoryModel->deleteCategory($id);

        $this->redirect()->toUrl("/categories");
    }
}
