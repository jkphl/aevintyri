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

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
	/**
	 * List all tags
	 *
	 * @return \Symfony\Component\HttpFoundation\Response Tag list
	 */
	public function listTags()
	{
		return response()->jsonAPI((new Tag)->newQuery());
	}

	/**
	 * Get a single tag
	 *
	 * @param int $id Tag ID
	 * @return \Symfony\Component\HttpFoundation\Response Tag
	 */
	public function getTag($id)
	{
		return response()->jsonAPI(Tag::find($id));
	}

	/**
	 * Create a new tag
	 *
	 * @param Request $request Request
	 * @return \Symfony\Component\HttpFoundation\Response Tag
	 */
	public function createTag(Request $request)
	{

		$Tag = Tag::create($request->all());

		return response()->json($Tag);

	}

	/**
	 * Update an tag
	 *
	 * @param Request $request Request
	 * @param int $id Tag ID
	 * @return \Symfony\Component\HttpFoundation\Response Tag
	 */
	public function updateTag(Request $request, $id)
	{
		$Tag = Tag::find($id);
		$Tag->title = $request->input('title');
		$Tag->author = $request->input('author');
		$Tag->isbn = $request->input('isbn');
		$Tag->save();

		return response()->json($Tag);
	}

	/**
	 * Delete an tag
	 *
	 * @param int $id Tag ID
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @todo Set the deleted property to 1 instead of really deleting the tag
	 */
	public function deleteTag($id)
	{
		$Tag = Tag::find($id);
		$Tag->delete();

		return response()->json('deleted');
	}
}