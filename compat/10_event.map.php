<?php

/**
 * aevintyri
 *
 * @category    Jkphl
 * @package     Jkphl_aevintyri
 * @author      Joschi Kuphal <joschi@kuphal.net> / @jkphl
 * @copyright   Copyright © 2016 Joschi Kuphal <joschi@kuphal.net> / @jkphl
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

return array(
    'source' => 'event',
    'target' => 'events',
    'where' => '`sys_deleted` = 0 AND `type` = "single"',
    'columns' => [
        'id' => '`id`',
        'created_at' => '`sys_created`',
        'updated_at' => '`sys_modified`',
        'deleted_at' => 'IF(`sys_deleted`, NOW(), NULL)',
        'created_by' => '`sys_creator`',
        'updated_by' => '`sys_author`',

        'name' => '`name`',
        'organizer_id' => '`organizer`',
        'series_id' => '`series`',
        'image' => '`image`',
        'email' => '`email`',
        'phone' => '`phone`',
        'fax' => '`fax`',
        'cell' => '`cell`',
        'web' => '`web`',
        'facebook' => '`facebook`',
        'twitter' => '`twitter`',
        'xing' => '`xing`',
        'gplus' => '`gplus`',
        'hashtag' => '`hashtag`',
        'description' => '`description`',
        'abstract' => '`abstract`',
        'facebook_event' => '`facebook_event`',
        'xing_event' => '`xing_event`',
        'gplus_event' => '`gplus_event`',
        'tickets' => '`tickets`',
        'tickets_available' => '`tickets_available`',
        'tickets_email' => '`tickets_email`',
        'lanyrd' => '`lanyrd`',
    ]
);