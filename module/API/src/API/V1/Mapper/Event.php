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
 * Abstract entity mapper base class
 *
 * @author        Joschi Kuphal <joschi@kuphal.net>
 */
class Event extends \API\V1\Mapper\AbstractMapper
{
    /**
     * Repository of this mapper
     *
     * @var \string
     */
    protected $repository = 'Events\Entity\Event';

    /**
     * Fetch all or a subset of events
     *
     * @param \ArrayObject|\array $params REST parameters
     * @param \int $offset                Page offset
     * @param \int $itemCountPerPage      Items per page
     *
     * @return \array                                        Items
     */
    public function fetchAll($params = array(), $offset = null, $itemCountPerPage = null)
    {
        $start  = array_key_exists('start', $params) ? intval($params['start']) : null;
        $end    = array_key_exists('end', $params) ? intval($params['end']) : null;
        $events = array();

        foreach (
            $this->getEntityManager()->getRepository($this->repository)
                 ->findByDateRange($start, $end, $itemCountPerPage, $offset) as $event
        ) {
            $events[] = self::map($event, array_key_exists('flat', $params) ? !!intval($params['flat']) : false);
        }

        return $events;
    }

    /**
     * Map a single event
     *
     * @param \Events\Entity\Event $event Event
     * @param boolean $dereference        Dereference external entities
     *
     * @return \array                        Mapped event
     */
    public static function map(\Events\Entity\Event $event, $dereference = false)
    {
// 		$dereference		= true;
        $mapped = array(
            'id'   => $event->getId(),
            'name' => $event->getName(),

            'email'    => self::emptyValue($event->getEmail()),
            'phone'    => self::emptyValue($event->getPhone()),
            'fax'      => self::emptyValue($event->getFax()),
            'cell'     => self::emptyValue($event->getCell()),
            'web'      => self::url($event->getWeb()),
            'facebook' => self::url($event->getFacebook()),
            'twitter'  => self::url($event->getTwitter(), self::TWITTER_URL),
            'xing'     => self::url($event->getXing()),
            'gplus'    => self::url($event->getGplus()),

            'event' => array(
                'facebook' => self::url($event->getFacebook_event()),
                'xing'     => self::url($event->getXing_event()),
                'gplus'    => self::url($event->getGplus_event()),
                'lanyrd'   => self::url($event->getLanyrd()),
                'tickets'  => self::url($event->getTickets()),
            ),

            'hashtags'    => self::hashtags($event->getHashtag()),
            'description' => self::markdown($event->getDescription()),
            'abstract'    => self::emptyValue($event->getAbstract()),

            'image' => self::image($event->getImage()),

            'organizer' => $event->getOrganizer() ? ($dereference ? \API\V1\Mapper\Organizer::map($event->getOrganizer(),
                $dereference) : $event->getOrganizer()->getId()) : null,
            'series'    => $event->getSeries() ? ($dereference ? \API\V1\Mapper\Series::map($event->getSeries(),
                $dereference) : $event->getSeries()->getId()) : null,
            'days'      => array(),
        );

        foreach ($event->getDays() as $day) {
            $mapped['days'][] = $dereference ? \API\V1\Mapper\Day::map($day, $dereference) : $day->getId();
        }

        return $mapped;
    }

    /************************************************************************************************
     * PRIVATE METHODS
     ***********************************************************************************************/

    /**
     * Count all or a subset of entities
     *
     * @param \ArrayObject|\array $params REST parameters
     *
     * @return \int                                            Number of items
     */
    public function countAll($params = array())
    {
        $start = array_key_exists('start', $params) ? intval($params['start']) : null;
        $end   = array_key_exists('end', $params) ? intval($params['end']) : null;

        return $this->getEntityManager()->getRepository($this->repository)->countByDateRange($start, $end);
    }
}

/*
		"\u0000*\u0000series": null,
"\u0000*\u0000days": {},
"\u0000*\u0000startDate": null,
"\u0000*\u0000endDate": null,
		"\u0000*\u0000name": "Accessibility Club #2",
		"\u0000*\u0000organizer": {
		    "__initializer__": {},
		    "__cloner__": {},
		    "__isInitialized__": false
		},
		"\u0000*\u0000id": 2,
		"\u0000*\u0000email": "",
		"\u0000*\u0000phone": "",
		"\u0000*\u0000fax": "",
		"\u0000*\u0000cell": "",
		"\u0000*\u0000web": "",
		"\u0000*\u0000facebook": "",
		"\u0000*\u0000twitter": "",
		"\u0000*\u0000xing": "",
		"\u0000*\u0000gplus": "",
"\u0000*\u0000hashtag": "",
"\u0000*\u0000description": "",
"\u0000*\u0000abstract": "",
"\u0000*\u0000image": ""
*/