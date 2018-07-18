<?php
namespace Product\Service;

use Product\Entity\Product;
use Product\Entity\Comment;
use Product\Entity\Tag;
use Zend\Filter\StaticFilter;

// The ProductManager service is responsible for adding new products.
class ProductManager
{
    /**
     * Doctrine entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    // Constructor is used to inject dependencies into the service.
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // This method adds a new product.
    public function addNewProduct($data)
    {
        // Create new Product entity.
        $product = new Product();
        $product->setTitle($data['title']);
        $product->setCategoryId(2); // todo : get it from data
//        $product->setContent($data['content']);
//        $product->setStatus($data['status']);
        $currentDate = date('Y-m-d H:i:s');
        $product->setDateCreated($currentDate);

        // Add the entity to entity manager.
        $this->entityManager->persist($product);

        // Add tags to product
        $this->addTagsToProduct($data['tags'], $product);

        // Apply changes to database.
        $this->entityManager->flush();
    }

}