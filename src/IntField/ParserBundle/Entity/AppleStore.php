<?php

namespace IntField\ParserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="apple_store")
 * @ORM\Entity(repositoryClass="AppleStoreRepository")
 */
class AppleStore
{
    /**
     * @ORM\Column(name="id", type="integer", length=100)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="apple_id", type="string", length=100, unique=true)
     */
    private $appleId;
    
    /**
     * @ORM\OneToMany(targetEntity="AppleStoreHistory", mappedBy="appleStore", cascade={"persist", "remove"})
     */
    private $history;
    
    /**
     * @ORM\Column(name="platform_type", type="array")
     */
    private $platformType;
    
    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;
    
    /**
     * @ORM\Column(name="seller", type="string", length=100)
     */
    private $seller;
    
    /**
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="ratingStar", type="integer")
     */
    private $ratingStar;
    
    /**
     * @ORM\Column(name="ratingCount", type="integer")
     */
    private $ratingCount;
    
    /**
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @ORM\Column(name="version", type="string", length=20)
     */
    private $version;
    
    /**
     * @ORM\Column(name="size", type="string", length=20)
     */
    private $size;
    
    /**
     * @ORM\Column(name="language", type="array")
     */
    private $language;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->history = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set appleId
     *
     * @param string $appleId
     * @return AppleStore
     */
    public function setAppleId($appleId)
    {
        $this->appleId = $appleId;
    
        return $this;
    }

    /**
     * Get appleId
     *
     * @return string 
     */
    public function getAppleId()
    {
        return $this->appleId;
    }

    /**
     * Set platformType
     *
     * @param array $platformType
     * @return AppleStore
     */
    public function setPlatformType($platformType)
    {
        $this->platformType = $platformType;
    
        return $this;
    }

    /**
     * Get platformType
     *
     * @return array 
     */
    public function getPlatformType()
    {
        return $this->platformType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return AppleStore
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
     * Set seller
     *
     * @param string $seller
     * @return AppleStore
     */
    public function setSeller($seller)
    {
        $this->seller = $seller;
    
        return $this;
    }

    /**
     * Get seller
     *
     * @return string 
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return AppleStore
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return AppleStore
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ratingStar
     *
     * @param integer $ratingStar
     * @return AppleStore
     */
    public function setRatingStar($ratingStar)
    {
        $this->ratingStar = $ratingStar;
    
        return $this;
    }

    /**
     * Get ratingStar
     *
     * @return integer 
     */
    public function getRatingStar()
    {
        return $this->ratingStar;
    }

    /**
     * Set ratingCount
     *
     * @param integer $ratingCount
     * @return AppleStore
     */
    public function setRatingCount($ratingCount)
    {
        $this->ratingCount = $ratingCount;
    
        return $this;
    }

    /**
     * Get ratingCount
     *
     * @return integer 
     */
    public function getRatingCount()
    {
        return $this->ratingCount;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return AppleStore
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return AppleStore
     */
    public function setVersion($version)
    {
        $this->version = $version;
    
        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return AppleStore
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set language
     *
     * @param array $language
     * @return AppleStore
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return array 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add history
     *
     * @param \IntField\ParserBundle\Entity\AppleStoreHistory $history
     * @return AppleStore
     */
    public function addHistory(\IntField\ParserBundle\Entity\AppleStoreHistory $history)
    {
        $history->setAppleStore($this);
        $this->history[] = $history;
    
        return $this;
    }

    /**
     * Remove history
     *
     * @param \IntField\ParserBundle\Entity\AppleStoreHistory $history
     */
    public function removeHistory(\IntField\ParserBundle\Entity\AppleStoreHistory $history)
    {
        $this->history->removeElement($history);
    }

    /**
     * Get history
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
}