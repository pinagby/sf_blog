<?php

namespace Nana\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nana\BlogBundle\Entity\DiaryCategory
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class DiaryCategory
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var datetime $createtime
     *
     * @ORM\Column(name="createtime", type="datetime")
     */
    private $createtime;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set createtime
     *
     * @param datetime $createtime
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;
    }

    /**
     * Get createtime
     *
     * @return datetime 
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }
}