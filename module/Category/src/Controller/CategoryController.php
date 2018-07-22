<?php

namespace Category\Controller;

use Category\Entity\Category;
use Category\Form\CategoryForm;
use Category\Service\CategoryManager;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractActionController
{
    private $categoryManager;
    private $entityManager;

    public function __construct(CategoryManager $categoryManager, EntityManager $entityManager)
    {
        $this->categoryManager = $categoryManager;
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $view = new ViewModel();
        $view->categories = $categories;
        return $view;
    }


    /**
     * This action displays the "New Category" page. The page contains
     * a form allowing to enter category title, content and tags. When
     * the user clicks the Submit button, a new Category entity will
     * be created.
     */
    public function addAction()
    {


        // Create the form.
        $form = new CategoryForm();

        // Check whether this category is a POST request.
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();

            // Fill form with data.
            $form->setData($data);
            if ($form->isValid()) {
                // Get validated form data.
                $data = $form->getData();

                $this->categoryManager->addNewCategory($data);
                // Redirect the user to "index" page.
                return $this->redirect()->toRoute('category');
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


        $form = new CategoryForm();

        // Get Category ID.
        $category_id = $this->params()->fromRoute('id', -1);


        // Find existing product in the database.
        $category = $this->entityManager->getRepository(Category::class)
            ->findOneById($category_id);


        if ($category == null) {
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
                $this->categoryManager->updateCategory($category, $data);

                // Redirect the user to "admin" page.
                return $this->redirect()->toRoute('category', ['action' => 'index']);
            }
        } else {
            $data = [
                'title' => $category->getTitle(),
            ];


            $form->setData($data);
        }


        // Render the view template.
        $view = new ViewModel([
            'form' => $form,
            'category' => $category
        ]);

        return $view;
    }

    // This "delete" action displays the Delete Post page.
    public function deleteAction()
    {
        $category_id = $this->params()->fromRoute('id', -1);

        $product = $this->entityManager->getRepository(Category::class)
            ->findOneById($category_id);
        if ($product == null) {
            $this->getResponse()->setStatusCode(404);
            return;
        }

        $this->categoryManager->removeCategory($product);

        // Redirect the user to "index" page.
        return $this->redirect()->toRoute('category', ['action' => 'index']);
    }
}
