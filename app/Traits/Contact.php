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

namespace App\Traits;

/**
 * Contact features
 *
 * @package app\Traits
 * @method string _makeUrl() _makeUrl($url, $pattern = null, $preferredSchema = 'https') Complete an URL
 * @property array $attributes The model's attributes.
 */
trait Contact
{
    /**
     * Get the Web URL
     *
     * @return string
     */
    public function getWebAttribute()
    {
        return $this->_makeUrl($this->attributes['web'], null, 'http');
    }

    /**
     * Get the Facebook URL
     *
     * @return string
     */
    public function getFacebookAttribute()
    {
        return $this->_makeUrl($this->attributes['facebook']);
    }

    /**
     * Get the Twitter URL
     *
     * @return string
     */
    public function getTwitterAttribute()
    {
        return $this->_makeUrl($this->attributes['twitter'], 'twitter.com/@%s');
    }

    /**
     * Get the XING URL
     *
     * @return string
     */
    public function getXingAttribute()
    {
        return $this->_makeUrl($this->attributes['xing']);
    }

    /**
     * Get the Google+ URL
     *
     * @return string
     */
    public function getGplusAttribute()
    {
        return $this->_makeUrl($this->attributes['gplus']);
    }
}