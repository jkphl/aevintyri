<?php

/**
 * Event management
 *
 * @category       Tollwerk
 * @package        Tollwerk_Events
 * @author         Joschi Kuphal <joschi@kuphal.net>
 * @copyright      Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license        http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */

namespace Auth\Entity;

/**
 * Abstract base class for entities
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
abstract class AbstractEntity
{
    /**
     * Unique entity ID
     *
     * @var \integer
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Annotation\Exclude()
     */
    protected $id;

    /**
     * Deletion flag
     *
     * @var \boolean
     * @ORM\Column(type="integer")
     */
    protected $sys_deleted;

    /**
     * Last author
     *
     * @var \integer
     * @ORM\Column(type="integer", nullable=true, options={"unsigned"=true})
     */
    protected $sys_author;

    /**
     * Last modification
     *
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $sys_modified;

    /**
     * Creator
     *
     * @var \integer
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $sys_creator;

    /**
     * Creation date
     *
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $sys_created;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setSysDeleted(0);
        $this->setSysCreated(new \DateTime('now'));
        $this->setSysModified(new \DateTime('now'));
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return the $sys_deleted
     */
    public function getSysDeleted()
    {
        return $this->sys_deleted;
    }

    /**
     * @param field_type $sys_deleted
     */
    public function setSysDeleted($sys_deleted)
    {
        $this->sys_deleted = $sys_deleted;
    }

    /**
     * @return the $sys_author
     */
    public function getSysAuthor()
    {
        return $this->sys_author;
    }

    /**
     * @param field_type $sys_author
     */
    public function setSysAuthor($sys_author)
    {
        $this->sys_author = $sys_author;
    }

    /**
     * @return the $sys_modified
     */
    public function getSysModified()
    {
        return $this->sys_modified;
    }

    /**
     * @param field_type $sys_modified
     */
    public function setSysModified($sys_modified)
    {
        $this->sys_modified = $sys_modified;
    }

    /**
     * @return the $sys_creator
     */
    public function getSysCreator()
    {
        return $this->sys_creator;
    }

    /**
     * @param field_type $sys_creator
     */
    public function setSysCreator($sys_creator)
    {
        $this->sys_creator = $sys_creator;
    }

    /**
     * @return the $sys_created
     */
    public function getSysCreated()
    {
        return $this->sys_created;
    }

    /**
     * @param field_type $sys_created
     */
    public function setSysCreated($sys_created)
    {
        $this->sys_created = $sys_created;
    }

    public function setCr($identity)
    {
        $this->setCruser($identity['id']);
        $this->setCrdate(new \DateTime('now'));
    }

    public function setCh($identity)
    {
        $this->setChuser($identity['id']);
        $this->setChdate(new \DateTime('now'));
    }
}