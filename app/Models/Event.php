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

final class Event extends AbstractEventSeries
{
    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array(
        'organizer' => '\\App\\Models\\Organizer',
        'series'    => '\\App\\Models\\Series',
        'days'      => '\\App\\Models\\Day',
        'venues'    => '\\App\\Models\\Venue',
    );
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array('series_id', 'series', 'organizer_id', 'organizer', 'days');
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('start_time', 'end_time', 'series', 'organizer', 'days');
    /**
     * The extended accessors to append to the model's array form.
     *
     * @var array
     */
    protected $extends = array('venues');
    /**
     * First and last
     *
     * @var array
     */
    protected $_sessions = array('first' => null, 'last' => null);

    /**
     * Return this event's series
     *
     * @return int|\App\Models\Series     Series
     */
    public function getSeriesAttribute()
    {
        return $this->series()->getQuery()->first();
    }

    /**
     * Return this event's series
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo    Series
     */
    public function series()
    {
        return $this->belongsTo('App\Models\Series');
    }

    /**
     * Return this tag's days
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Days
     */
    public function getDaysAttribute()
    {
        $days = [];
        foreach ($this->days()->getResults() as $day) {
            $days[] = $day;
        }

        return $days;
    }

    /**
     * Return this events's days
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Days
     */
    public function days()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany('App\Models\Day')->ordered();
    }

    /**
     * Return the event start time (day aggregate)
     *
     * @return string
     */
    public function getStartTimeAttribute()
    {
        $firstDay = $this->days()->getResults()->first();

        return ($firstDay instanceof Day) ? $firstDay->start_time : null;
    }

    /**
     * Return the event end time (day aggregate)
     *
     * @return string
     */
    public function getEndTimeAttribute()
    {
        $lastDay = $this->days()->getResults()->last();

        return ($lastDay instanceof Day) ? $lastDay->end_time : null;
    }

    /**
     * Return a list of all venues of this event
     *
     * @return array List of venues
     */
    public function getVenuesAttribute()
    {
        $venues = [];
        foreach ($this->days()->getResults() as $day) {
            foreach ($day->venues as $venue) {
                $venues[$venue->id] = $venue;
            }
        }

        return array_values($venues);
    }
}