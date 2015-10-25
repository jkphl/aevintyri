
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

use App\Models\SessionTag;
use Illuminate\Database\Seeder;

class SessionTagTableSeeder extends Seeder
{
    public function run()
    {
        SessionTag::create(['session_id' => '1','tag_id' => '2']);
        SessionTag::create(['session_id' => '1','tag_id' => '9']);
        SessionTag::create(['session_id' => '1','tag_id' => '10']);
        SessionTag::create(['session_id' => '2','tag_id' => '2']);
        SessionTag::create(['session_id' => '2','tag_id' => '9']);
        SessionTag::create(['session_id' => '2','tag_id' => '10']);
        SessionTag::create(['session_id' => '3','tag_id' => '2']);
        SessionTag::create(['session_id' => '3','tag_id' => '9']);
        SessionTag::create(['session_id' => '3','tag_id' => '10']);
        SessionTag::create(['session_id' => '4','tag_id' => '7']);
        SessionTag::create(['session_id' => '6','tag_id' => '3']);
        SessionTag::create(['session_id' => '6','tag_id' => '9']);
        SessionTag::create(['session_id' => '7','tag_id' => '11']);
        SessionTag::create(['session_id' => '8','tag_id' => '2']);
        SessionTag::create(['session_id' => '8','tag_id' => '9']);
        SessionTag::create(['session_id' => '8','tag_id' => '11']);
        SessionTag::create(['session_id' => '9','tag_id' => '2']);
        SessionTag::create(['session_id' => '9','tag_id' => '4']);
        SessionTag::create(['session_id' => '9','tag_id' => '9']);
        SessionTag::create(['session_id' => '9','tag_id' => '11']);
        SessionTag::create(['session_id' => '9','tag_id' => '12']);
        SessionTag::create(['session_id' => '10','tag_id' => '7']);
        SessionTag::create(['session_id' => '10','tag_id' => '9']);
        SessionTag::create(['session_id' => '10','tag_id' => '12']);
        SessionTag::create(['session_id' => '11','tag_id' => '7']);
        SessionTag::create(['session_id' => '11','tag_id' => '11']);
        SessionTag::create(['session_id' => '11','tag_id' => '12']);
        SessionTag::create(['session_id' => '12','tag_id' => '7']);
        SessionTag::create(['session_id' => '13','tag_id' => '9']);
        SessionTag::create(['session_id' => '14','tag_id' => '2']);
        SessionTag::create(['session_id' => '14','tag_id' => '9']);
        SessionTag::create(['session_id' => '14','tag_id' => '10']);
        SessionTag::create(['session_id' => '15','tag_id' => '7']);
        SessionTag::create(['session_id' => '16','tag_id' => '9']);
        SessionTag::create(['session_id' => '16','tag_id' => '11']);
        SessionTag::create(['session_id' => '16','tag_id' => '12']);
        SessionTag::create(['session_id' => '17','tag_id' => '7']);
        SessionTag::create(['session_id' => '18','tag_id' => '2']);
        SessionTag::create(['session_id' => '18','tag_id' => '6']);
        SessionTag::create(['session_id' => '18','tag_id' => '9']);
        SessionTag::create(['session_id' => '18','tag_id' => '10']);
        SessionTag::create(['session_id' => '18','tag_id' => '11']);
        SessionTag::create(['session_id' => '20','tag_id' => '2']);
        SessionTag::create(['session_id' => '20','tag_id' => '10']);
        SessionTag::create(['session_id' => '20','tag_id' => '13']);
        SessionTag::create(['session_id' => '20','tag_id' => '14']);
        SessionTag::create(['session_id' => '22','tag_id' => '8']);
        SessionTag::create(['session_id' => '22','tag_id' => '9']);
        SessionTag::create(['session_id' => '23','tag_id' => '7']);
        SessionTag::create(['session_id' => '23','tag_id' => '8']);
        SessionTag::create(['session_id' => '24','tag_id' => '7']);
        SessionTag::create(['session_id' => '24','tag_id' => '9']);
        SessionTag::create(['session_id' => '24','tag_id' => '11']);
        SessionTag::create(['session_id' => '24','tag_id' => '15']);
        SessionTag::create(['session_id' => '24','tag_id' => '16']);
        SessionTag::create(['session_id' => '24','tag_id' => '17']);
        SessionTag::create(['session_id' => '25','tag_id' => '4']);
        SessionTag::create(['session_id' => '27','tag_id' => '4']);
        SessionTag::create(['session_id' => '28','tag_id' => '4']);
        SessionTag::create(['session_id' => '29','tag_id' => '4']);
        SessionTag::create(['session_id' => '30','tag_id' => '4']);
        SessionTag::create(['session_id' => '32','tag_id' => '7']);
        SessionTag::create(['session_id' => '32','tag_id' => '11']);
        SessionTag::create(['session_id' => '33','tag_id' => '7']);
        SessionTag::create(['session_id' => '33','tag_id' => '9']);
        SessionTag::create(['session_id' => '34','tag_id' => '2']);
        SessionTag::create(['session_id' => '34','tag_id' => '10']);
        SessionTag::create(['session_id' => '35','tag_id' => '1']);
        SessionTag::create(['session_id' => '35','tag_id' => '9']);
        SessionTag::create(['session_id' => '35','tag_id' => '11']);
        SessionTag::create(['session_id' => '35','tag_id' => '12']);
        SessionTag::create(['session_id' => '36','tag_id' => '1']);
        SessionTag::create(['session_id' => '36','tag_id' => '2']);
        SessionTag::create(['session_id' => '36','tag_id' => '4']);
        SessionTag::create(['session_id' => '36','tag_id' => '5']);
        SessionTag::create(['session_id' => '37','tag_id' => '2']);
        SessionTag::create(['session_id' => '37','tag_id' => '4']);
        SessionTag::create(['session_id' => '37','tag_id' => '9']);
        SessionTag::create(['session_id' => '37','tag_id' => '10']);
        SessionTag::create(['session_id' => '37','tag_id' => '14']);
        SessionTag::create(['session_id' => '38','tag_id' => '2']);
        SessionTag::create(['session_id' => '38','tag_id' => '4']);
        SessionTag::create(['session_id' => '38','tag_id' => '9']);
        SessionTag::create(['session_id' => '38','tag_id' => '10']);
        SessionTag::create(['session_id' => '38','tag_id' => '12']);
        SessionTag::create(['session_id' => '38','tag_id' => '14']);
        SessionTag::create(['session_id' => '39','tag_id' => '6']);
        SessionTag::create(['session_id' => '39','tag_id' => '7']);
        SessionTag::create(['session_id' => '39','tag_id' => '11']);
        SessionTag::create(['session_id' => '40','tag_id' => '1']);
        SessionTag::create(['session_id' => '40','tag_id' => '5']);
        SessionTag::create(['session_id' => '40','tag_id' => '11']);
        SessionTag::create(['session_id' => '41','tag_id' => '1']);
        SessionTag::create(['session_id' => '41','tag_id' => '3']);
        SessionTag::create(['session_id' => '41','tag_id' => '11']);
        SessionTag::create(['session_id' => '44','tag_id' => '8']);
        SessionTag::create(['session_id' => '45','tag_id' => '9']);
        SessionTag::create(['session_id' => '45','tag_id' => '12']);
        SessionTag::create(['session_id' => '46','tag_id' => '7']);
        SessionTag::create(['session_id' => '46','tag_id' => '8']);
        SessionTag::create(['session_id' => '46','tag_id' => '9']);
        SessionTag::create(['session_id' => '48','tag_id' => '2']);
        SessionTag::create(['session_id' => '48','tag_id' => '6']);
        SessionTag::create(['session_id' => '48','tag_id' => '10']);
        SessionTag::create(['session_id' => '49','tag_id' => '2']);
        SessionTag::create(['session_id' => '49','tag_id' => '6']);
        SessionTag::create(['session_id' => '49','tag_id' => '10']);
        SessionTag::create(['session_id' => '50','tag_id' => '2']);
        SessionTag::create(['session_id' => '50','tag_id' => '6']);
        SessionTag::create(['session_id' => '50','tag_id' => '10']);
        SessionTag::create(['session_id' => '52','tag_id' => '2']);
        SessionTag::create(['session_id' => '52','tag_id' => '6']);
        SessionTag::create(['session_id' => '52','tag_id' => '7']);
        SessionTag::create(['session_id' => '52','tag_id' => '8']);
        SessionTag::create(['session_id' => '52','tag_id' => '9']);
        SessionTag::create(['session_id' => '53','tag_id' => '1']);
        SessionTag::create(['session_id' => '53','tag_id' => '3']);
        SessionTag::create(['session_id' => '53','tag_id' => '7']);
        SessionTag::create(['session_id' => '54','tag_id' => '9']);
        SessionTag::create(['session_id' => '54','tag_id' => '12']);
        SessionTag::create(['session_id' => '55','tag_id' => '7']);
        SessionTag::create(['session_id' => '55','tag_id' => '9']);
        SessionTag::create(['session_id' => '55','tag_id' => '12']);
        SessionTag::create(['session_id' => '56','tag_id' => '6']);
        SessionTag::create(['session_id' => '56','tag_id' => '7']);
        SessionTag::create(['session_id' => '56','tag_id' => '9']);
        SessionTag::create(['session_id' => '56','tag_id' => '11']);
        SessionTag::create(['session_id' => '57','tag_id' => '1']);
        SessionTag::create(['session_id' => '57','tag_id' => '9']);
        SessionTag::create(['session_id' => '57','tag_id' => '11']);
        SessionTag::create(['session_id' => '58','tag_id' => '2']);
        SessionTag::create(['session_id' => '58','tag_id' => '9']);
        SessionTag::create(['session_id' => '58','tag_id' => '10']);
        SessionTag::create(['session_id' => '59','tag_id' => '2']);
        SessionTag::create(['session_id' => '59','tag_id' => '9']);
        SessionTag::create(['session_id' => '59','tag_id' => '10']);
        SessionTag::create(['session_id' => '60','tag_id' => '9']);
        SessionTag::create(['session_id' => '61','tag_id' => '9']);
        SessionTag::create(['session_id' => '61','tag_id' => '18']);
        SessionTag::create(['session_id' => '71','tag_id' => '2']);
        SessionTag::create(['session_id' => '71','tag_id' => '9']);
        SessionTag::create(['session_id' => '71','tag_id' => '18']);
        SessionTag::create(['session_id' => '72','tag_id' => '2']);
        SessionTag::create(['session_id' => '72','tag_id' => '9']);
        SessionTag::create(['session_id' => '72','tag_id' => '10']);
        SessionTag::create(['session_id' => '73','tag_id' => '2']);
        SessionTag::create(['session_id' => '73','tag_id' => '9']);
        SessionTag::create(['session_id' => '73','tag_id' => '10']);
        SessionTag::create(['session_id' => '74','tag_id' => '9']);
        SessionTag::create(['session_id' => '75','tag_id' => '9']);
        SessionTag::create(['session_id' => '76','tag_id' => '9']);
        SessionTag::create(['session_id' => '77','tag_id' => '9']);
        SessionTag::create(['session_id' => '77','tag_id' => '18']);
    }
}
