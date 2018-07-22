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


    /*  getter/setter methods */


    // Returns ID

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
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
}
