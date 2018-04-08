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

namespace API\V1\Mapper;

/**
 * Link entity mapper
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Link extends \API\V1\Mapper\AbstractMapper
{
    /**
     * Repository of this mapper
     *
     * @var \string
     */
    protected $repository = 'Events\Entity\Link';

    /************************************************************************************************
     * PRIVATE METHODS
     ***********************************************************************************************/

    /**
     * Map a single link
     *
     * @param \Events\Entity\Link $link Link
     * @param boolean $dereference      Dereference external entities
     *
     * @return \array                            Mapped link
     */
    public static function map(\Events\Entity\Link $link, $dereference = false)
    {
        $mapped = array(
            'id'   => $link->getId(),
            'name' => $link->getName(),
            'url'  => self::url($link->getUrl()),
        );

        return $mapped;
    }
}