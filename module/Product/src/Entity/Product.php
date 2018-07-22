<?php

namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Entity
 * @ORM\Table(name="products")
 * @package Product\Entity
 */
class Product
{
    /**
     * @ORM\Column(name="date_created")
     */
    protected $dateCreated;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $price;
    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $category_id;
    /**
     * @ORM\ManyToOne(targetEntity="\Category\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


    /*  getter/setter methods */


    // Returns ID

    public function getId()
    {
        return $this->id;
    }

    // Sets ID
    public function setId($id)
    {
        $this->id = $id;
    }


    // Returns Title
    public function getTitle()
    {
        return $this->title;
    }

    // Sets Title
    public function setTitle($title)
    {
        $this->title = $title;
    }


    // Returns Price
    public function getPrice()
    {
        return $this->price;
    }

    // Sets Price
    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    // Sets CategoryId

    /**
     * @param $id
     *
     */
    public function setCategoryId($id)
    {
        $this->category_id = $id;
    }

    // Returns the date when this item was created.
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    // Sets the date when this item was created.
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /*
     * Returns associated category.
     * @return \Category\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * Sets associated category.
     * @param \Category\Entity\Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
}
