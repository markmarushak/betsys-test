<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table("groups")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\GroupRepository")
 */
class Group
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    protected $name;

    /**
     * @var ArrayCollection|Supplier[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Supplier", mappedBy="groups")
     */
    protected $suppliers;

    /**
     * Group constructor.
     */
    public function __construct()
    {
        $this->suppliers = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Supplier[]|ArrayCollection
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    /**
     * @param Supplier $supplier
     * @return $this
     */
    public function addSupplier(Supplier $supplier)
    {
        if (!$this->suppliers->contains($supplier)) {
            $this->suppliers->add($supplier);
        }
        return $this;
    }

    /**
     * @param Supplier $supplier
     * @return $this
     */
    public function removeSupplier(Supplier $supplier)
    {
        if ($this->suppliers->contains($supplier)) {
            $this->suppliers->remove($supplier);
        }
        return $this;
    }
}
