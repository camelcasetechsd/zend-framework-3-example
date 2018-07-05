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
use Category\Entity\Category as CategoryEntity;
class Product
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createProduct($name, $description, $price, $categoryId)
    {
        $category = $this->entityManager->find(CategoryEntity::class, $categoryId);
        $productEntity = new ProductEntity();
        $productEntity->setName($name);
        $productEntity->setPrice($price);
        $productEntity->setDescription($description);
        $productEntity->setCategory($category);
        $this->entityManager->persist($productEntity);
        $this->entityManager->flush($productEntity);
    }

    public function editProduct($id, $name, $description, $price, $categoryId)
    {
        $category = $this->entityManager->find(CategoryEntity::class, $categoryId);
        $productEntity = new ProductEntity();
        $productEntity->setId($id);
        $productEntity->setName($name);
        $productEntity->setPrice($price);
        $productEntity->setDescription($description);
        $productEntity->setCategory($category);
        $this->entityManager->merge($productEntity);
        $this->entityManager->flush();
    }

    public function getProducts()
    {
        $categories = $this->entityManager->getRepository(ProductEntity::class)->findAll();
        return $categories;
    }

    public function getProduct($id)
    {
        return $this->entityManager->find(ProductEntity::class, $id);
    }

    public function getProductsByCategory($id)
    {
        return $this->entityManager->getRepository(ProductEntity::class)->findBy(["category" => $id]);
    }

    public function deleteProduct($id)
    {
        $productEntity = $this->entityManager->find(ProductEntity::class, $id);
        $this->entityManager->remove($productEntity);
        $this->entityManager->flush();
    }
}