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
        // $entityManager = $this->getEntityManager();
        $categoryRepository =  $this->entityManager->getRepository(Category::class);
        return $categoryRepository->findAll();
        // $data = $this->entityManager->find('Category\Entity\Category',521);
    }

    // add - update method
    public function save(){

    }

    // add - update method
    public function delete(){

    }


}
