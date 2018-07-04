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
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

}
