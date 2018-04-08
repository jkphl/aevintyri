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
 * Room entity
 *
 * @ORM\Table (name="room")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository")
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Room extends AbstractEntity
{
    use \Events\Traits\Texts;

    /**
     * Name
     *
     * @var \string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Number
     *
     * @var \string
     * @ORM\Column(type="string")
     */
    protected $number;

    /**
     * Venue
     *
     * @var \Events\Entity\Venue
     * @ORM\ManyToOne(targetEntity="Venue", inversedBy="rooms", cascade={"all"})
     * @ORM\JoinColumn(name="venue", referencedColumnName="id", nullable=false)
     **/
    protected $venue;

    /**
     * Return the full name of this room (including the venue name)
     *
     * @return \string            Full name
     */
    public function getFullName()
    {
        $venue = $this->getVenue()->getName();
        $room  = $this->getName();

        return strlen($room) ? $venue.' ['.$room.']' : $venue;
    }

    /**
     * @return the $venue
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param \Events\Entity\Venue $venue
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;
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
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }
}