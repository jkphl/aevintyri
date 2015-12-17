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
use App\Traits\Describable;
use App\Traits\Image;

final class Venue extends AbstractModel
{
	/**
	 * Use the describable, address and image features
	 */
	use Address, Describable, Image;

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = array('country_id', 'country');

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
	protected $extends = array('rooms');

	/**
	 * Relation mapping
	 *
	 * @var array
	 */
	public static $relmap = array(
		'country' => '\\App\\Models\\Country',
		'rooms' => '\\App\\Models\\Room',
	);

	/**
	 * Return all rooms of this venue
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Rooms
	 */
	public function rooms()
	{
		return $this->hasMany('App\Models\Room');
	}

	/**
	 * Return this venue's rooms
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany      Rooms
	 */
	public function getRoomsAttribute()
	{
		$rooms = [];
		foreach ($this->rooms()->getResults() as $room) {
			$rooms[] = $room;
		}
		return $rooms;
	}
}