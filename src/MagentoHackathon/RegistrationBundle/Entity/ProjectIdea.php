<?php

namespace MagentoHackathon\RegistrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagentoHackathon\RegistrationBundle\Entity\ProjectIdea
 */
class ProjectIdea
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $project_id
     */
    private $project_id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $author
     */
    private $author;

    /**
     * @var \DateTime $created_at
     */
    private $created_at;


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
     * Set project_id
     *
     * @param integer $projectId
     */
    public function setProjectId($projectId)
    {
        $this->project_id = $projectId;
    }

    /**
     * Get project_id
     *
     * @return integer
     */
    public function getProjectId()
    {
        return $this->project_id;
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
     * Set author
     *
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @var string $description
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
}