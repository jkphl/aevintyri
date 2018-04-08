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

final class Day extends AbstractModel
{

    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array(
        'sessions' => '\\App\\Models\\Session',
        'event'    => '\\App\\Models\\Event',
        'venues'   => '\\App\\Models\\Venue',
    );
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array('event_id', 'event', 'sessions');
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('start_time', 'end_time', 'sessions');
    /**
     * The extended accessors to append to the model's array form.
     *
     * @var array
     */
    protected $extends = array('event', 'venues');
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'date', 'start_time', 'end_time'];
    /**
     * Default order property
     *
     * @var string
     */
    protected $orderBy = 'date';

    /**
     * Return this room's event
     *
     * @return int|\App\Models\Event     Event
     */
    public function getEventAttribute()
    {
        return $this->event()->getQuery()->first();
    }

    /**
     * Return this room's event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo        Event
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    /**
     * Return this day's sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Sessions
     */
    public function getSessionsAttribute()
    {
        $sessions = [];
        foreach ($this->sessions()->getResults() as $session) {
            $sessions[] = $session;
        }

        return $sessions;
    }

    /**
     * Return this day's sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Sessions
     */
    public function sessions()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->hasMany('App\Models\Session')->ordered();
    }

    /**
     * Return the day start time (session aggregate)
     *
     * @return string
     */
    public function getStartTimeAttribute()
    {
        $firstSession = $this->sessions()->getResults()->first();

        return ($firstSession instanceof Session) ? $firstSession->start_time : null;
    }

    /**
     * Return the day end time (session aggregate)
     *
     * @return string
     */
    public function getEndTimeAttribute()
    {
        $lastSession = $this->sessions()->getResults()->last();

        return ($lastSession instanceof Session) ? $lastSession->end_time : null;
    }

    /**
     * Return a list of all venues of this day
     *
     * @return array List of venues
     */
    public function getVenuesAttribute()
    {
        $venues = [];
        foreach ($this->sessions()->getResults() as $session) {
            $venue              = $session->venue;
            $venues[$venue->id] = $venue;
        }

        return array_values($venues);
    }
}