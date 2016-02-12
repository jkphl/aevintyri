<?php

/**
 * Event management
 *
 * @category	Tollwerk
 * @package		Tollwerk_Events
 * @author		Joschi Kuphal <joschi@kuphal.net>
 * @copyright	Copyright © 2014 tollwerk GmbH <info@tollwerk.de>
 * @license		http://opensource.org/licenses/BSD-3-Clause	The BSD 3-Clause License
 */
namespace Events\Repository;

class EventRepository extends EntityRepository {
	
	/**
	 * Find all Events in calendar order
	 * 
	 * @return \array
	 */
	public function findCalendarEvents() {
		return $this->findByDateRange(time());
	}
	
	/**
	 * Find all events within a certain date range
	 * 
	 * @param \int $start					Start date/time
	 * @param \int $end						End date/time
	 * @param \int $limit					Max. number of events returned
	 * @param \int $offset					Result page offset
	 * @return \array						Results
	 */
	public function findByDateRange($start = null, $end = null, $limit = null, $offset = null) {
		$em					= $this->_em;
		$dayConstraint		= array('d.sys_deleted = 0');
		$sessionConstraint	= array('d.sys_deleted = 0');
		
		if ($start !== null) {
			$dayConstraint[]		= "d.date >= '".date('Y-m-d', $start)."'";
		}
		
		if ($end !== null) {
			$dayConstraint[]		= "d.date <= '".date('Y-m-d', $end)."'";
		}
		
		/* @var $queryBuilder \Doctrine\ORM\QueryBuilder */
		$queryBuilder	= $em->createQueryBuilder();
		$query			= $queryBuilder->select(array(
								'e',
// 								'MIN(s.start_time) AS start_time',
// 								'MAX(s.end_time) AS end_time',
							))->from('Events\Entity\Event', 'e')
							->innerJoin('e.days', 'd', \Doctrine\ORM\Query\Expr\Join::WITH, implode(' AND ', $dayConstraint))
							->leftJoin('d.sessions', 's', \Doctrine\ORM\Query\Expr\Join::WITH, 's.sys_deleted = 0')
							->where('e.sys_deleted = 0')
							->orderBy('d.date', 'ASC')
							->addOrderBy('s.start_time', 'ASC')
							->groupBy('e.id');
		
		if ($limit !== null) {
			$query->setMaxResults($limit);
		}
		
		if ($offset !== null) {
			$query->setFirstResult($offset);
		}
		
// 		$em->newHydrator(\Doctrine\ORM\Query::HYDRATE_OBJECT)->hydrateAll(array(), $query, array(\Doctrine\ORM\UnitOfWork::HINT_DEFEREAGERLOAD => true));
		
// 		if ($start !== null) {
// 			$query->having($query->expr()->gte('MIN(s.start_time)', date('H:i:s', $start)));
// 			if ($end !== null) {
					
// 			}
// 		} elseif ($end !== null) {
			
// 		}
		
// 		die($query->getQuery()->getSQL()."\n\n");

		return $query->getQuery()->getResult();
	}
	
	/**
	 * Find all events within a certain date range
	 * 
	 * @param \int $start					Start date/time
	 * @param \int $end						End date/time
	 * @param \int $limit					Max. number of events returned
	 * @param \int $offset					Result page offset
	 * @return \array						Results
	 */
	public function countByDateRange($start = null, $end = null, $limit = null, $offset = null) {
		$em					= $this->_em;
		$dayConstraint		= array('d.sys_deleted = 0');
		$sessionConstraint	= array('d.sys_deleted = 0');
		
		if ($start !== null) {
			$dayConstraint[]		= "d.date >= '".date('Y-m-d', $start)."'";
		}
		
		if ($end !== null) {
			$dayConstraint[]		= "d.date <= '".date('Y-m-d', $end)."'";
		}
		
		/* @var $queryBuilder \Doctrine\ORM\QueryBuilder */
		$queryBuilder	= $em->createQueryBuilder();
		$query			= $queryBuilder->select('COUNT(DISTINCT e.id) AS c')->from('Events\Entity\Event', 'e')
							->innerJoin('e.days', 'd', \Doctrine\ORM\Query\Expr\Join::WITH, implode(' AND ', $dayConstraint))
							->leftJoin('d.sessions', 's', \Doctrine\ORM\Query\Expr\Join::WITH, 's.sys_deleted = 0')
							->where('e.sys_deleted = 0')
							->orderBy('d.date', 'ASC')
							->addOrderBy('s.start_time', 'ASC');
		
		$result				= $query->getQuery()->getResult();
		return ($result && is_array($result) && count($result)) ? intval($result[0]['c']) : 0;
	}
}