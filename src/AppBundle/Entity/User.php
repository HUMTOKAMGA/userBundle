<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    use TimesTamps;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

     /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="user")
     */
    private $zoom;

    public function __construct()
    {
        parent:: __construct();
        $this->zoom = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of zoom
     */ 
    public function getZoom()
    {
        return $this->zoom;
    }

    /**
     * Set the value of zoom
     *
     * @return  self
     */ 
    public function setZoom(Zoom $zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }
}

