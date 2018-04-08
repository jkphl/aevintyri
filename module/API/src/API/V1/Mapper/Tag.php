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
 * Tag entity mapper
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Tag extends \API\V1\Mapper\AbstractMapper
{
    /**
     * Repository of this mapper
     *
     * @var \string
     */
    protected $repository = 'Events\Entity\Tag';

    /************************************************************************************************
     * PRIVATE METHODS
     ***********************************************************************************************/

    /**
     * Map a single tag
     *
     * @param \Events\Entity\Tag $tag Tag
     * @param boolean $dereference    Dereference external entities
     *
     * @return \array                            Mapped tag
     */
    public static function map(\Events\Entity\Tag $tag, $dereference = false)
    {
        $mapped = array(
            'id'    => $tag->getId(),
            'name'  => $tag->getName(),
            'color' => self::emptyValue($tag->getColor()),
        );

        return $mapped;
    }
}