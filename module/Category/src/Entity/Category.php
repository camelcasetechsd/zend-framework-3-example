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
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(name="date_created")
     */
    protected $dateCreated;


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



    /* Relations */

    /**
     * @ORM\OneToMany(targetEntity="\Product\Entity\Product", mappedBy="product")
     * @ORM\JoinColumn(name="id", referencedColumnName="product_id")
     */
    protected $products;


    /**
     * Constructor.
     */
    public function __construct()
    {
//        $this->products = new ArrayCollection();
    }

    /**
     * Returns products for this post.
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Adds a new product to this post.
     * @param $product
     */
    public function addProduct($product)
    {
        $this->products[] = $product;
    }
}