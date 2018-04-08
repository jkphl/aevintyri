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
 * Abstract event entity
 *
 * @ORM\Table (name="event")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"series" = "Series", "single" = "Event"})
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class AbstractEventEntity extends AbstractEntity
{
    use \Events\Traits\Contact;
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
     * Event organizer
     *
     * @var \Events\Entity\Organizer
     * @ORM\ManyToOne(targetEntity="Organizer", inversedBy="organizerOf", cascade={"all"})
     * @ORM\JoinColumn(name="organizer", referencedColumnName="id", nullable=false)
     */
    protected $organizer;

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return the $organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param field_type $organizer
     */
    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }
}