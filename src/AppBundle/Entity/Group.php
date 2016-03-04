<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;
use Symfonian\Indonesia\CoreBundle\Toolkit\DoctrineManager\Model\EntityInterface;

/**
 * @ORM\Table(name="pl_group")
 * @ORM\Entity
 *
 * @Serializer\XmlRoot("group")
 * @Hateoas\Relation("self", href = "expr('/api/groups/' ~ object.getId())")
 */
class Group implements EntityInterface
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Serializer\XmlAttribute
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=77)
     */
    private $name;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}