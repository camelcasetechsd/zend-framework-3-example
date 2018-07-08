<?php

namespace Category\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Category
 * @ORM\Entity
 * @ORM\Table(name="category")
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
    public $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    public $name;


    public function setName($name)
    {
       $this->name = $name;
    }

    public function getName()
    {
       return $this->name;
    }

    public function setId($id)
    {
       $this->id = $id;
    }

    public function getId()
    {
       return $this->id;
    }
}
