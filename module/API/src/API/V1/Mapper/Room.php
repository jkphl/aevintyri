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
 * Room entity mapper
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Room extends \API\V1\Mapper\AbstractMapper
{
    /**
     * Repository of this mapper
     *
     * @var \string
     */
    protected $repository = 'Events\Entity\Room';

    /************************************************************************************************
     * PRIVATE METHODS
     ***********************************************************************************************/

    /**
     * Map a single room
     *
     * @param \Events\Entity\Room $room Room
     * @param boolean $dereference      Dereference external entities
     *
     * @return \array                            Mapped room
     */
    public static function map(\Events\Entity\Room $room, $dereference = false)
    {
        $mapped = array(
            'id'     => $room->getId(),
            'name'   => $room->getName(),
            'number' => self::emptyValue($room->getNumber()),

            'hashtags'    => self::hashtags($room->getHashtag()),
            'description' => self::markdown($room->getDescription()),
            'abstract'    => self::emptyValue($room->getAbstract()),

            'venue' => $room->getVenue() ? ($dereference ? \API\V1\Mapper\Venue::map($room->getVenue(),
                $dereference) : $room->getVenue()->getId()) : null,
        );

        return $mapped;
    }
}