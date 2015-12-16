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

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
	/**
	 * List all seriess
	 *
	 * @return \Symfony\Component\HttpFoundation\Response Series list
	 */
	public function listSeries()
	{
		return response()->jsonAPI((new Series)->newQuery());
	}

	/**
	 * Get a single series
	 *
	 * @param int $id Series ID
	 * @return \Symfony\Component\HttpFoundation\Response Series
	 */
	public function getSeries($id)
	{
		return response()->jsonAPI(Series::find($id));
	}

	/**
	 * Create a new series
	 *
	 * @param Request $request Request
	 * @return \Symfony\Component\HttpFoundation\Response Series
	 */
	public function createSeries(Request $request)
	{

		$Series = Series::create($request->all());

		return response()->json($Series);

	}

	/**
	 * Update an series
	 *
	 * @param Request $request Request
	 * @param int $id Series ID
	 * @return \Symfony\Component\HttpFoundation\Response Series
	 */
	public function updateSeries(Request $request, $id)
	{
		$Series = Series::find($id);
		$Series->title = $request->input('title');
		$Series->author = $request->input('author');
		$Series->isbn = $request->input('isbn');
//		$Series->save();

		return response()->json($Series);
	}

	/**
	 * Delete an series
	 *
	 * @param int $id Series ID
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @todo Set the deleted property to 1 instead of really deleting the series
	 */
//	public function deleteSeries($id)
//	{
//		$Series = Series::find($id);
//		$Series->delete();
//
//		return response()->json('deleted');
//	}
}