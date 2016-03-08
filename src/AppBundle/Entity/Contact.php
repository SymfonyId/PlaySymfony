<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hateoas\Configuration\Annotation as Hateoas;
use Symfonian\Indonesia\RehatBundle\Annotation\Filter;
use Symfonian\Indonesia\RehatBundle\Annotation\Sortable;
use Symfonian\Indonesia\RehatBundle\Model\EntityInterface;
use Symfony\Component\Validator\Constraints\Email;

/**
 * @ORM\Table(name="pl_contact")
 * @ORM\Entity
 * @Hateoas\Relation("self", href = "expr('/api/contacts/' ~ object.getId())")
 * @Hateoas\Relation("group", href = "expr('/api/groups/' ~ object.getGroup().getId())")
 */
class Contact implements EntityInterface
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Group", cascade={"persist"})
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * @Filter()
     * @Sortable()
     */
    private $group;

    /**
     * @ORM\Column(name="name", type="string", length=77)
     * @Filter()
     * @Sortable()
     */
    private $fullName;

    /**
     * @ORM\Column(name="email", type="string", length=77)
     * @Email(message="email_not_valid")
     * @Filter()
     * @Sortable()
     */
    private $email;

    /**
     * @ORM\Column(name="phone_number", type="string", length=17)
     * @Filter()
     * @Sortable()
     */
    private $phoneNumber;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
}