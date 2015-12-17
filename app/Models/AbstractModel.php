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
 *  the Software without restriction, including without limitation the rights to
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

namespace App\Models;

use App\Http\JsonApi\Link;
use App\Http\JsonApi\Links;
use App\Http\JsonApi\ResourceIdentifyable;
use App\Http\JsonApi\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Abstract base model
 *
 * @package App\Models
 * @method static find($id, $columns = ['*']) \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|null find($id, $columns = ['*']) Find a model by its primary key.
 */
abstract class AbstractModel extends Model implements ResourceIdentifyable
{
	/**
	 * Use soft deletion
	 */
	use SoftDeletes;

	/**
	 * The extended accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $extends = array();

	/**
	 * Relation mapping
	 *
	 * @var array
	 */
	public static $relmap = array();
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	/**
	 * JSON API short name
	 *
	 * @var string
	 */
	protected $jsonApiShortname = null;

	/**
	 * Default order property
	 *
	 * @var string
	 */
	protected $orderBy;

	/**
	 * Default order direction
	 *
	 * @var string
	 */
	protected $orderDirection = 'ASC';

	/**
	 * Apply default ordering to a query
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query Original query
	 * @return \Illuminate\Database\Eloquent\Builder Ordered query
	 */
	public function scopeOrdered(\Illuminate\Database\Eloquent\Builder $query)
	{
		if ($this->orderBy) {
			/** @noinspection PhpUndefinedMethodInspection */
			return $query->orderBy($this->orderBy, $this->orderDirection);
		}

		return $query;
	}

	/**
	 * Apply default ordering to a query
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query Original query
	 * @return \Illuminate\Database\Eloquent\Builder Ordered query
	 */
	public function scopeGetOrdered(\Illuminate\Database\Eloquent\Builder $query)
	{
		return $this->scopeOrdered($query)->get();
	}

	/**
	 * Return the relation map for this model
	 *
	 * @param string $prefix Prefix
	 * @param bool|false $recursive Recursive
	 * @param array $excludeTypes Exclude types (infinite loop prevention)
	 * @return array
	 */
	public static function relationMap($prefix = '', $recursive = false, array &$excludeTypes = [])
	{
		$relationMap = array();
		foreach (static::$relmap as $relation => $relationModel) {
			$relationPath = ($prefix ? "$prefix." : '') . $relation;
			$relationMap[$relationPath] = $relationModel;
			if ($recursive && empty($excludeTypes[$relation])) {
				$excludeTypes[$relation] = true;
				$relationMapArguments = [$relationPath, true, &$excludeTypes];
				$relationMap = array_merge($relationMap,
					call_user_func_array(array($relationModel, 'relationMap'), $relationMapArguments));
			} else {
				$excludeTypes[$relation] = true;
			}
		}
		return $relationMap;
	}

	/**
	 * Return all append columns
	 *
	 * @return array            Append columns
	 */
	public function getAppends()
	{
		return $this->appends;
	}

	/**
	 * Return as a JSON API array
	 *
	 * @param Response $response JSON API response
	 * @param string $prefix Prefix
	 * @return array|string
	 */
	public function toJsonApi(Response $response, $prefix = '')
	{
		// Prepare the attributes
		$attributes = $this->attributesToArray();
		unset($attributes['id']);
		if (!$response->isVerbose()) {
			$attributes = array_filter($attributes);
		}

		// Prepare the relations
		$relationships = [];
		$extend = $response->isExtended();
		if ($extend === true) {
			$appends = array_unique(array_merge($this->appends, $this->extends));
		} elseif (is_array($extend) && count($extend)) {
			$appends = array_unique(array_merge($this->appends, array_intersect($extend, $this->extends)));
		} else {
			$appends = $this->appends;
		}
		foreach ($appends as $append) {
			$includePath = ($prefix ? "$prefix." : '') . $append;
			$includeRelation = $response->includes($includePath);
			$appendRelations = $this->mutateAttribute($append, null);

//			echo (is_object($appendRelations) ? get_class($appendRelations) : gettype($appendRelations)) . PHP_EOL;

			if ($appendRelations instanceof ResourceIdentifyable) {
				$relationships[$append]['data'] = $appendRelations->toJsonApiResourceIdentifier();
				if ($includeRelation) {
					$response->includeResource($appendRelations, $includePath);
				}
			} elseif (
				is_array($appendRelations)
				|| ($appendRelations instanceof \Illuminate\Database\Eloquent\Relations\Relation)
//				|| ($appendRelations instanceof \Illuminate\Database\Eloquent\Collection)
			) {
				$relationships[$append] = ['data' => []];

				/** @var ResourceIdentifyable $appendRelation */
				foreach ($appendRelations as $appendRelation) {
					$relationships[$append]['data'][] = $appendRelation->toJsonApiResourceIdentifier();
					if ($includeRelation) {
						$response->includeResource($appendRelation, $includePath);
					}
				}
			} elseif ($appendRelations === null) {
				continue;

				// Else if it's a date / time
			} elseif ($appendRelations instanceof \Carbon\Carbon) {
				$attributes[$append] = $this->serializeDate($appendRelations);

				// Else: Invalid relationship
			} else {
				die('INVALID RELATIONSHIPS (' . __FILE__ . ':' . __LINE__ . '): ' . gettype($appendRelations));
			}
			if (empty($relationships[$append]['data']) || (is_array($relationships[$append]['data'])) && !count($relationships[$append]['data'])) {
				unset($relationships[$append]);
			}
		}

		$jsonApiLinks = new Links(new Link($this->getJsonApiLink()));
		$jsonApiData = array_merge($this->toJsonApiResourceIdentifier(), [
			'attributes' => $attributes,
			'relationships' => $relationships,
			'links' => $jsonApiLinks->toJsonApi($response),
		]);

		return array_filter($jsonApiData);
	}

	/**
	 * Return the URL to request this object
	 *
	 * @return string
	 */
	public function getJsonApiLink()
	{
		return route($this->getJsonApiShortname(), ['id' => $this->id]);
	}

	/**
	 * Return the classes short name (lower-cased)
	 *
	 * @return string
	 */
	protected function getJsonApiShortname()
	{
		if ($this->jsonApiShortname === null) {
			$modelReflectionClass = new \ReflectionClass($this);
			$this->jsonApiShortname = strtolower($modelReflectionClass->getShortName());
		}
		return $this->jsonApiShortname;
	}

	/**
	 * Return a resource identifier object
	 *
	 * @return array Resource identifier object
	 */
	public function toJsonApiResourceIdentifier()
	{
		return [
			'type' => $this->getJsonApiShortname(),
			'id' => strval($this->id)
		];
	}

	/**
	 * Prepare a date for array / JSON serialization.
	 *
	 * @param  \DateTime $date
	 * @return string
	 */
	protected function serializeDate(\DateTime $date)
	{
		return $date->format(self::JSON_DATE_FORMAT);
	}

	/**
	 * Complete an URL
	 *
	 * @param string $url URL
	 * @param string $pattern Pattern with placeholder
	 * @param string $preferredSchema Preferred schema
	 * @return string URL with schema
	 */
	protected function _makeUrl($url, $pattern = null, $preferredSchema = 'https')
	{
		$url = trim($url);
		if (strlen($url) && strlen($pattern)) {
			$url = sprintf($pattern, $url);
		}
		if (strlen($url) && !preg_match('%^https?\://%', $url)) {
			$schema = preg_replace('%\://?%', '', ($preferredSchema ?: 'https')) . '://';
			$url = $schema . $url;
		}
		return $url;
	}
}