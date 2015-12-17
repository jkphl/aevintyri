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

use App\Traits\Contact;
use App\Traits\Describable;
use App\Traits\Image;

final class Presenter extends AbstractModel
{
    /**
     * Use the describable, contact and image features
     */
    use Describable, Contact, Image;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array('links', 'tags');

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = array('links', 'tags');

    /**
     * The extended accessors to append to the model's array form.
     *
     * @var array
     */
    protected $extends = array('sessions');

    /**
     * Relation mapping
     *
     * @var array
     */
    public static $relmap = array(
        'tags' => '\\App\\Models\\Tag',
        'sessions' => '\\App\\Models\\Session',
        'links' => '\\App\\Models\\Link',
    );

    /**
     * Return the tags of this presenter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany        Tags
     */
    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'presenter_tags');
    }

    /**
     * Return this presenter's tags
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
     * Return the sessions of this presenter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany        Sessions
     */
    public function sessions() {
        return $this->belongsToMany('App\Models\Session', 'presenter_sessions');
    }

    /**
     * Return this presenter's sessions
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany      Sessions
     */
    public function getSessionsAttribute() {
        $sessions = [];
        foreach ($this->sessions()->getResults() as $session) {
            $sessions[] = $session;
        }
        return $sessions;
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
     * Return this presenter's links
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
}