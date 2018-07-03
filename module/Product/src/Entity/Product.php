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
}