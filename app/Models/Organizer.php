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

use App\Traits\Address;
use App\Traits\Contact;
use App\Traits\Image;

final class Organizer extends AbstractModel
{
	/**
	 * Use the address, contact and image features
	 */
	use Address, Contact, Image;

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array('country_id', 'country', 'usergroup_id');

	/**
	 * The accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $appends = array('country');

	/**
	 * The extended accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $extends = array('events', 'series');

	/**
	 * Relation mapping
	 *
	 * @var array
	 */
	public static $relmap = array(
		'country' => '\\App\\Models\\Country',
		'events' => '\\App\\Models\\Event',
		'series' => '\\App\\Models\\Session',
	);

	/**
	 * Return all events of this organizer
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Events
	 */
	public function events()
	{
		return $this->hasMany('App\Models\Event');
	}

	/**
	 * Return this tag's events
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Events
	 */
	public function getEventsAttribute()
	{
		$events = [];
		foreach ($this->events()->getResults() as $event) {
			$events[] = $event;
		}
		return $events;
	}

	/**
	 * Return all series of this organizer
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Series
	 */
	public function series()
	{
		return $this->hasMany('App\Models\Series');
	}

	/**
	 * Return this tag's series
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Seriess
	 */
	public function getSeriesAttribute()
	{
		$seriess = [];
		foreach ($this->series()->getResults() as $series) {
			$seriess[] = $series;
		}
		return $seriess;
	}
}