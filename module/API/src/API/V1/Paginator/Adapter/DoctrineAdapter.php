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

namespace API\V1\Paginator\Adapter;
use Zend\Paginator\Adapter\AdapterInterface;
use API\V1\Mapper\AbstractMapper;

class DoctrineAdapter implements AdapterInterface {
	/**
	 * Mapper object
	 * 
	 * @var \API\V1\Mapper\AbstractMapper
	 */
	protected $_mapper;
	/**
	 * REST Parameters
	 * 
	 * @var \ArrayObject
	 */
	protected $_params;
	/**
	 * Count cache 
	 * 
	 * @var \int
	 */
	protected $_count = null;
	
	/**
	 * Constructor
	 * 
	 * @param \API\V1\Mapper\AbstractMapper $mapper			Mapper object
	 * @param \ArrayObject|array $params					REST parameters
	 */
	public function __construct(AbstractMapper $mapper, $params = array()) {
		$this->_mapper		= $mapper;
		$this->_params		= $params;
	}
	
	/**
	 * Get the items
	 * 
	 * @param \int $offset									Page offset
	 * @param \int $itemCountPerPage						Items per page
	 * @return 
	 * @see \Zend\Paginator\Adapter\AdapterInterface::getItems()
	 */
	public function getItems($offset, $itemCountPerPage) {
		return $this->_mapper->fetchAll($this->_params, $offset, $itemCountPerPage);
	}

	/**
	 * Return the number of all items
	 * 
	 * @return \int											Number of all items
	 * @see Countable::count()
	 */
	public function count() {
		if ($this->_count === null) {
			$this->_count = $this->_mapper->countAll($this->_params);
		}
		return $this->_count;
	}
} 