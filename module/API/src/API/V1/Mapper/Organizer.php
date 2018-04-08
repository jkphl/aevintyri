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
 * Organizer entity mapper
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Organizer extends \API\V1\Mapper\AbstractMapper
{
    /**
     * Repository of this mapper
     *
     * @var \string
     */
    protected $repository = 'Events\Entity\Organizer';

    /************************************************************************************************
     * PRIVATE METHODS
     ***********************************************************************************************/

    /**
     * Map a single organizer
     *
     * @param \Events\Entity\Organizer $organizer Organizer
     * @param boolean $dereference                Dereference external entities
     *
     * @return \array                            Mapped organizer
     */
    public static function map(\Events\Entity\Organizer $organizer, $dereference = false)
    {
        $mapped = array(
            'id'      => $organizer->getId(),
            'name'    => $organizer->getName(),
            'company' => self::emptyValue($organizer->getCompany()),

            'street_address_1' => self::emptyValue($organizer->getStreet_address_1()),
            'co'               => self::emptyValue($organizer->getCo()),
            'postbox'          => self::emptyValue($organizer->getPostbox()),
            'postal_code'      => self::emptyValue($organizer->getPostal_code()),
            'locality'         => self::emptyValue($organizer->getLocality()),
            'region'           => self::emptyValue($organizer->getRegion()),
            'country'          => $organizer->getCountry() ? ($dereference ? \API\V1\Mapper\Country::map($organizer->getCountry(),
                $dereference) : $organizer->getCountry()->getId()) : null,
            'latitude'         => self::float($organizer->getLatitude()),
            'longitude'        => self::float($organizer->getLongitude()),

            'email'    => self::emptyValue($organizer->getEmail()),
            'phone'    => self::emptyValue($organizer->getPhone()),
            'fax'      => self::emptyValue($organizer->getFax()),
            'cell'     => self::emptyValue($organizer->getCell()),
            'web'      => self::url($organizer->getWeb()),
            'facebook' => self::url($organizer->getFacebook()),
            'twitter'  => self::url(self::TWITTER_URL.$organizer->getTwitter()),
            'xing'     => self::url($organizer->getXing()),
            'gplus'    => self::url($organizer->getGplus()),

            'image' => self::image($organizer->getImage()),
        );

        return $mapped;
    }
}