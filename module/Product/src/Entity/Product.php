<?php

namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @package Product\Entity
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    public $id;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    public $category_id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $title;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $price;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    public $description;

    public function setId($id)
    {
       $this->id = $id;
    }

    public function getId()
    {
       return $this->id;
    }

    public function setCategoryId($category_id)
    {
       $this->category_id = $category_id;
    }

    public function getCategoryId()
    {
       return $this->category_id;
    }

    public function setTitle($title)
    {
       $this->title = $title;
    }

    public function getTitle()
    {
       return $this->title;
    }

    public function setDescription($description)
    {
       $this->description = $description;
    }

    public function getDescription()
    {
       return $this->description;
    }

    public function setPrice($price)
    {
       $this->price = $price;
    }

    public function getPrice()
    {
       return $this->price;
    }

}
