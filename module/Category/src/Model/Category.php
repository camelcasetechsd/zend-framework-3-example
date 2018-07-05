<?php
/**
 * Created by PhpStorm.
 * User: camelcase
 * Date: 7/3/18
 * Time: 10:45 AM
 */

namespace Category\Model;
use Category\Entity\Category as CategoryEntity;
use Doctrine\ORM\EntityManager;

class Category
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createCategory($name, $description)
    {
        $categoryEntity = new CategoryEntity();
        $categoryEntity->setName($name);
        $categoryEntity->setDescription($description);

        $this->entityManager->persist($categoryEntity);
        $this->entityManager->flush($categoryEntity);
    }

    public function editCategory($id, $name, $description)
    {
        $categoryEntity = new CategoryEntity();
        $categoryEntity->setId($id);
        $categoryEntity->setName($name);
        $categoryEntity->setDescription($description);
        $this->entityManager->merge($categoryEntity);
        $this->entityManager->flush();
    }

    public function getCategories()
    {
        return $this->entityManager->getRepository(CategoryEntity::class)->findAll();
    }

    public function getCategory($id)
    {
        return $this->entityManager->find(CategoryEntity::class, $id);
    }

    public function deleteCategory($id)
    {
        $categoryEntity = $this->entityManager->find(CategoryEntity::class, $id);
        $this->entityManager->remove($categoryEntity);
        $this->entityManager->flush();
    }
}