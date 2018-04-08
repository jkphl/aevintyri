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

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * List all links
     *
     * @return \Symfony\Component\HttpFoundation\Response Link list
     */
    public function listLinks()
    {
        return response()->jsonAPI((new Link)->newQuery());
    }

    /**
     * Get a single link
     *
     * @param int $id Link ID
     *
     * @return \Symfony\Component\HttpFoundation\Response Link
     */
    public function getLink($id)
    {
        return response()->jsonAPI(Link::find($id));
    }

    /**
     * Create a new link
     *
     * @param Request $request Request
     *
     * @return \Symfony\Component\HttpFoundation\Response Link
     */
    public function createLink(Request $request)
    {

        $Link = Link::create($request->all());

        return response()->json($Link);

    }

    /**
     * Update an link
     *
     * @param Request $request Request
     * @param int $id          Link ID
     *
     * @return \Symfony\Component\HttpFoundation\Response Link
     */
    public function updateLink(Request $request, $id)
    {
        $Link         = Link::find($id);
        $Link->title  = $request->input('title');
        $Link->author = $request->input('author');
        $Link->isbn   = $request->input('isbn');

//		$Link->save();

        return response()->json($Link);
    }

    /**
     * Delete an link
     *
     * @param int $id Link ID
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @todo Set the deleted property to 1 instead of really deleting the link
     */
//	public function deleteLink($id)
//	{
//		$Link = Link::find($id);
//		$Link->delete();
//
//		return response()->json('deleted');
//	}
}