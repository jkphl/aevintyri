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
    protected $hidden = array('day_id', 'room_id', 'day', 'room', 'links', 'tags');

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('day', 'room', 'links', 'tags');

    /**
     * The extended accessors to append to the model's array form.
     *
     * @var array
     */
    protected $extends = array('venue');

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'start_time', 'end_time'];

    /**
     * Default order property
     *
     * @var string
     */
    protected $orderBy = 'start_time';

    /**
     * Default order direction
     *
     * @var string
     */
    protected $orderDirection = 'ASC';

    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array(
        'day' => '\\App\\Models\\Day',
        'room' => '\\App\\Models\\Room',
        'tags' => '\\App\\Models\\Tag',
        'links' => '\\App\\Models\\Link',
        'venue' => '\\App\\Models\\Venue',
    );

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
        return $this->day()->getQuery()->first();
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
        return $this->room()->getQuery()->first();
    }

    /**
     * Return the tags of this session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany        Tags
     */
    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'session_tags');
    }

    /**
     * Return this session's tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Tags
     */
    public function getTagsAttribute() {
        $tags = [];
        foreach ($this->tags()->getResults() as $tag) {
            $tags[] = $tag;
        }
        return $tags;
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

    /**
     * Return this session's links
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Links
     */
    public function getLinksAttribute() {
        $links = [];
        foreach ($this->links()->getResults() as $link) {
            $links[] = $link;
        }
        return $links;
    }

    /**
     * Return a timestamp as DateTime object.
     *
     * @param  mixed  $value
     * @return \Carbon\Carbon
     */
    protected function asDateTime($value)
    {

        // If it's a time string: Instantiate based on the associated day
        if (is_string($value) && preg_match('/^(\d{2}):(\d{2}):(\d{2})$/', $value, $time)) {
            /** @var \Carbon\Carbon $day */
            $day = clone $this->getDayAttribute()->date;
            return $day->addHours($time[1])->addMinutes($time[2])->addSeconds($time[3]);
        }

        return parent::asDateTime($value);
    }

    /**
     * Return the venue of this session
     *
     * @return \App\Models\Venue Venue
     */
    public function getVenueAttribute() {
        return $this->room()->getQuery()->first()->venue;
    }
}