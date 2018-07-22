<?php

namespace Product\Service;

use Category\Entity\Category;
use Doctrine\ORM\EntityManager;
use Product\Entity\Product;

// The ProductManager service is responsible for adding new products.
class ProductManager
{
    /**
     * Doctrine entity manager.
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    // Constructor is used to inject dependencies into the service.
    public function __construct(EntityManager $entityManager)
    {

        $this->entityManager = $entityManager;
    }

    // This method adds a new product.
    public function addNewProduct($data)
    {


        // Create new Product entity.
        $product = new Product();
        $product->setTitle($data['title']);
        $product->setPrice($data['price']);


//        $product->setCategoryId($data['category_id']);


        $category = $this->entityManager->getRepository(Category::class)
            ->findOneById($data['category_id']);


        $product->setCategory($category);
        $currentDate = date('Y-m-d H:i:s');
        $product->setDateCreated($currentDate);
        // Add the entity to entity manager.
        $this->entityManager->persist($product);

        // Apply changes to database.
        $this->entityManager->flush();
    }


    // This method allows to update data of a single post.
    public function updateProduct($product, $data)
    {
        $product->setTitle($data['title']);
        $product->setPrice($data['price']);


        $product->setCategoryId($data['category_id']);


        // Apply changes to database.
        $this->entityManager->flush();
    }


    // Removes post and all associated comments.
    public function removeProduct($post)
    {
        $this->entityManager->remove($post);
        $this->entityManager->flush();
    }
}
