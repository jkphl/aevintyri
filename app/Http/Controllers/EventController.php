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

use App\Models\Event;

class EventController extends Controller
{
    /**
     * List all events
     *
     * @return \Symfony\Component\HttpFoundation\Response Event list
     */
    public function listEvents()
    {
        return response()->json(Event::all());
    }

    /**
     * Get a single event
     *
     * @param int $id Event ID
     * @return \Symfony\Component\HttpFoundation\Response Event
     */
    public function getEvent($id)
    {

        $Event = Event::find($id);

        return response()->json($Event);
    }

    /**
     * Create a new event
     *
     * @param Request $request Request
     * @return \Symfony\Component\HttpFoundation\Response Event
     */
    public function createEvent(Request $request)
    {

        $Event = Event::create($request->all());

        return response()->json($Event);

    }

    /**
     * Update an event
     *
     * @param Request $request Request
     * @param int $id Event ID
     * @return \Symfony\Component\HttpFoundation\Response Event
     */
    public function updateEvent(Request $request, $id)
    {
        $Event = Event::find($id);
        $Event->title = $request->input('title');
        $Event->author = $request->input('author');
        $Event->isbn = $request->input('isbn');
        $Event->save();

        return response()->json($Event);
    }

    /**
     * Delete an event
     *
     * @param int $id Event ID
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Set the deleted property to 1 instead of really deleting the event
     */
    public function deleteEvent($id)
    {
        $Event = Event::find($id);
        $Event->delete();

        return response()->json('deleted');
    }
}