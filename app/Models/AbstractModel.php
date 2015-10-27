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

use App\Http\JsonApi\ResourceIdentifyable;
use App\Http\JsonApi\Response;
use App\Http\JsonApiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Abstract base model
 *
 * @package App\Models
 */
abstract class AbstractModel extends Model implements JsonApiable, ResourceIdentifyable
{
    /**
     * Use soft deletion
     */
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array();

    /**
     * Determine if a particular attribute should be expanded during conversion to an array (depending on the request parameters)
     *
     * @param string $attribute Attribute
     * @return bool                     Attribute should be expanded
     * @deprecated
     */
    protected function expand_deprecated($attribute)
    {
        $expand = app('request')->get('expand', '');
        if ($expand === '*') {
            return true;
        } else {
            $expand = array_filter(array_map('trim', explode(',', $expand)));
        }
        if (count($expand)) {
            $mutators = [$attribute];
            $lastModel = null;

            // Run through the stack trace
            foreach (debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS) as $frame) {
                if (isset($frame['object']) && ($frame['object'] instanceof self) && (spl_object_hash($frame['object']) != $lastModel)) {
                    $lastModel = spl_object_hash($frame['object']);
                    $mutators[] = strtolower((new \ReflectionClass($frame['object']))->getShortName());
                }
            }

            array_pop($mutators);
            $expandKey = implode('.', array_reverse($mutators));
            return in_array($expandKey, $expand);
        }

        return false;
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
        // Prepare the object type
        $modelReflectionClass = new \ReflectionClass($this);
        $type = strtolower($modelReflectionClass->getShortName());

        // Prepare the attributes
        $attributes = $this->attributesToArray();
        unset($attributes['id']);
        if (!$response->isVerbose()) {
            $attributes = array_filter($attributes);
        }

        // Prepare the relations
        $relations = [];
        foreach ($this->appends as $append) {
            $includePath = ($prefix ? "$prefix." : '').$append;
            $includeRelation = $response->includes($includePath);
            $appendRelations = $this->mutateAttribute($append, null);

//            echo (is_object($appendRelations) ? get_class($appendRelations) : gettype($appendRelations)).PHP_EOL;

            if ($appendRelations instanceof ResourceIdentifyable) {
                $relations[$append]['data'] = $appendRelations->toJsonApiResourceIdentifier();
                if ($includeRelation) {
                    $response->includeResource($appendRelations, $includePath);
                }
            } else {
                $relations[$append] = ['data' => []];
                foreach ($appendRelations as $appendRelation) {
                    $relations[$append]['data'][] = $appendRelation->toJsonApiResourceIdentifier();
                    if ($includeRelation) {
                        $response->includeResource($appendRelation, $includePath);
                    }
                }
            }
            if (empty($relations[$append]['data']) || (is_array($relations[$append]['data'])) && !count($relations[$append]['data'])) {
                unset($relations[$append]);
            }
        }

        $jsonApiData = array_merge($this->toJsonApiResourceIdentifier(), [
            'attributes' => $attributes,
            'relations' => $relations,
        ]);

        return array_filter($jsonApiData);
    }

    /**
     * Return a resource identifier object
     *
     * @return object Resource identifier object
     */
    public function toJsonApiResourceIdentifier()
    {

        // Prepare the object type
        $modelReflectionClass = new \ReflectionClass($this);
        $type = strtolower($modelReflectionClass->getShortName());

        return [
            'type' => $type,
            'id' => $this->id
        ];
    }

    /**
     * Return the relation map for this model
     *
     * @param string $prefix            Prefix
     * @param bool|false $recursive     Recursive
     * @return array
     */
    public static function relationMap($prefix = '', $recursive = false) {
        $relationMap = array();
        foreach (static::$relmap as $relation => $relationModel) {
            $relationPath = ($prefix ? "$prefix." : '').$relation;
            $relationMap[$relationPath] = $relationModel;
            if ($recursive) {
                $relationMap = array_merge($relationMap, call_user_func(array($relationModel, 'relationMap'), $relationPath, true));
            }
        }
        return $relationMap;
    }
}