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

namespace App\Http\Controllers;

use App\Models\Organizer;

class OrganizerController extends Controller
{
    /**
     * List all organizers
     *
     * @return \Symfony\Component\HttpFoundation\Response Organizer list
     */
    public function listOrganizers()
    {
        return response()->json(Organizer::all());
    }

    /**
     * Get a single organizer
     *
     * @param int $id Organizer ID
     * @return \Symfony\Component\HttpFoundation\Response Organizer
     */
    public function getOrganizer($id)
    {

        $Organizer = Organizer::find($id);

        return response()->json($Organizer);
    }

    /**
     * Create a new organizer
     *
     * @param Request $request Request
     * @return \Symfony\Component\HttpFoundation\Response Organizer
     */
    public function createOrganizer(Request $request)
    {

        $Organizer = Organizer::create($request->all());

        return response()->json($Organizer);

    }

    /**
     * Update an organizer
     *
     * @param Request $request Request
     * @param int $id Organizer ID
     * @return \Symfony\Component\HttpFoundation\Response Organizer
     */
    public function updateOrganizer(Request $request, $id)
    {
        $Organizer = Organizer::find($id);
        $Organizer->title = $request->input('title');
        $Organizer->author = $request->input('author');
        $Organizer->isbn = $request->input('isbn');
        $Organizer->save();

        return response()->json($Organizer);
    }

    /**
     * Delete an organizer
     *
     * @param int $id Organizer ID
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Set the deleted property to 1 instead of really deleting the organizer
     */
    public function deleteOrganizer($id)
    {
        $Organizer = Organizer::find($id);
        $Organizer->delete();

        return response()->json('deleted');
    }
}