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

/**
 *
 * ./vendor/bin/doctrine-module orm:validate-schema
 * ./vendor/bin/doctrine-module orm:schema-tool:update --dump-sql
 * ./vendor/bin/doctrine-module orm:schema-tool:update --force
 */

namespace Events\Entity;

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
        $this->setSys_deleted(0);
        $this->setSys_created(new \DateTime('now'));
        $this->setSys_modified(new \DateTime('now'));
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
    public function getSys_deleted()
    {
        return $this->sys_deleted;
    }

    /**
     * @param field_type $sys_deleted
     */
    public function setSys_deleted($sys_deleted)
    {
        $this->sys_deleted = $sys_deleted;
    }

    /**
     * @return the $sys_author
     */
    public function getSys_author()
    {
        return $this->sys_author;
    }

    /**
     * @param field_type $sys_author
     */
    public function setSys_author($sys_author)
    {
        $this->sys_author = $sys_author;
    }

    /**
     * @return the $sys_modified
     */
    public function getSys_modified()
    {
        return $this->sys_modified;
    }

    /**
     * @param field_type $sys_modified
     */
    public function setSys_modified($sys_modified)
    {
        $this->sys_modified = $sys_modified;
    }

    /**
     * @return the $sys_creator
     */
    public function getSys_creator()
    {
        return $this->sys_creator;
    }

    /**
     * @param field_type $sys_creator
     */
    public function setSys_creator($sys_creator)
    {
        $this->sys_creator = $sys_creator;
    }

    /**
     * @return the $sys_created
     */
    public function getSys_created()
    {
        return $this->sys_created;
    }

    /**
     * @param field_type $sys_created
     */
    public function setSys_created($sys_created)
    {
        $this->sys_created = $sys_created;
    }

    /**
     * Actions before record creation
     *
     * @return void
     */
    public function onBeforeCreate()
    {
    }

    /**
     * Actions before record update
     *
     * @return void
     */
    public function onBeforeUpdate()
    {
    }

    /**
     * Actions after record creation
     *
     * @return \boolean                Save once more
     */
    public function onAfterCreate()
    {
        return false;
    }

    /**
     * Actions after record update
     *
     * @return \boolean                Save once more
     */
    public function onAfterUpdate()
    {
        return false;
    }
}