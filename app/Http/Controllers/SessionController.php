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

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
	/**
	 * List all sessions
	 *
	 * @return \Symfony\Component\HttpFoundation\Response Session list
	 */
	public function listSessions()
	{
		return response()->jsonAPI((new Session)->newQuery());
	}

	/**
	 * Get a single session
	 *
	 * @param int $id Session ID
	 * @return \Symfony\Component\HttpFoundation\Response Session
	 */
	public function getSession($id)
	{
		return response()->jsonAPI(Session::find($id));
	}

	/**
	 * Create a new session
	 *
	 * @param Request $request Request
	 * @return \Symfony\Component\HttpFoundation\Response Session
	 */
	public function createSession(Request $request)
	{

		$Session = Session::create($request->all());

		return response()->json($Session);

	}

	/**
	 * Update an session
	 *
	 * @param Request $request Request
	 * @param int $id Session ID
	 * @return \Symfony\Component\HttpFoundation\Response Session
	 */
	public function updateSession(Request $request, $id)
	{
		$Session = Session::find($id);
		$Session->title = $request->input('title');
		$Session->author = $request->input('author');
		$Session->isbn = $request->input('isbn');
//		$Session->save();

		return response()->json($Session);
	}

	/**
	 * Delete an session
	 *
	 * @param int $id Session ID
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @todo Set the deleted property to 1 instead of really deleting the session
	 */
//	public function deleteSession($id)
//	{
//		$Session = Session::find($id);
//		$Session->delete();
//
//		return response()->json('deleted');
//	}
}