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
 * Presenter entity
 *
 * @ORM\Table (name="presenter")
 * @ORM\Entity(repositoryClass="Events\Repository\EntityRepository")
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Presenter extends AbstractEntity
{
    use \Events\Traits\Contact;
    use \Events\Traits\Image;
    use \Events\Traits\Texts;

    /**
     * Name
     *
     * @var \string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * Tags
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="presenters", cascade={"all"})
     * @ORM\JoinColumn(name="tag", referencedColumnName="id", unique=true, nullable=true)
     */
    protected $tags;

    /**
     * Links
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Link", mappedBy="presenter", cascade={"all"})
     */
    protected $links;

    /**
     * Sessions with this presenter
     *
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="Session", mappedBy="presenters", cascade={"all"})
     */
    protected $sessions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->tags     = new \Doctrine\Common\Collections\ArrayCollection();
        $this->links    = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sessions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return the $tags
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * Adds tags
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $tags
     */
    public function addTags(\Doctrine\Common\Collections\ArrayCollection $tags)
    {
        foreach ($tags as $tag) {
            if (!$this->tags->contains($tag)) {
                $this->tags->add($tag);
            }
        }
    }

    /**
     * Removes tags
     *
     * @param \Doctrine\Common\Collections\ArrayCollection $tags
     */
    public function removeTags(\Doctrine\Common\Collections\ArrayCollection $tags)
    {
        foreach ($tags as $tag) {
            if ($this->tags->contains($tag)) {
                $this->tags->removeElement($tag);
            }
        }
    }

    /**
     * @return the $sessions
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $sessions
     */
    public function setSessions($sessions)
    {
        $this->sessions = $sessions;
    }

    /**
     * @return the $links
     */
    public function getLinks()
    {
        $links = array();
        foreach ($this->links as $link) {
            if (!$link->getSys_deleted()) {
                $links[] = $link;
            }
        }

        return $links;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
    }

    /**
     * Actions before record creation
     *
     * @return \boolean                Save once more
     */
    public function onAfterCreate()
    {
        return $this->_persistImage('presenter');
    }

    /**
     * Actions before record update
     *
     * @return void
     */
    public function onBeforeUpdate()
    {
        return $this->_persistImage('presenter');
    }
}