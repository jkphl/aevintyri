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

namespace Events\Traits;

/**
 * Texts trait
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
trait Texts
{
    /**
     * Hashtag
     *
     * @var \string
     * @ORM\Column(type="string")
     */
    protected $hashtag;

    /**
     * Description
     *
     * @var \string
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * Abstract
     *
     * @var \string
     * @ORM\Column(type="text")
     */
    protected $abstract;

    /**
     * @return the $hashtag
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * @param string $hashtag
     */
    public function setHashtag($hashtag)
    {
        $this->hashtag = preg_replace('%^\#+%', '', $hashtag);
    }

    /**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return the $abstract
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }
}