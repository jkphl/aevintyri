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

final class Link extends AbstractModel
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array('session_id', 'session', 'presenter_id', 'presenter');

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $extends = array('presenter');

    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array(
        'session' => '\\App\\Models\\Session',
        'presenter' => '\\App\\Models\\Presenter',
    );


    /**
     * Return this link's session
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo        Session
     */
    public function session() {
        return $this->belongsTo('App\Models\Session');
    }

    /**
     * Return this link's session
     *
     * @return \App\Models\Session     Session
     */
    public function getSessionAttribute()
    {
        return $this->session()->getQuery()->first();
    }

    /**
     * Return this link's presenter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo        Presenter
     */
    public function presenter() {
        return $this->belongsTo('App\Models\Presenter');
    }

    /**
     * Return this link's presenter
     *
     * @return int|\App\Models\Presenter     Presenter
     */
    public function getPresenterAttribute()
    {
        return $this->presenter()->getQuery()->first();
    }
}