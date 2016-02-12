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
namespace API\V1\Rest\Days;

use ZF\ApiProblem\ApiProblem;
use API\V1\Paginator\Adapter\DoctrineAdapter;

class DaysResource extends \API\V1\Rest\AbstractResource {
	/**
	 * Create a resource
	 *
	 * @param mixed $data        	
	 * @return ApiProblem mixed
	 */
	public function create($data) {
		return new ApiProblem ( 405, 'The POST method has not been defined' );
	}
	
	/**
	 * Delete a resource
	 *
	 * @param mixed $id        	
	 * @return ApiProblem mixed
	 */
	public function delete($id) {
		return new ApiProblem ( 405, 'The DELETE method has not been defined for individual resources' );
	}
	
	/**
	 * Delete a collection, or members of a collection
	 *
	 * @param mixed $data        	
	 * @return ApiProblem mixed
	 */
	public function deleteList($data) {
		return new ApiProblem ( 405, 'The DELETE method has not been defined for collections' );
	}
	
	/**
	 * Fetch a resource
	 *
	 * @param mixed $id        	
	 * @return ApiProblem mixed
	 */
	public function fetch($id) {
		return $this->mapper->fetch($id, (bool)$this->getEvent()->getRequest()->getQuery('flat'));
	}
	
	/**
	 * Fetch all or a subset of resources
	 *
	 * @param array $params        	
	 * @return ApiProblem mixed
	 */
	public function fetchAll($params = array()) {
		$adapter = new DoctrineAdapter($this->mapper, $params);
		return new DaysCollection($adapter);
	}
	
	/**
	 * Patch (partial in-place update) a resource
	 *
	 * @param mixed $id        	
	 * @param mixed $data        	
	 * @return ApiProblem mixed
	 */
	public function patch($id, $data) {
		return new ApiProblem ( 405, 'The PATCH method has not been defined for individual resources' );
	}
	
	/**
	 * Replace a collection or members of a collection
	 *
	 * @param mixed $data        	
	 * @return ApiProblem mixed
	 */
	public function replaceList($data) {
		return new ApiProblem ( 405, 'The PUT method has not been defined for collections' );
	}
	
	/**
	 * Update a resource
	 *
	 * @param mixed $id        	
	 * @param mixed $data        	
	 * @return ApiProblem mixed
	 */
	public function update($id, $data) {
		return new ApiProblem ( 405, 'The PUT method has not been defined for individual resources' );
	}
}
