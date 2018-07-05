<?php
namespace Category\Repository;

use Doctrine\ORM\EntityRepository;
use Category\Entity\Category;

/**
 * This is the custom repository class for Post entity.
 */
class CategoryRepository extends EntityRepository
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
        $categoryRepository =  $this->entityManager->getRepository(Category::class);
        return $categoryRepository->findAll();
    }

    public function find($id){
      $row = $this->entityManager->getRepository(Category::class)
              ->findOneById($id);
      return $row;
    }

    public function findObj($id){
      $row = $this->entityManager->getRepository(Category::class)->find($id);
      return $row;
    }

    // add  method
    public function create($data){
      // Create new Post entity.
        $category = new Category();
        // $category->name = $data['name'];
        $category->setName($data['name']);

        // Add the entity to entity manager.
        $this->entityManager->persist($category);

        // Apply changes to database.
        $this->entityManager->flush();

    }

    // update  method
    public function update($data){

        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);

        // Add the entity to entity manager.
        $this->entityManager->merge($category);

        // Apply changes to database.
        $this->entityManager->flush();

    }

    // add - update method
    public function delete(){

    }


}
