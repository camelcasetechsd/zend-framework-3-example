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

    // add - update method
    public function save($data){
      // Create new Post entity.
        $category = new Category();
        // $category->name = $data['name'];
        $category->setName('Phone');

        // Add the entity to entity manager.
        $this->entityManager->persist($category);

        // Apply changes to database.
        $this->entityManager->flush();

    }

    // add - update method
    public function delete(){

    }


}
