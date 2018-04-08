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

trait AbstractRepository
{

    /**
     * Entity manager
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    public function getEntityManager()
    {
        if (!$this->entityManager instanceof \Doctrine\ORM\EntityManager) {
            $this->entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->entityManager;
    }
}