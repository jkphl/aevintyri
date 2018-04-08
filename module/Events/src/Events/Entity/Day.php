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
 * Event day entity
 *
 * @ORM\Table (name="day",uniqueConstraints={@ORM\UniqueConstraint(name="event_date",columns={"event","date"})})
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository")
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Day extends AbstractEntity
{

    /**
     * Date
     *
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * Event
     *
     * @var \Events\Entity\Event
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumn(name="event", referencedColumnName="id", nullable=true)
     **/
    protected $event;

    /**
     * Session collection
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Session", mappedBy="day")
     * @ORM\OrderBy({"start_time" = "ASC"})
     */
    protected $sessions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return \Events\Entity\Event $event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param \Events\Entity\Event $event
     */
    public function setEvent(\Events\Entity\Event $event)
    {
        $this->event = $event;
    }

    /**
     * @return the $sessions
     */
    public function getSessions()
    {
        return $this->sessions->filter(function ($entry) {
            return !$entry->getSys_deleted();
        });
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $sessions
     */
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;
    }
}