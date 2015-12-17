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
 *  this software and associated documentation files (the "Software"]); to deal in
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

use App\Models\Day;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    public function run()
    {
        Day::create(['event_id' => '1','date' => '2014-10-17']);
        Day::create(['event_id' => '1','date' => '2014-10-18']);
        Day::create(['event_id' => '2','date' => '2014-10-13']);
        Day::create(['event_id' => '3','date' => '2014-10-13']);
        Day::create(['event_id' => '4','date' => '2014-10-14']);
        Day::create(['event_id' => '5','date' => '2014-10-15']);
        Day::create(['event_id' => '6','date' => '2014-10-15']);
        Day::create(['event_id' => '7','date' => '2014-10-16']);
        Day::create(['event_id' => '8','date' => '2014-10-16']);
        Day::create(['event_id' => '9','date' => '2014-10-14']);
        Day::create(['event_id' => '10','date' => '2014-10-16']);
        Day::create(['event_id' => '11','date' => '2014-10-17']);
        Day::create(['event_id' => '12','date' => '2014-10-19']);
        Day::create(['event_id' => '13','date' => '2014-10-20']);
        Day::create(['event_id' => '14','date' => '2014-10-14']);
        Day::create(['event_id' => '15','date' => '2014-10-17']);
        Day::create(['event_id' => '16','date' => '2014-10-14']);
        Day::create(['event_id' => '17','date' => '2014-10-14']);
        Day::create(['event_id' => '18','date' => '2014-10-13']);
        Day::create(['event_id' => '19','date' => '2014-10-14']);
        Day::create(['event_id' => '20','date' => '2014-10-16']);
        Day::create(['event_id' => '21','date' => '2014-10-15']);
        Day::create(['event_id' => '22','date' => '2014-10-16']);
        Day::create(['event_id' => '23','date' => '2014-10-17']);
        Day::create(['event_id' => '24','date' => '2014-10-18']);
        Day::create(['event_id' => '25','date' => '2014-10-20']);
        Day::create(['event_id' => '26','date' => '2014-10-17']);
        Day::create(['event_id' => '26','date' => '2014-10-18']);
        Day::create(['event_id' => '27','date' => '2014-10-15']);
        Day::create(['event_id' => '28','date' => '2014-10-15']);
        Day::create(['event_id' => '29','date' => '2014-10-17']);
        Day::create(['event_id' => '30','date' => '2014-09-03']);
        Day::create(['event_id' => '31','date' => '2014-10-17']);
        Day::create(['event_id' => '32','date' => '2014-10-14']);
        Day::create(['event_id' => '33','date' => '2014-10-15']);
        Day::create(['event_id' => '34','date' => '2014-10-14']);
        Day::create(['event_id' => '35','date' => '2014-10-14']);
    }
}

