<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Example
 * @ORM\Entity
 * @ORM\Table(name="categories")
 * @package Application\Entity
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
}