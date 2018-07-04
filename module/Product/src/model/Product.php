<?php
/**
 * Created by PhpStorm.
 * User: camelcase
 * Date: 7/3/18
 * Time: 10:45 AM
 */

namespace Product\model;


use Doctrine\ORM\EntityManager;
use Product\Entity\Product as ProductEntity;
class Product
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createProduct($name, $description)
    {
        $productEntity = new ProductEntity();
        $productEntity->setName($name);
        $productEntity->setDescription($description);

        $this->entityManager->persist($productEntity);
        $this->entityManager->flush($productEntity);
    }

    public function editProduct($id, $name, $description)
    {
        $productEntity = new ProductEntity();
        $productEntity->setId($id);
        $productEntity->setName($name);
        $productEntity->setDescription($description);
        $this->entityManager->merge($productEntity);
        $this->entityManager->flush();
    }

    public function getProducts()
    {
        return $this->entityManager->getRepository(ProductEntity::class)->findAll();
    }

    public function getProduct($id)
    {
        return $this->entityManager->find(ProductEntity::class, $id);
    }

    public function deleteProduct($id)
    {
        $productEntity = $this->entityManager->find(ProductEntity::class, $id);
        $this->entityManager->remove($productEntity);
        $this->entityManager->flush();
    }
}