<?php
namespace Category\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @ORM\Entity
 * @ORM\Table(name="categories")
 * @package Category\Entity
 */
class Category
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer");
    * @ORM\GeneratedValue(strategy="AUTO")
    * @var integer
    */
    private $id;

    /**
     * @ORM\Column(type="string");
     * @var string
     */
    private $name;
    /**
     * @ORM\Column(type="string");
     * @var string
     */
    private $description;
    /**
     * @ORM\OneToMany(targetEntity="Product\Entity\Product", mappedBy="categories")
     */
    private $products;

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }
}