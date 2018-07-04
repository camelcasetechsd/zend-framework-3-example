<?php

namespace Product\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Product
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @package Category\Entity
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     * @var string
     */
    private $created;

}
