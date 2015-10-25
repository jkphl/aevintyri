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

use App\Models\Room;

class RoomController extends Controller
{
    /**
     * List all rooms
     *
     * @return \Symfony\Component\HttpFoundation\Response Room list
     */
    public function listRooms()
    {
        return response()->json(Room::all());
    }

    /**
     * Get a single room
     *
     * @param int $id Room ID
     * @return \Symfony\Component\HttpFoundation\Response Room
     */
    public function getRoom($id)
    {

        $Room = Room::find($id);

        return response()->json($Room);
    }

    /**
     * Create a new room
     *
     * @param Request $request Request
     * @return \Symfony\Component\HttpFoundation\Response Room
     */
    public function createRoom(Request $request)
    {

        $Room = Room::create($request->all());

        return response()->json($Room);

    }

    /**
     * Update an room
     *
     * @param Request $request Request
     * @param int $id Room ID
     * @return \Symfony\Component\HttpFoundation\Response Room
     */
    public function updateRoom(Request $request, $id)
    {
        $Room = Room::find($id);
        $Room->title = $request->input('title');
        $Room->author = $request->input('author');
        $Room->isbn = $request->input('isbn');
        $Room->save();

        return response()->json($Room);
    }

    /**
     * Delete an room
     *
     * @param int $id Room ID
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Set the deleted property to 1 instead of really deleting the room
     */
    public function deleteRoom($id)
    {
        $Room = Room::find($id);
        $Room->delete();

        return response()->json('deleted');
    }
}