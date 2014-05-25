<?php
// src/Acme/UserBundle/Entity/User.php

namespace Project\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="Invitation", inversedBy="user")
     * @ORM\JoinColumn(referencedColumnName="code")
     * @Assert\NotNull(message="Your invitation is wrong")
     */
    protected $invitation;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }



    /**
     * Agrega un rol al usuario.
     * @throws Exception
     * @param Rol $rol 
     */
    public function addRole( $rol )
    {
    if($rol == 1) {
      array_push($this->roles, 'ROLE_ADMIN');
    }
    else if($rol == 2) {
      array_push($this->roles, 'ROLE_USER');
    }
    }

    /**
     * Set invitation
     *
     * @param \Project\UserBundle\Entity\Invitation $invitation
     * @return User
     */
    public function setInvitation(\Project\UserBundle\Entity\Invitation $invitation = null)
    {
        $this->invitation = $invitation;

        return $this;
    }

    /**
     * Get invitation
     *
     * @return \Project\UserBundle\Entity\Invitation 
     */
    public function getInvitation()
    {
        return $this->invitation;
    }
}
