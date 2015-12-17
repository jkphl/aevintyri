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

final class Country extends AbstractModel
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'countries';

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array('organizers', 'venues');

	/**
	 * The extended accessors to append to the model's array form.
	 *
	 * @var array
	 */
	protected $extends = array('organizers', 'venues');

	/**
	 * Relation mapping
	 *
	 * @var array
	 */
	public static $relmap = array(
		'organizers' => '\\App\\Models\\Organizer',
		'venues' => '\\App\\Models\\Venue',
	);

	/**
	 * Return all organizers in this country
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Organizer
	 */
	public function organizers()
	{
		return $this->hasMany('App\Models\Organizer');
	}

	/**
	 * Return this country's organizers
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Organizers
	 */
	public function getOrganizersAttribute()
	{
		$organizers = [];
		foreach ($this->organizers()->getResults() as $organizer) {
			$organizers[] = $organizer;
		}
		return $organizers;
	}

	/**
	 * Return all venues in this country
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Venue
	 */
	public function venues()
	{
		return $this->hasMany('App\Models\Venue');
	}

	/**
	 * Return this country's venues
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Venues
	 */
	public function getVenuesAttribute()
	{
		$venues = [];
		foreach ($this->venues()->getResults() as $venue) {
			$venues[] = $venue;
		}
		return $venues;
	}
}