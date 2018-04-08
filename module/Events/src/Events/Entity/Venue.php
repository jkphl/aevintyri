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

namespace Events\Entity;

/**
 * Event venue entity
 *
 * @ORM\Table (name="venue")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository")
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Venue extends AbstractEntity
{
    use \Events\Traits\Address;
    use \Events\Traits\Texts;
    use \Events\Traits\Image;

    /**
     * Name
     *
     * @var \string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Rooms
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Room", mappedBy="venue", cascade={"all"})
     */
    protected $rooms;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->rooms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return the $name
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

    /**
     * @return the $rooms
     */
    public function getRooms()
    {
        return $this->rooms->filter(function ($entry) {
            return !$entry->getSys_deleted();
        });
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $rooms
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Actions before record creation
     *
     * @return \boolean                Save once more
     */
    public function onAfterCreate()
    {
        return $this->_persistImage('venue');
    }

    /**
     * Actions before record update
     *
     * @return void
     */
    public function onBeforeUpdate()
    {
        return $this->_persistImage('venue');
    }
}