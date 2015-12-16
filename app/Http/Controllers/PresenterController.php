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

use App\Models\Presenter;
use Illuminate\Http\Request;

class PresenterController extends Controller
{
	/**
	 * List all presenters
	 *
	 * @return \Symfony\Component\HttpFoundation\Response Presenter list
	 */
	public function listPresenters()
	{
		return response()->jsonAPI((new Presenter)->newQuery());
	}

	/**
	 * Get a single presenter
	 *
	 * @param int $id Presenter ID
	 * @return \Symfony\Component\HttpFoundation\Response Presenter
	 */
	public function getPresenter($id)
	{
		return response()->jsonAPI(Presenter::find($id));
	}

	/**
	 * Create a new presenter
	 *
	 * @param Request $request Request
	 * @return \Symfony\Component\HttpFoundation\Response Presenter
	 */
	public function createPresenter(Request $request)
	{

		$Presenter = Presenter::create($request->all());

		return response()->json($Presenter);

	}

	/**
	 * Update an presenter
	 *
	 * @param Request $request Request
	 * @param int $id Presenter ID
	 * @return \Symfony\Component\HttpFoundation\Response Presenter
	 */
	public function updatePresenter(Request $request, $id)
	{
		$Presenter = Presenter::find($id);
		$Presenter->title = $request->input('title');
		$Presenter->author = $request->input('author');
		$Presenter->isbn = $request->input('isbn');
//		$Presenter->save();

		return response()->json($Presenter);
	}

	/**
	 * Delete an presenter
	 *
	 * @param int $id Presenter ID
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @todo Set the deleted property to 1 instead of really deleting the presenter
	 */
//	public function deletePresenter($id)
//	{
//		$Presenter = Presenter::find($id);
//		$Presenter->delete();
//
//		return response()->json('deleted');
//	}
}