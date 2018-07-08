<?php
namespace Product\Repository;

use Doctrine\ORM\EntityRepository;
use Product\Entity\Product;

/**
 * This is the custom repository class for Post entity.
 */
class ProductRepository extends EntityRepository
{

  private $entityManager;

  public function __construct($entityManager)
  {
     $this->entityManager = $entityManager;
  }

    /**
     * Retrieves all published posts in descending date order.
     * @return Query
     */
    public function findAll()
    {
        $productRepository =  $this->entityManager->getRepository(Product::class);
        return $productRepository->findAll();
    }

    public function find($id){
      $row = $this->entityManager->getRepository(Product::class)
              ->findOneById($id);
      return $row;
    }

    public function findObj($id){
      $row = $this->entityManager->getRepository(Product::class)->find($id);
      return $row;
    }

    public function findByCategory($id){
      $data = $this->entityManager->getRepository(Product::class)->findBy(['category_id' => $id]);
      return $data;
    }

    // add  method
    public function create($data){
      // Create new Post entity.
        $product = new Product();
        // $product->name = $data['name'];
        $product->setCategoryId($data['category']);
        $product->setTitle($data['title']);
        $product->setDescription($data['description']);
        $product->setprice($data['price']);

        // Add the entity to entity manager.
        $this->entityManager->persist($product);

        // Apply changes to database.
        $this->entityManager->flush();

    }

    // update  method
    public function update($data){

        $product = new Product();
        $product->setId($data['id']);
        $product->setCategoryId($data['category']);
        $product->setTitle($data['title']);
        $product->setDescription($data['description']);
        $product->setprice($data['price']);

        // Add the entity to entity manager.
        $this->entityManager->merge($product);

        // Apply changes to database.
        $this->entityManager->flush();

    }

    // delete product method
    public function delete($data){
        $product = $this->findObj($data['id']);
        $this->entityManager->remove($product);
        // Apply changes to database.
        $this->entityManager->flush();
    }


}
