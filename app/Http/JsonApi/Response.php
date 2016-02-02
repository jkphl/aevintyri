<?php

/**
 * aevintyri
 *
 * @category    Apparat
 * @package     Apparat_<Package>
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @license     http://opensource.org/licenses/MIT	The MIT License (MIT)
 */

/***********************************************************************************
 *  The MIT License (MIT)
 *
 *  Copyright © 2015 Joschi Kuphal <joschi@kuphal.net> / @jkphl
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy of
 *  this software and associated documentation files (the "Software"), to deal in
 *  the Software without restriction, including without sizeation the rights to
 *  use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 *  the Software, and to permit persons to whom the Software is furnished to do so,
 *  subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in all
 *  copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 *  FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 *  IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 *  CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 ***********************************************************************************/

namespace App\Http\JsonApi;


use App\Http\JsonApiable;
use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Response extends JsonResponse
{
	/**
	 * Request
	 *
	 * @var Request
	 */
	protected $request;

	/**
	 * Meta data
	 *
	 * @var object
	 */
	protected $meta = null;

	/**
	 * Errors
	 *
	 * @var array
	 */
	protected $errors = [];

	/**
	 * JSON API implementation
	 *
	 * @var string
	 */
	protected $jsonapi = array('version' => '1.0');

	/**
	 * Related resource objects
	 *
	 * @var array
	 */
	protected $included = [];

	/**
	 * Links
	 *
	 * @var Links
	 */
	protected $links = null;

	/**
	 * Return verbose objects
	 *
	 * @var bool
	 */
	protected $verbose = false;

	/**
	 * Return extended relationships
	 *
	 * @var array|boolean
	 */
	protected $extend = false;

	/**
	 * Relationshop inclusions
	 *
	 * @var array
	 */
	protected $include = [];

	/**
	 * Pagination parameters
	 *
	 * @var array
	 */
	protected $pagination = null;

	/**
	 * Relation map of the current primary model
	 *
	 * @var array
	 */
	protected $relmap = [];

	/**
	 * Primary resource object (if not a list of objects)
	 *
	 * @var JsonApiable
	 */
	protected $primary = null;

	/**
	 * Map of all primary resource IDs
	 *
	 * @var array
	 */
	protected $datamap = [];

	/**
	 * Base class name for relation paths
	 *
	 * @var string
	 */
	protected $baseClass = null;

	/**
	 * Map of included records
	 *
	 * @var array
	 */
	protected $inclusionMap = [];

	/**
	 * Debug output
	 *
	 * @var bool
	 */
	protected $debug = false;

	/**
	 * Constructor.
	 *
	 * @param  Builder|JsonApiable|array $data
	 * @param  int $status
	 * @param  array $headers
	 * @param  int $options
	 */
	public function __construct($data, $status = 200, $headers = [], $options = 0)
	{
		$this->request = app('request');
		$this->verbose = (boolean)$this->request->get('verbose');

		$extend = $this->request->get('extend');
		if (!empty($extend) && strlen(trim($extend))) {
			$extend = array_filter(array_map('trim', explode(',', trim($extend))));
			if (count($extend)) {
				$this->extend = in_array('*', $extend) ? true : $extend;
			}
		}

		// Build the JSON API data
		$data = $this->_buildJsonApiData($data);

		// Set the links object
		$this->links = new Links(new Link(($this->primary instanceof ResourceIdentifyable) ? $this->primary->getJsonApiLink() : $this->request->fullUrl()),
			null, $this->pagination);

		// Build the final data
		$jsonData = array_filter(array(
			'jsonapi' => $this->jsonapi,
			'links' => $this->links->toJsonApi($this),
			'data' => $data,
			'included' => array_values($this->included),
		));

		if ($this->debug) {
			print_r($this->inclusionMap);
		}

		// Create the JSON response
		parent::__construct($jsonData, $status, $headers, $options);
	}

	/**
	 * Build the map of includable relationships
	 */
	protected function _buildIncludeMap()
	{
		// Build the include list
		$include = array();
		foreach (array_filter(array_map('trim', explode(',', $this->request->get('include', '')))) as $includePattern) {
			if ($includePattern === '*') {
				$include[] = '[a-z]+';
			} elseif ($includePattern === '**') {
				$include = ['[a-z]+(\.[a-z]+)*'];
				break;
			} elseif (preg_match("%^[a-z\*]+(\.[a-z\*]+)*$%", $includePattern)) {
				$includePattern = str_replace('.', '\\.', $includePattern);
				$includePattern = str_replace('*', '[a-z]+', $includePattern);
				$include[] = $includePattern;
			}
		}

		$this->include = $include;
	}

	/**
	 * Build the JSON API data
	 *
	 * @param Builder|JsonApiable|array $data Data
	 * @return array|void JSON API data
	 */
	protected function _buildJsonApiData($data)
	{
		// If the response is a resource object collection
		if ($data instanceof Builder) {
			call_user_func_array(array($data->getModel(), 'relationMap'), [&$this->relmap]);
			$this->_buildIncludeMap();
			$data = $this->_resourceObjectList($data);

			// Else if it's a single resource object
		} elseif ($data instanceof AbstractModel) {
			$this->primary = $data;
			call_user_func_array(array($data, 'relationMap'), [&$this->relmap]);
			$this->_buildIncludeMap();
			$data = $this->_resourceObjectData($data);

			// Empty result
		} else {
			$data = [];
		}

		return $data;
	}

	/**
	 * Serialize a single resource object
	 *
	 * @param JsonApiable $model Resource object
	 * @return array Serialized resource object
	 */
	protected function _resourceObjectData(JsonApiable $model)
	{
		$this->baseClass = '\\'.get_class($model);
		return $model->toJsonApi($this);
	}

	/**
	 * Serialize a resource object collection
	 *
	 * @param Builder $query Resource objects
	 * @return array                            Resource object list
	 */
	protected function _resourceObjectList(Builder $query)
	{
		// Build the pagination object
		$route = $this->request->route();
		$routeName = (is_array($route) && (count($route) > 1) && is_array($route[1]) && array_key_exists('as',
				$route[1])) ? $route[1]['as'] : null;

		// If there's a name for the current route
		if ($routeName) {
			$number = $size = 0;

			// If pagination parameters are present
			$pageParam = $this->request->get('page');
			if (is_array($pageParam)) {
				if (array_key_exists('number', $pageParam)) {
					$number = intval($pageParam['number']);
				}
				if (array_key_exists('size', $pageParam)) {
					$size = intval($pageParam['size']);
				}
			}

			// If the returned data should be paginated
			if ($size) {
				$count = $query->getQuery()->getCountForPagination();
				if ($count) {
					$query->getQuery()->forPage($number + 1, $size);
					$pagination = array('first' => null, 'last' => null, 'prev' => null, 'next' => null);

					$pagination['first'] = route($routeName) . '?' . http_build_query(array('page' => ['size' => $size]));
					$pagination['last'] = route($routeName) . '?' . http_build_query(array(
							'page' => [
								'size' => $size,
								'number' => floor($count / $size)
							]
						));
					if ($number) {
						$pagination['prev'] = route($routeName) . '?' . http_build_query(array(
								'page' => [
									'size' => $size,
									'number' => ($number - 1)
								]
							));
					}
					if ($number < floor($count / $size)) {
						$pagination['next'] = route($routeName) . '?' . http_build_query(array(
								'page' => [
									'size' => $size,
									'number' => ($number + 1)
								]
							));
					}

					$this->pagination = new Pagination($pagination['first'], $pagination['last'], $pagination['prev'],
						$pagination['next']);

					// Short circuit: no results available
				} else {
					return [];
				}
			}
		}

		// Step 1: Build the data map first
		foreach ($query->get() as $resourceObject) {
			if ($resourceObject instanceof ResourceIdentifyable) {
				$resourceIdentifier = implode('.', $resourceObject->toJsonApiResourceIdentifier());
				$this->datamap[$resourceIdentifier] = $resourceObject;
			}
		}

		// Step 2: Build the JSON API resource objects
		$jsonApiResourceObjects = [];
		foreach ($this->datamap as $resourceObject) {
			if ($resourceObject instanceof JsonApiable) {
				$jsonApiResourceObjects[] = $this->_resourceObjectData($resourceObject);
			}
		}

		return $jsonApiResourceObjects;
	}

	/**
	 * Return if the response should return verbose objects
	 *
	 * @return bool
	 */
	public function isVerbose()
	{
		return $this->verbose;
	}

	/**
	 * Return if the response should return extended relationships
	 *
	 * @return array|bool
	 */
	public function isExtended()
	{
		return $this->extend;
	}

	/**
	 * Return if a particular relation should be included
	 *
	 * @param string $relation Relation
	 * @return bool Relation should be included
	 */
	public function includes($relation)
	{
		$hasIncludePattern = false;
		foreach ($this->include as $includePattern) {
			if (preg_match("%^$includePattern$%", $relation)) {
				$hasIncludePattern = true;
				break;
			}
		}

		if ($hasIncludePattern) {
			$classname = $this->baseClass;
			$expanded = [];

			foreach (explode('.', $relation) as $relationKey) {
				if (array_key_exists("$classname:$relationKey", $this->relmap) && empty($expanded["$classname:$relationKey"])) {
					$expanded["$classname:$relationKey"] = true;
					$classname = $this->relmap["$classname:$relationKey"];
					continue;
				}
				return false;
			}
			return true;
		}

		return false;
	}

	/**
	 * Include a related resource object
	 *
	 * @param ResourceIdentifyable $identifyable Related resource object
	 * @param string $prefix Prefix
	 */
	public function includeResource(ResourceIdentifyable $identifyable, $prefix)
	{
		$resourceIdentifier = $identifyable->toJsonApiResourceIdentifier();
		$resourceIdentifierPlain = implode('.', $resourceIdentifier);
		if (!array_key_exists($resourceIdentifierPlain, $this->datamap) && !array_key_exists($resourceIdentifierPlain,
				$this->included)
		) {
			$this->included[$resourceIdentifierPlain] = $identifyable->toJsonApi($this, $prefix);

			if ($this->debug) {
				$this->inclusionMap[$resourceIdentifier['type']] = empty($this->inclusionMap[$resourceIdentifier['type']]) ? 1 : ($this->inclusionMap[$resourceIdentifier['type']] + 1);
			}
		}
	}
}