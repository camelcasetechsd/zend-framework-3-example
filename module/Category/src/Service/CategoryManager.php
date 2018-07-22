<?php

namespace Category\Service;

use Category\Entity\Category;

// The CategoryManager service is responsible for adding new categorys.
class CategoryManager
{
    /**
     * Doctrine entity manager.
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    // Constructor is used to inject dependencies into the service.
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // This method adds a new category.
    public function addNewCategory($data)
    {


        // Create new Category entity.
        $category = new Category();
        $category->setTitle($data['title']);
        $currentDate = date('Y-m-d H:i:s');
        $category->setDateCreated($currentDate);
        // Add the entity to entity manager.
        $this->entityManager->persist($category);
        // Apply changes to database.
        $this->entityManager->flush();
    }


    // This method allows to update data of a single post.
    public function updateCategory($category, $data)
    {
        $category->setTitle($data['title']);
        // Apply changes to database.
        $this->entityManager->flush();
    }


    // Removes post and all associated comments.
    public function removeCategory($category)
    {
        $this->entityManager->remove($category);
        $this->entityManager->flush();
    }
}
