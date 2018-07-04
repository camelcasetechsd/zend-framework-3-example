<?php
namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @ORM\Entity
 * @ORM\Table(name="products")
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
     * @ORM\ManyToOne(targetEntity="Category\Entity\Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

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
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
    public function getCategory()
    {
        return $this->category;
    }
}