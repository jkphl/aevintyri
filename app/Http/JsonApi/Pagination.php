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

namespace App\Http\JsonApi;


use App\Http\JsonApiable;

class Pagination implements JsonApiable
{
    /**
     * First pagination link
     *
     * @var string
     */
    protected $first = null;
    /**
     * Last pagination link
     *
     * @var string
     */
    protected $last = null;
    /**
     * Previous pagination link
     *
     * @var string
     */
    protected $prev = null;
    /**
     * Next pagination link
     *
     * @var string
     */
    protected $next = null;

    /**
     * Pagination constructor
     *
     * @param string $first First pagination link
     * @param string $last  Last pagination link
     * @param string $prev  Previous pagination link
     * @param string $next  Next pagination link
     */
    public function __construct($first = null, $last = null, $prev = null, $next = null)
    {
        $this->first = $first;
        $this->last  = $last;
        $this->prev  = $prev;
        $this->next  = $next;
    }

    /**
     * Return as a JSON API array
     *
     * @param Response $response JSON API response
     * @param string $prefix     Prefix
     *
     * @return array|string
     */
    public function toJsonApi(Response $response, $prefix = '')
    {
        return array_filter(array(
            'first' => $this->first,
            'last'  => $this->last,
            'prev'  => $this->prev,
            'next'  => $this->next,
        ));
    }
}