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

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        Tag::create(['name' => 'Online Marketing','color' => '#000000']);
        Tag::create(['name' => 'Webentwicklung','color' => '#000000']);
        Tag::create(['name' => 'Social Media','color' => '#000000']);
        Tag::create(['name' => 'eCommerce','color' => '#000000']);
        Tag::create(['name' => 'SEO','color' => '#000000']);
        Tag::create(['name' => 'Mobile Apps','color' => '#000000']);
        Tag::create(['name' => 'Networking','color' => '#000000']);
        Tag::create(['name' => 'Kreativkultur','color' => '#000000']);
        Tag::create(['name' => 'Vorträge, Workshops & Pitches','color' => '#000000']);
        Tag::create(['name' => 'Code','color' => '#000000']);
        Tag::create(['name' => 'Business','color' => '#000000']);
        Tag::create(['name' => 'Startup','color' => '#000000']);
        Tag::create(['name' => 'Wordpress','color' => '#000000']);
        Tag::create(['name' => 'CMS','color' => '#000000']);
        Tag::create(['name' => 'Scrum','color' => '#000000']);
        Tag::create(['name' => 'Agile Projectmanagement','color' => '#000000']);
        Tag::create(['name' => 'Kanban','color' => '#000000']);
        Tag::create(['name' => 'Webdesign','color' => '#000000']);
    }
}
