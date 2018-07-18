<?php

namespace Category\Controller;

use Category\Entity\Category;
use Doctrine\ORM\EntityManager;
use function PHPSTORM_META\type;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Category\Service\CategoryService;

class IndexController extends AbstractActionController
{
    private $categoryService;
    private $entityManager;

    public function __construct(CategoryService $categoryService , EntityManager $entityManager)
    {
        $this->categoryService = $categoryService;
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {


        $categories = $this->entityManager->getRepository(Category::class)->findAll();
        $view = new ViewModel();
        $view->categories = $categories;
        return $view;
    }



    public function addAction()
    {


        // Create new Post entity.
        $category = new Category();
//        $category =     $this->entityManager->getRepository(Category::class);

        $category->setTitle('Category from controller');
//        $category->setContent('Post body goes here');
//        $category->setStatus(Post::STATUS_PUBLISHED);
        $currentDate = date('Y-m-d H:i:s');
        $category->setDateCreated($currentDate);

// Add the entity to entity manager.
        $this->entityManager->persist($category);
// Apply changes to database.
        $this->entityManager->flush();


        $view = new ViewModel();
        return $view;
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
