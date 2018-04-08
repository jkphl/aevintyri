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

use App\Models\PresenterSession;
use Illuminate\Database\Seeder;

class PresenterSessionTableSeeder extends Seeder
{
    public function run()
    {
        PresenterSession::create(['session_id' => '2', 'presenter_id' => '2']);
        PresenterSession::create(['session_id' => '3', 'presenter_id' => '3']);
        PresenterSession::create(['session_id' => '7', 'presenter_id' => '4']);
        PresenterSession::create(['session_id' => '8', 'presenter_id' => '5']);
        PresenterSession::create(['session_id' => '14', 'presenter_id' => '6']);
        PresenterSession::create(['session_id' => '25', 'presenter_id' => '7']);
        PresenterSession::create(['session_id' => '27', 'presenter_id' => '8']);
        PresenterSession::create(['session_id' => '28', 'presenter_id' => '9']);
        PresenterSession::create(['session_id' => '29', 'presenter_id' => '10']);
        PresenterSession::create(['session_id' => '30', 'presenter_id' => '11']);
        PresenterSession::create(['session_id' => '31', 'presenter_id' => '12']);
        PresenterSession::create(['session_id' => '37', 'presenter_id' => '13']);
        PresenterSession::create(['session_id' => '38', 'presenter_id' => '14']);
        PresenterSession::create(['session_id' => '56', 'presenter_id' => '15']);
        PresenterSession::create(['session_id' => '57', 'presenter_id' => '16']);
        PresenterSession::create(['session_id' => '58', 'presenter_id' => '20']);
        PresenterSession::create(['session_id' => '59', 'presenter_id' => '17']);
        PresenterSession::create(['session_id' => '60', 'presenter_id' => '19']);
        PresenterSession::create(['session_id' => '61', 'presenter_id' => '18']);
        PresenterSession::create(['session_id' => '72', 'presenter_id' => '20']);
        PresenterSession::create(['session_id' => '73', 'presenter_id' => '17']);
        PresenterSession::create(['session_id' => '74', 'presenter_id' => '19']);
        PresenterSession::create(['session_id' => '75', 'presenter_id' => '1']);
        PresenterSession::create(['session_id' => '76', 'presenter_id' => '1']);
        PresenterSession::create(['session_id' => '77', 'presenter_id' => '18']);
    }
}
