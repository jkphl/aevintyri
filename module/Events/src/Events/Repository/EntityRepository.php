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

class EntityRepository extends \Doctrine\ORM\EntityRepository {
	
	/**
	 * Default constraints
	 *
	 * @var \array
	 */
	public $defaultConstraints = array(
		'sys_deleted' => 0
	);
	
	/**
	 * Finds all entities in the repository.
	 *
	 * @return array The entities.
	 */
	public function findAll() {
		return $this->findBy($this->defaultConstraints);
	}
	
	/**
	 * Finds entities by a set of criteria
	 *
	 * @param \array $params        	
	 * @param array|null $orderBy        	
	 * @param int|null $limit        	
	 * @param int|null $offset        	
	 *
	 * @return array The objects.
	 */
	public function findBy(array $params, array $orderBy = null, $limit = null, $offset = null) {
		if (!array_key_exists('sys_deleted', $params)) {
			$criteria['sys_deleted'] = 0;
		}
		
		$persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);
		return $persister->loadAll($params, $orderBy, $limit, $offset);
	}
	
	/**
	 * Finds a single entity by a set of criteria.
	 *
	 * @param array $criteria        	
	 * @param array|null $orderBy        	
	 *
	 * @return object null entity instance or NULL if the entity can not be found.
	 */
	public function findOneBy(array $criteria, array $orderBy = null) {
		if (!array_key_exists('sys_deleted', $criteria)) {
			$criteria['sys_deleted'] = 0;
		}
		
		$persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);
		return $persister->load($criteria, null, null, array(), 0, 1, $orderBy);
	}
	
	/**
	 * Count the number of items with a set of criteria
	 *
	 * @param array $criteria        	
	 *
	 * @return array The objects.
	 */
	public function countBy($criteria = array()) {
		if (!array_key_exists('sys_deleted', $criteria)) {
			$criteria['sys_deleted'] = 0;
		}
		
		$queryBuilder		= $this->_em->createQueryBuilder();
		$query				= $queryBuilder->select('COUNT(e.id) AS c')->from($this->_entityName, 'e')
								->where('e.sys_deleted = '.intval(array_key_exists('sys_deleted', $criteria) ? $criteria['sys_deleted'] : 0));
		
// 		if (array_key_exists('start', $criteria)) {
// 			$query->where('e.')
// 		}
		
		$result				= $query->getQuery()->getResult();
		return ($result && is_array($result) && count($result)) ? intval($result[0]['c']) : 0;
	}
}