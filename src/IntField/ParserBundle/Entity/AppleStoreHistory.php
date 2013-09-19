<?php

namespace IntField\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="apple_store_history")
 * @ORM\Entity()
 */
class AppleStoreHistory
{
    /**
     * @ORM\Column(name="id", type="integer", length=100)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="AppleStore", inversedBy="history")
     * @ORM\JoinColumn(name="store_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $appleStore;
    
    /**
     * @ORM\Column(name="field", type="string", length=100)
     */
    private $field;
    
    /**
     * @ORM\Column(name="value", type="text")
     */
    private $value;
    
    /**
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set field
     *
     * @param string $field
     * @return AppleStoreHistory
     */
    public function setField($field)
    {
        $this->field = $field;
    
        return $this;
    }

    /**
     * Get field
     *
     * @return string 
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return AppleStoreHistory
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AppleStoreHistory
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set appleStore
     *
     * @param \IntField\ParserBundle\Entity\AppleStore $appleStore
     * @return AppleStoreHistory
     */
    public function setAppleStore(\IntField\ParserBundle\Entity\AppleStore $appleStore)
    {
        $this->appleStore = $appleStore;
    
        return $this;
    }

    /**
     * Get appleStore
     *
     * @return \IntField\ParserBundle\Entity\AppleStore 
     */
    public function getAppleStore()
    {
        return $this->appleStore;
    }
}