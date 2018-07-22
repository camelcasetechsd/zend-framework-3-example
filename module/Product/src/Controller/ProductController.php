<?php

namespace Product\Controller;

use Category\Entity\Category;
use Doctrine\ORM\EntityManager;
use Product\Entity\Product;
use Product\Form\CategoryForm;
use Product\Form\ProductForm;
use Product\Service\ProductManager;
use Product\Service\ProductService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    private $productManager;
    private $entityManager;


    public function __construct(ProductManager $productManager, EntityManager $entityManager)
    {

        $this->productManager = $productManager;
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {


        $products = $this->entityManager->getRepository(Product::class)->findAll();

        $view = new ViewModel();
        $view->products = $products;
        return $view;
    }


    /**
     * This action displays the "New Product" page. The page contains
     * a form allowing to enter product title, content and tags. When
     * the user clicks the Submit button, a new Product entity will
     * be created.
     */
    public function addAction()
    {

        $categories = $this->entityManager->getRepository(Category::class)->findAll();


        // Create the form.
        $form = new ProductForm($categories);


        // Check whether this product is a POST request.
        if ($this->getRequest()->isPost()) {
            // Get POST data.
            $data = $this->params()->fromPost();
            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {
                // Get validated form data.
                $data = $form->getData();
                // Use product manager service to add new product to database.
                $this->productManager->addNewProduct($data);
                // Redirect the user to "index" page.
                return $this->redirect()->toRoute('product');
            }
        }

        // Render the view template.

        $view = new ViewModel([
            'form' => $form,
        ]);

        return $view;
    }

    // This action displays the page allowing to edit a product.
    public function editAction()
    {
        // Create the form.

        $categories = $this->entityManager->getRepository(Category::class)->findAll();


        $form = new ProductForm($categories);

        // Get product ID.
        $productId = $this->params()->fromRoute('id', -1);


        // Find existing product in the database.
        $product = $this->entityManager->getRepository(Product::class)
            ->findOneById($productId);


        if ($product == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }


        // Check whether this product is a POST request.
        if ($this->getRequest()->isPost()) {
            // Get POST data.
            $data = $this->params()->fromPost();


            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {
                // Get validated form data.
                $data = $form->getData();

                // Use product manager service to add new product to database.
                $this->productManager->updateProduct($product, $data);

                // Redirect the user to "admin" page.
                return $this->redirect()->toRoute('product', ['action' => 'index']);
            }
        } else {
            $data = [
                'title' => $product->getTitle(),
                'price' => $product->getPrice(),
                'category_id' => $product->getCategoryId(),
            ];


            $form->setData($data);
        }


        // Render the view template.
        $view = new ViewModel([
            'form' => $form,
            'product' => $product
        ]);

        return $view;
    }


    // This "delete" action displays the Delete Post page.
    public function deleteAction()
    {
        $productId = $this->params()->fromRoute('id', -1);

        $product = $this->entityManager->getRepository(Product::class)
            ->findOneById($productId);
        if ($product == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $this->productManager->removeProduct($product);

        // Redirect the user to "index" page.
        return $this->redirect()->toRoute('product', ['action' => 'index']);
    }
}
