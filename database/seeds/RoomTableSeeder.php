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

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    public function run()
    {
        Room::create(['venue_id' => '1','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '2','name' => 'Gewölbekeller','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '3','name' => 'Restaurant Bühne','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '4','name' => 'Barock-Vestibül','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '5','name' => 'Hirsvogelsaal','number' => '','hashtag' => 'Hirsvogelsaal','description' => 'Der Hirsvogelsaal gilt als "die strengste und schönste Schöpfung der ganzen deutschen Frührenaissance". Die reich geschnitzte Wandverkleidung mit antikischen Motiven, der steinerne "Kamin" als Durchgang zum Garten und das Deckengemälde mit der Darstellung des Phaeton-Sturzes, sind die Kernstücke dieser einzigartigen Raumschöpfung.','abstract' => '']);
        Room::create(['venue_id' => '6','name' => 'Bar & Lounge','number' => '','hashtag' => '','description' => '','abstract' => 'Ehemalige Ballsaal aus dem 19. Jahrhundert']);
        Room::create(['venue_id' => '7','name' => 'Schöner Saal','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '8','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '9','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '10','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '11','name' => 'Event Lounge','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '11','name' => 'Meeting','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '11','name' => 'Team','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '12','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '13','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '14','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '15','name' => 'Artefakt','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '16','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '17','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '18','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '19','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '20','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '21','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '22','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '23','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
        Room::create(['venue_id' => '24','name' => '','number' => '','hashtag' => '','description' => '','abstract' => '']);
    }
}

