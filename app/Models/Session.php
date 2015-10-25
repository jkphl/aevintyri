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

use App\Traits\Describable;
use App\Traits\Image;

final class Session extends AbstractModel
{
    /**
     * Use describable and image features
     */
    use Describable, Image;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array('day_id', 'room_id');

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('day', 'room');

    /**
     * Return this session's day
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo    Day
     */
    public function day() {
        return $this->belongsTo('App\Models\Day');
    }
    
    /**
     * Return this sessions's day
     *
     * @return int|\App\Models\Day      Day
     */
    public function getDayAttribute()
    {
        return $this->expand('day') ? $this->day()->first() : $this->day_id;
    }

    /**
     * Return this session's room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo    Room
     */
    public function room() {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * Return this sessions's room
     *
     * @return int|\App\Models\Room      Room
     */
    public function getRoomAttribute()
    {
        return $this->expand('room') ? $this->room()->first() : $this->room_id;
    }

    /**
     * Return all links of this venue
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Links
     */
    public function links()
    {
        return $this->hasMany('App\Models\Link');
    }
}