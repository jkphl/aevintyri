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

namespace Auth\Repository;

class EntityRepository extends \Doctrine\ORM\EntityRepository
{

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
    public function findAll()
    {
        return $this->findBy($this->defaultConstraints);
    }

    /**
     * Finds entities by a set of criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return array The objects.
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        if (!array_key_exists('sys_deleted', $criteria)) {
            $criteria['sys_deleted'] = 0;
        }

        $persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);

        return $persister->loadAll($criteria, $orderBy, $limit, $offset);
    }

    /**
     * Finds a single entity by a set of criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     *
     * @return object null entity instance or NULL if the entity can not be found.
     */
    public function findOneBy(array $criteria, array $orderBy = null)
    {
        if (!array_key_exists('sys_deleted', $criteria)) {
            $criteria['sys_deleted'] = 0;
        }

        $persister = $this->_em->getUnitOfWork()->getEntityPersister($this->_entityName);

        return $persister->load($criteria, null, null, array(), 0, 1, $orderBy);
    }

    public function getRelationCustomerContact($criteria)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();
        $q  = $qb->select('p')->from('Relationship\Entity\Person', 'p')->innerJOIN('p.contact_customer_relations', 'r')
                 ->where('r.id = '.$criteria['id'])->getQuery()->getResult();

        return $q;
    }

    public function getRelationAgencyContact($criteria)
    {
        $em = $this->_em;
        $qb = $em->createQueryBuilder();
        $q  = $qb->select('p')->from('Relationship\Entity\Person', 'p')->innerJOIN('p.contact_agency_relations', 'r')
                 ->where('r.id = '.$criteria['id'])->getQuery()->getResult();

        return $q;
    }
}