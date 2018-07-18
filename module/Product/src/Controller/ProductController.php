<?php

namespace Product\Controller;
use function PHPSTORM_META\type;

use Product\Entity\Product;
use Doctrine\ORM\EntityManager;
use Product\Service\ProductManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Service\ProductService;

class ProductController extends AbstractActionController
{
    private $productManager;
    private $entityManager;




    public function __construct(ProductManager $productManager , EntityManager $entityManager)
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
     * a form allowing to enter post title, content and tags. When
     * the user clicks the Submit button, a new Product entity will
     * be created.
     */
    public function addAction()
    {
        // Create the form.
        $form = new ProductForm();

        // Check whether this post is a POST request.
        if ($this->getRequest()->isPost()) {

            // Get POST data.
            $data = $this->params()->fromProduct();

            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {

                // Get validated form data.
                $data = $form->getData();

                // Use post manager service to add new post to database.
                $this->postManager->addNewProduct($data);

                // Redirect the user to "index" page.
                return $this->redirect()->toRoute('application');
            }
        }

        // Render the view template.
        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction()
    {
        $view = new ViewModel();
        return $view;
    }


    public function deleteAction()
    {
        $view = new ViewModel();
        return $view;
    }
}
