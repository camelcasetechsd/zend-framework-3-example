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
    public function getCategories(EntityManager $entityManager)
    {
        $categoryEntity = new CategoryEntity();
        $categoryEntity->setName("dumy name");
        $categoryEntity->setDescription("dumy description");
        $entityManager->persist($categoryEntity);
        $entityManager->flush($categoryEntity);
    }
}